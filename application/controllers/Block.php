<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Block extends CI_Controller
{

    public function index()
    {

        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $uri = $this->uri->segment(1);
        $this->load->view('auth/blocked');
    }
}
