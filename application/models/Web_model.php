<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web_model extends CI_Model
{
    public function getMasjid($limit = null, $start = null, $id = null)
    {
        if ($id != null) {
            $this->db->where('detail_masjid.id_user', $id);
        }
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('detail_masjid');
        $this->db->join('user', 'user.id = detail_masjid.id_user');
        return $this->db->get()->result_array();
    }

    public function getDetail($id)
    {
        $this->db->select('*');
        $this->db->from('detail_masjid');
        $this->db->join('user', 'user.id = detail_masjid.id_user');
        $this->db->where('detail_masjid.id_user', $id);
        return $this->db->get()->row_array();
    }

    public function getKegiatan($id)
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->join('user', 'user.id = kegiatan.id_user');
        $this->db->where('kegiatan.id_user', $id);
        return $this->db->get()->result_array();
    }
}
