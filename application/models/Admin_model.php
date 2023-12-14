<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function get_data()
    {
        return $this->db->get('user')->result_array();
    }

    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    public function getKasMasuk()
    {
        // Menghitung total_masuk dari tabel 'kas' dengan tipe 'masuk'
        $id_user = $this->session->id;
        $query_masuk = $this->db->query("SELECT SUM(nominal) as kas_masuk FROM kas WHERE tipe_kas = 'masuk' AND id_user = ?", array($id_user))->row_array();
        $kas_masuk = $query_masuk['kas_masuk'];

        return $kas_masuk;
    }

    public function getKasKeluar()
    {
        // Menghitung total_keluar dari tabel 'kas' dengan tipe 'keluar'
        $id_user = $this->session->id;
        $query_keluar = $this->db->query("SELECT SUM(nominal) as kas_keluar FROM kas WHERE tipe_kas = 'keluar' AND id_user = ?", array($id_user))->row_array();
        $kas_keluar = $query_keluar['kas_keluar'];

        return $kas_keluar;
    }

    public function getTotalKas()
    {
        // Menghitung total_masuk dari tabel 'kas' dengan tipe 'masuk'
        $id_user = $this->session->userdata("id");
        $query_masuk = $this->db->query("SELECT SUM(nominal) as total_masuk FROM kas WHERE tipe_kas = 'masuk' AND id_user = ?", array($id_user))->row_array();
        $total_masuk = $query_masuk['total_masuk'];

        // Menghitung total_keluar dari tabel 'kas' dengan tipe 'keluar'
        $query_keluar = $this->db->query("SELECT SUM(nominal) as total_keluar FROM kas WHERE tipe_kas = 'keluar' AND id_user = ?", array($id_user))->row_array();
        $total_keluar = $query_keluar['total_keluar'];

        // Menghitung total kas dengan menambah total_masuk, total_keluar, dan total_transaksi
        $total_kas = $total_masuk - $total_keluar;

        return $total_kas;
    }

    public function getTotalDonasi()
    {
        $id_user = $this->session->id;
        $quer = $this->db->query("SELECT SUM(nominal) as total_transaksi FROM tbl_transaksi WHERE id_user = ?", array($id_user))->row_array();
        $total_transaksi = $quer['total_transaksi'];

        return $total_transaksi;
    }
}
