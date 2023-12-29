<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web_model extends CI_Model
{
    public function getMasjid()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('detail_masjid', 'detail_masjid.id_user = user.id');
        return $this->db->get()->result_array();
    }
    public function getDetail($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('detail_masjid', 'detail_masjid.id_user = user.id');
        $this->db->where('detail_masjid.id_user', $id);
        return $this->db->get()->row_array();
    }
}
