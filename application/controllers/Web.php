<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Web_model');
    }

    public function index()
    {
        $data['masjid'] = $this->Web_model->getMasjid(8, 0);
        $this->load->view('frontend/web', $data);
    }

    public function detailMasjid()
    {
        $id = $this->uri->segment(2);
        $data['masjid'] = $this->Web_model->getDetail($id);
        $data['kegiatan'] = $this->Web_model->getKegiatan($id);

        if (!$data['masjid']) {
            show_404();
        }

        $this->load->view('frontend/layout/header', $data);
        $this->load->view('frontend/masjid_detail');
        $this->load->view('frontend/layout/footer');
    }
}
