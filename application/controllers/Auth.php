<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->email) {
            if ($this->session->role_id == 1) {
                redirect('admin'); // apabila sudah login masuk ke role admin/dashboard
            } else {
                redirect('user'); // apabila sudah login masuk ke role users/dashboard
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SANDEMO Login';
            $this->load->view('template_auth/header', $data);
            $this->load->view('auth/login');
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika user ada
        if ($user) {
            //jika user active
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-white text-center" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-white text-center" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-white text-center" role="alert">Email is not register</div>');
            redirect('auth');
        }
    }

    public function success()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $data['title'] = 'Sent Email Verification';
        $this->load->view('auth/success');
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirm Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SANDEMO Registration';
            $this->load->view('template_auth/header', $data);
            $this->load->view('auth/registration');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            //siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            $id_user = $this->db->insert_id();
            $this->db->insert('detail_masjid', array('id_user' => $id_user));

            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify', $email);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('auth/success');
        }
    }

    // private function _sendEmail($email, $token, $type)
    // {
    //     // PHPMailer object
    //     $mail = new PHPMailer(true);
    //     //Server settings
    //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //     $mail->isSMTP();
    //     $mail->Host     = EMAIL_HOST;
    //     $mail->SMTPAuth = true;
    //     $mail->Username = EMAIL_ALAMAT;
    //     $mail->Password = EMAIL_PASSWORD;
    //     $mail->Port     = EMAIL_PORT;
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    //     //Recipients
    //     $mail->setFrom(EMAIL_ALAMAT, EMAIL_NAMA);
    //     $mail->addAddress($email);     //Add a recipient
    //     $mail->addReplyTo(EMAIL_ALAMAT, 'Information');
    //     $this->email->to($this->input->post('email'));

    //     if ($type == 'verify') {
    //         $mail->isHTML(true);  //Set email format to HTML
    //         $mail->Subject = 'Account Verification';

    //         // $mail->Body = $this->load->view('templates/auth_email/verify', ['token' => $token], TRUE);
    //         $mail->Body = 'Click this link to verify you account  : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Verifikasi Akun</a>';
    //     } else if ($type == 'forgot') {
    //         $mail->isHTML(true);
    //         $mail->Subject = 'Reset Password';

    //         // $body = $this->load->view('templates/reset_password', ['token' => urldecode($token)] , TRUE);
    //         $mail->Body = 'Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>';
    //     }
    //     // Send email
    //     if (!$mail->send()) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'
    //             . $mail->ErrorInfo . '</div>');
    //         redirect($_SERVER['HTTP_REFERER']);
    //     } else {
    //         return true;
    //     }
    // }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => EMAIL_HOST,
            'smtp_user' => EMAIL_ALAMAT,
            'smtp_pass' => EMAIL_PASSWORD,
            'smtp_port' => 587,
            'smtp_crypto' => 'ssl',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from(EMAIL_HOST, EMAIL_NAMA);
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account  : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">You have been logout</div>');
        redirect('/');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('template_auth/header', $data);
            $this->load->view('auth/forgot-password');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($email, $token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-white text-center" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[4]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('template_auth/header', $data);
            $this->load->view('auth/change-password');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-white text-center" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-white text-center" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }
}
