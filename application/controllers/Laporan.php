<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Laporan Kas';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->email])->row_array();

        $id_user = $this->session->id;
        $data['jurnal'] = $this->db->query("
            SELECT a.id, a.id_transaksi, a.id_user, a.keterangan, a.tgl_transaksi, b.kredit, b.debit 
            FROM jurnal a 
            LEFT JOIN jurnal_detail b ON a.id = b.id_jurnal 
            WHERE a.id_user = ?
            ORDER BY a.tgl_transaksi DESC
        ", array($id_user))->result_array();

        $this->load->view('template_auth/header', $data);
        $this->load->view('template_auth/sidebar', $data);
        $this->load->view('template_auth/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('template_auth/footer');
    }

    public function search()
    {
        $data['title'] = 'Laporan Kas';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $tgl_awal = $this->input->post('tanggal_awal');
        $tgl_akhir = $this->input->post('tanggal_akhir');

        $id_user = $this->session->id;
        $saldo_awal = "
            SELECT a.id, a.id_transaksi, a.id_user, a.keterangan, a.tgl_transaksi, b.kredit, b.debit 
            FROM jurnal a 
            LEFT JOIN jurnal_detail b ON a.id = b.id_jurnal 
            WHERE a.id_user = ? AND DATE(a.tgl_transaksi) < ?
            ORDER BY a.tgl_transaksi ASC
        ";

        $query = "
            SELECT a.id, a.id_transaksi, a.id_user, a.keterangan, a.tgl_transaksi, b.kredit, b.debit 
            FROM jurnal a 
            LEFT JOIN jurnal_detail b ON a.id = b.id_jurnal 
            WHERE a.id_user = ? AND DATE(a.tgl_transaksi) BETWEEN ? AND ?
            ORDER BY a.tgl_transaksi ASC
        ";

        $data['saldo_awal'] = $this->db->query($saldo_awal, array($id_user, $tgl_awal))->result_array();
        $data['jurnal'] = $this->db->query($query, array($id_user, $tgl_awal, $tgl_akhir))->result_array();

        $this->session->set_flashdata('tglawal', $tgl_awal);
        $this->session->set_flashdata('tglakhir', $tgl_akhir);

        $this->load->view('template_auth/header', $data);
        $this->load->view('template_auth/sidebar', $data);
        $this->load->view('template_auth/topbar', $data);
        $this->load->view('laporan/search', $data);
        $this->load->view('template_auth/footer');
    }

    public function cetak()
    {
        $type = $this->input->get('p');
        $tgl_awal = $this->input->get('tglawal');
        $tgl_akhir = $this->input->get('tglakhir');
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_user = $this->session->id;

        if ($type = 'excel') {
            if ($tgl_akhir == null && $tgl_awal == null) {
                $saldo_awal = "SELECT a.id, a.id_transaksi, a.id_user, a.keterangan, a.tgl_transaksi, b.kredit, b.debit 
                    FROM jurnal a
                    LEFT JOIN jurnal_detail b ON a.id = b.id_jurnal 
                    WHERE DATE(a.tgl_transaksi) < '$tgl_awal' AND a.id_user = $id_user 
                    ORDER BY a.tgl_transaksi ASC";

                $query = "SELECT a.id, a.id_transaksi, a.id_user, a.keterangan, a.tgl_transaksi, b.kredit, b.debit 
                    FROM jurnal a 
                    LEFT JOIN jurnal_detail b ON a.id = b.id_jurnal 
                    WHERE a.id_user = $id_user 
                    ORDER BY a.tgl_transaksi ASC";
            } else {
                $saldo_awal = "SELECT a.id, a.id_transaksi, a.id_user, a.keterangan, a.tgl_transaksi, b.kredit, b.debit 
                    FROM jurnal a
                    LEFT JOIN jurnal_detail b ON a.id = b.id_jurnal 
                    WHERE DATE(a.tgl_transaksi) < '$tgl_awal' AND a.id_user = $id_user 
                    ORDER BY a.tgl_transaksi ASC";

                $query = "SELECT a.id, a.id_transaksi, a.id_user, a.keterangan, a.tgl_transaksi, b.kredit, b.debit 
                    FROM jurnal a 
                    LEFT JOIN jurnal_detail b ON a.id = b.id_jurnal 
                    WHERE DATE(a.tgl_transaksi) BETWEEN '$tgl_awal' AND '$tgl_akhir' AND a.id_user = $id_user 
                    ORDER BY a.tgl_transaksi ASC";
            }

            $data['saldo_awal'] = $this->db->query($saldo_awal)->result_array();
            $data['jurnal'] = $this->db->query($query)->result_array();

            $this->session->set_flashdata('tglawal', $tgl_awal);
            $this->session->set_flashdata('tglakhir', $tgl_akhir);

            $this->load->view('cetak/excel', $data);
        } else {
            #
        }
    }

    public function print()
    {
        $type = $this->input->get('p');
        $tgl_awal = $this->input->get('tglawal');
        $tgl_akhir = $this->input->get('tglakhir');
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($type = 'print') {
            if ($tgl_akhir == null && $tgl_awal == null) {
                $saldo_awal = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a
                LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi) < '$tgl_awal' order by a.tgl_transaksi asc";

                $query = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
               LEFT JOIN jurnal_detail b on a.id = b.id_jurnal  order by a.tgl_transaksi asc";
            } else {
                $saldo_awal = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a
                LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi) < '$tgl_awal' order by a.tgl_transaksi asc";

                $query = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
               LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi)  between '$tgl_awal' and '$tgl_akhir'  order by a.tgl_transaksi asc";
            }

            $data['saldo_awal'] = $this->db->query($saldo_awal)->result_array();
            $data['jurnal'] = $this->db->query($query)->result_array();

            $this->session->set_flashdata('tglawal', $tgl_awal);
            $this->session->set_flashdata('tglakhir', $tgl_akhir);

            $this->load->view('cetak/print', $data);
        } else {
            #
        }
    }
}
