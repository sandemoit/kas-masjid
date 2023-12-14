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

        $data['total_kas'] = $this->Admin_model->getTotalKas();
        $data['total_donasi'] = $this->Admin_model->getTotalDonasi();
        $data['total_donatur'] = $this->db->query('select * from tbl_donatur')->num_rows();

        $data['kas_masuk'] = $this->db->query("SELECT sum(nominal) as nominal FROM kas where tipe_kas = 'masuk'")->row_array();
        $data['kas_keluar'] = $this->db->query("SELECT sum(nominal) as nominal FROM kas where tipe_kas = 'keluar'")->row_array();

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
}
