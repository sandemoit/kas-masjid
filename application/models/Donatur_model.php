<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donatur_model extends CI_Model
{
    public function get_donatur()
    {
        $id_user = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('tbl_donatur');
        $this->db->where('tbl_donatur.id_user', $id_user);
        $this->db->order_by('tbl_donatur.id', 'desc');

        return $this->db->get()->result_array();
    }
}
