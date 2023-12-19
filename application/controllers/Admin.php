<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->row_array();

        $id_user = $this->session->id;

        $data['total_kas'] = $this->Admin_model->getTotalKas();
        $data['total_donasi'] = $this->Admin_model->getTotalDonasi();
        $data['total_donatur'] = $this->db->query('select * from tbl_donatur')->num_rows();

        $data['kas_masuk'] = $this->Admin_model->getKasMasuk();
        $data['kas_keluar'] = $this->Admin_model->getKasKeluar();

        $this->load->view('template_auth/header', $data);
        $this->load->view('template_auth/sidebar', $data);
        $this->load->view('template_auth/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template_auth/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar', $data);
            $this->load->view('template_auth/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template_auth/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">New role added!</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template_auth/header', $data);
        $this->load->view('template_auth/sidebar', $data);
        $this->load->view('template_auth/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('template_auth/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Access Changed!</div>');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $role = $this->input->post('role');

        $data = array(
            'id' => $id,
            'role' => $role
        );

        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Success edit data!</div>');
        redirect('admin/role');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->Admin_model->delete($where, 'user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-white text-center" role="alert">Success delete role!</div>');
        redirect('admin/role');
    }

    public function setting()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['setting'] = $this->db->get('setting')->row_array();

        $this->form_validation->set_rules('nama_website', 'Nama Website', 'required|trim');
        $data['title'] = 'Setting';

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar');
            $this->load->view('template_auth/topbar');
            $this->load->view('admin/setting');
            $this->load->view('template_auth/footer');
        } else {
            $id = $this->input->post('id_setting');
            $nama_website = $this->input->post('nama_website');
            $facebook = $this->input->post('facebook');
            $whatsapp = $this->input->post('whatsapp');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $about = $this->input->post('about');
            $instagram = $this->input->post('instagram');
            $youtube = $this->input->post('youtube');

            $save = [
                'nama_website' => $nama_website,
                'about' => $about,
                'alamat' => $alamat,
                'whatsapp' => $whatsapp,
                'facebook' => $facebook,
                'email' => $email,
                'instagram' => $instagram,
                'youtube' => $youtube,
            ];

            //cek jika ada gambar di upload
            $upload_image = $_FILES['logo_website']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 2048;
                $config['upload_path'] = '/assets/img/logo/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo_website')) {
                    $old_image = $data['user']['logo_website'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('logo_website', $new_image);
                } else {
                    $error = $this->upload->dispay_errors();
                    $this->session->set_flashdata('message', '<span class="text-danger">' . $error . '</span>');
                    redirect('admin/website');
                }
            }

            $this->db->where('id_setting', $id);
            $this->db->update('setting', $save);
            $this->session->set_flashdata('message', '<span class="text-success">Success edit your profile!</span>');
            redirect('admin/setting');
        }
    }
}
