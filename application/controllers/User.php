<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $this->session->role_id;
        $id_user = $this->session->id;

        $data['role'] = $this->User_model->getRole();
        // var_dump($data['role']);
        // die;

        $data['total_kas'] = $this->Admin_model->getTotalKas();
        $data['total_donasi'] = $this->Admin_model->getTotalDonasi();

        $data['kas_masuk'] = $this->db->query("SELECT sum(nominal) as nominal FROM kas where tipe_kas = 'masuk' AND id_user = ?", array($id_user))->row_array();
        $data['kas_keluar'] = $this->db->query("SELECT sum(nominal) as nominal FROM kas where tipe_kas = 'keluar' AND id_user = ?", array($id_user))->row_array();

        $this->load->view('template_auth/header', $data);
        $this->load->view('template_auth/sidebar');
        $this->load->view('template_auth/topbar');
        $this->load->view('user/index');
        $this->load->view('template_auth/footer');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'My Profile';
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar');
            $this->load->view('template_auth/topbar');
            $this->load->view('user/profile');
            $this->load->view('template_auth/footer');
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $name_masjid = $this->input->post('name_masjid');
            $email = $this->input->post('email');

            $save = [
                'name' => $name,
                'name_masjid' => $name_masjid,
                'email' => $email,
            ];

            //cek jika ada gambar di upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->where('id', $id);
            $this->db->update('user', $save);
            $this->session->set_flashdata('message', '<span class="text-success">Success edit your profile!</span>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar');
            $this->load->view('template_auth/topbar');
            $this->load->view('user/changepassword');
            $this->load->view('template_auth/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-white text-center" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Success change password!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function kegiatan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id_user' =>   $this->session->id])->result_array();
        $data['title'] = 'Kegiatan';

        $this->form_validation->set_rules('name_kegiatan', 'Nama kegiatan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar');
            $this->load->view('template_auth/topbar');
            $this->load->view('user/kegiatan');
            $this->load->view('template_auth/footer');
        } else {
            $config['upload_path'] = 'assets/frontend/img/kegiatan';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2014;
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image_kegiatan')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image_kegiatan', $new_image);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-white text-center" role="alert">Gagal mengupdate data user!</div>');
                redirect('profile');
            }

            $save = [
                'id_user' => $this->input->post('id_user'),
                'name_kegiatan' => $this->input->post('name_kegiatan'),
                'date_kegiatan' => $this->input->post('date_kegiatan'),
            ];

            $this->db->insert('kegiatan', $save);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Success tambah kegiatan masjid!</div>');
            redirect('user/kegiatan');
        }
    }

    public function deletekegitan($id)
    {
        $where = array('id_kegiatan' => $id);
        $this->User_model->delete($where, 'kegiatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert text-center">Success delete kegiatan!</div>');
        redirect('user/kegiatan');
    }

    public function management()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['site'] = $this->db->get_where('detail_masjid', ['id_user' =>   $this->session->id])->row_array();
        $data['title'] = 'Site Management';

        $this->form_validation->set_rules('name_resmi', 'Nama Masjid Resmi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar');
            $this->load->view('template_auth/topbar');
            $this->load->view('user/site_management');
            $this->load->view('template_auth/footer');
        } else {
            $id = $this->input->post('id_detail');
            $save = [
                'name_resmi' => $this->input->post('name_resmi'),
                'date_resmi' => $this->input->post('date_resmi'),
                'lokasi' => $this->input->post('lokasi'),
                'luas_bangunan' => $this->input->post('luas_bangunan'),
                'luas_keseluruhan' => $this->input->post('luas_keseluruhan'),
                'daya_tampung' => $this->input->post('daya_tampung'),
                'facebook' => $this->input->post('facebook'),
                'twitter' => $this->input->post('twitter'),
                'instagram' => $this->input->post('instagram'),
            ];

            $this->db->where('id_detail', $id);
            $this->db->update('detail_masjid', $save);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Success update info detail masjid!</div>');
            redirect('user/management');
        }
    }
}
