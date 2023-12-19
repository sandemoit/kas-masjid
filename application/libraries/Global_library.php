<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Global_library
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->database();
    }

    public function get_settings()
    {
        return $this->CI->db->get('setting')->row_array();
    }
}
