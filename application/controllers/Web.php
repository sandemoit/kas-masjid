<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    public function index()
    {
        $data['data'] = $this->db->where('role_id !=', 1)->get('user')->result_array();
        $this->load->view('frontend/web', $data);
    }
}
