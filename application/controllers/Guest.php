
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('Model_getOption', 'pihak_penahanan');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "List Masa Tahanan Mulai dari Kurang 10 Hari";
        $data['menu_aktif'] = "Konfirmasi";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('guest/index', $data);
        $this->load->view('template/footer', $data);
    }
}
