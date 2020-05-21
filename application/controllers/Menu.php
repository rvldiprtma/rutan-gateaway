
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_menu', 'menu');

        is_logged_in();
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "Menu Manajemen";
        $data['menu_aktif'] = "Menu Manajemen";

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('nama_menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('nama_menu')]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                    Menambahkan Menu Baru !!!
                </div>'
            );
            redirect('menu');
        }
    }

    public function submenu()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "Submenu Manajemen";
        $data['menu_aktif'] = "Submenu Manajemen";

        $this->load->model('Model_menu', 'menu');

        $data['submenu'] = $this->menu->getSubmenu();
        $data['menu'] = $this->db->get('user_menu')->result();


        $this->form_validation->set_rules('nama_submenu', 'Submenu', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('icon_submenu', 'Icon Menu', 'required');
        $this->form_validation->set_rules('url_submenu', 'URL Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer', $data);
        } else {

            $data = [
                'title' => $this->input->post('nama_submenu'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url_submenu'),
                'icon' => $this->input->post('icon_submenu'),
                'is_active' => $this->input->post('is_active') ? $this->input->post('is_active') : 0,

            ];

            $this->db->insert('user_sub_menu', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                    Menambahkan Submenu Baru !!!
                </div>'
            );
            redirect('menu/submenu');
        }
    }

    public function deleteMenu($id)
    {
        $this->menu->deleteMenu($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                Deleted menu !!!
            </div>'
        );
        redirect('menu');
    }

    public function deleteSubmenu($id)
    {
        $this->menu->deleteSubmenu($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                Deleted Submenu !!!
            </div>'
        );
        redirect('menu/submenu');
    }

    public function editSubmenu()
    {
        // $data['submenuId'] = $this->menu->getIdSubmenu($id);

        $this->form_validation->set_rules('nama_submenu', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('icon_submenu', 'Icon', 'required');
        $this->form_validation->set_rules('url_submenu', 'Url', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $this->menu->updateSubmenu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                    Updated submenu!
                </div>'
            );
            redirect('menu/submenu');
        }
    }

    public function editMenu()
    {

        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $this->menu->updateMenu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                    Updated Menu!
                </div>'
            );
            redirect('menu');
        }
    }
}
