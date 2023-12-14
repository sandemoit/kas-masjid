<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('Donatur_model');
    }

    public function donatur()
    {
        $data['title'] = 'Data Donatur';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['donatur'] = $this->db->get_where('tbl_donatur', ['id_user' =>   $this->session->userdata("id")])->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar', $data);
            $this->load->view('template_auth/topbar', $data);
            $this->load->view('admin/donatur', $data);
            $this->load->view('template_auth/footer');
        } else {
            $data = [
                'id_user' => $this->input->post('id_user'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->db->insert('tbl_donatur', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
            New Donatur added!
          </div>');
            redirect('transaksi/donatur');
        }
    }

    public function updatedonatur()
    {
        $data['title'] = 'Data Donatur';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['donatur'] = $this->db->get('tbl_donatur')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar', $data);
            $this->load->view('template_auth/topbar', $data);
            $this->load->view('admin/donatur', $data);
            $this->load->view('template_auth/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->db->where('id', $id);
            $this->db->update('tbl_donatur', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
           Update donatur ' . $this->input->post('nama') . ' berhasil!
          </div>');
            redirect('transaksi/donatur');
        }
    }

    public function deleteDonatur()
    {
        $id = $this->input->get('id');
        $this->db->delete('tbl_donatur', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
            Hapus Berhasil!
          </div>');
        redirect('transaksi/donatur');
    }

    public function donasi()
    {
        $data['title'] = 'Data Donasi';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['donatur'] = $this->db->get('tbl_donatur')->result_array();

        $this->db->order_by("tgl_transaksi", "asc");
        $data['donasi'] = $this->db->get_where('tbl_transaksi', ['id_user' =>  $this->session->userdata("id")])->result_array();

        $data['total_donasi'] = $this->Admin_model->getTotalDonasi();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar', $data);
            $this->load->view('template_auth/topbar', $data);
            $this->load->view('transaksi/donasi', $data);
            $this->load->view('template_auth/footer');
        } else {

            $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
            $kas =  $this->db->get_where('kas', ['id_transaksi' => $idtransaksi])->row_array();
            if ($kas) {
                $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
            }

            $anggota =  $this->db->get_where('tbl_donatur', ['id' => $this->input->post('nama')])->row_array();

            $data = [
                'id_transaksi' => $idtransaksi,
                'nama_transaksi' => 'Donasi A/n ' . $anggota['nama'],
                'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal')),
                'tgl_transaksi' =>  $this->input->post('tanggal'),
                'id_donatur' =>  $this->input->post('nama'),
                'jenis' => 'kas masuk'

            ];

            $data_kas = [
                'id_transaksi' => $idtransaksi,
                'tipe_kas' => 'masuk',
                'tgl_transaksi' => $this->input->post('tanggal'),
                'keterangan' => 'Donasi A/n ' . $anggota['nama'],
                'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal'))
            ];

            $this->db->insert('kas', $data_kas);
            $this->db->insert('tbl_transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
           Tambah Donasi A/n ' . $anggota['nama'] . '  Berhasil!
          </div>');
            redirect('transaksi/donasi');
        }
    }

    public function deleteDonasi()
    {
        $id = $this->input->get('id');

        $donasi =  $this->db->get_where('tbl_transaksi', ['id_transaksi' => $id])->row_array();
        $kas =  $this->db->get_where('kas', ['id_transaksi' => $donasi['id_transaksi']])->row_array();
        $jurnal =  $this->db->get_where('jurnal', ['id_transaksi' => $kas['id_transaksi']])->row_array();

        $this->db->delete('tbl_transaksi', array('id_transaksi' => $id));
        $this->db->delete('kas', array('id_transaksi' => $donasi['id_transaksi']));
        $this->db->delete('jurnal', array('id_transaksi' => $kas['id_transaksi']));
        $this->db->delete('jurnal_detail', array('id_jurnal' => $jurnal['id']));


        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
            Hapus Donasi Berhasil!
          </div>');
        redirect('transaksi/donasi');
    }

    public function cetak()
    {
        $this->load->view('cetak/sertifikat');
    }
    public function invoice()
    {
        $this->load->view('cetak/print');
    }

    public function kaskeluar()
    {
        $data['title'] = 'Kas Keluar';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_user =  $this->session->userdata("id");
        $data['kaskeluar'] = $this->db->query("SELECT * FROM kas WHERE tipe_kas = 'keluar' AND id_user = ?", array($id_user))->result_array();

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar', $data);
            $this->load->view('template_auth/topbar', $data);
            $this->load->view('transaksi/kaskeluar', $data);
            $this->load->view('template_auth/footer');
        } else {
            $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
            $kas =  $this->db->get_where('kas', ['id_transaksi' => $idtransaksi])->row_array();
            if ($kas) {
                $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
            }
            $data = [
                'id_transaksi' => $idtransaksi,
                'tipe_kas' => 'keluar',
                'keterangan' => $this->input->post('keterangan'),
                'tgl_transaksi' => $this->input->post('tanggal'),
                'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal'))
            ];

            $this->db->insert('kas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
            Kas Keluar berhasil ditambah!
          </div>');
            redirect('transaksi/kaskeluar');
        }
    }

    public function kasmasuk()
    {
        $data['title'] = 'Kas Masuk';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_user =  $this->session->userdata("id");
        $data['kasmasuk'] = $this->db->query("SELECT * FROM kas WHERE tipe_kas = 'masuk' AND id_user = ?", array($id_user))->result_array();

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_auth/header', $data);
            $this->load->view('template_auth/sidebar', $data);
            $this->load->view('template_auth/topbar', $data);
            $this->load->view('transaksi/kasmasuk', $data);
            $this->load->view('template_auth/footer');
        } else {
            $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
            $kas =  $this->db->get_where('kas', ['id_transaksi' => $idtransaksi])->row_array();
            if ($kas) {
                $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
            }
            $data = [
                'id_transaksi' => $idtransaksi,
                'tipe_kas' => 'masuk',
                'keterangan' => $this->input->post('keterangan'),
                'tgl_transaksi' => $this->input->post('tanggal'),
                'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal'))
            ];
            $this->db->insert('kas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
            Kas Masuk berhasil ditambah!
          </div>');
            redirect('transaksi/kasmasuk');
        }
    }
}
