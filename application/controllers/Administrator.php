
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_getOption', 'instansi_penahanan');

        $this->load->model('Model_menu', 'menu');

        is_logged_in();
    }


    public function index()
    {

        $this->load->model('Model_member', 'getData');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "Member Manajemen";
        $data['menu_aktif'] = "Member";

        $data['all_member'] = $this->getData->getAllMember();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('administrator/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function add_Member()

    {

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Format Email tidak valid!',
            'is_unique' => 'Email sudah terdaftar!',
        ]);

        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim', [
            'required' => 'Nomor HP tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('instansi_penahanan', 'Instansi Penahanan', 'required|trim', [
            'required' => 'Instansi Penahanan harus dipilih!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password tidak boleh kosong!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {

            //data user login (dengan session)
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data['title'] = "Tambah Member";
            $data['menu_aktif'] = "Member";

            //data diambil dari tabel instansi_penahanan
            $data['instansi_penahanan'] = $this->instansi_penahanan->get_instansi_penahanan();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('administrator/add_member', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => htmlspecialchars($this->input->post('nomor_hp', true)),
                'instansi_penahanan' => htmlspecialchars($this->input->post('instansi_penahanan')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time(),

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> membuat member baru.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Administrator');
        }
    }

    public function edit_Member()
    {

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Format Email tidak valid!',
            'is_unique' => 'Email sudah terdaftar!',
        ]);

        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim', [
            'required' => 'Nomor HP tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('instansi_penahanan', 'Instansi Penahanan', 'required|trim', [
            'required' => 'Instansi Penahanan harus dipilih!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password tidak boleh kosong!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {

            //data user login (dengan session)
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data['title'] = "Edit Member";
            $data['menu_aktif'] = "Member";

            //data diambil dari database, tabel instansi_penahanan
            $data['instansi_penahanan'] = $this->instansi_penahanan->get_instansi_penahanan();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('administrator/edit_member', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => htmlspecialchars($this->input->post('nomor_hp', true)),
                'instansi_penahanan' => htmlspecialchars($this->input->post('instansi_penahanan')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time(),

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> membuat member baru.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Administrator');
        }
    }

    public function deleteMember()
    {
    }


    // SUDAH FIX

    public function role()
    {

        $this->load->model('Model_member', 'getData');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "Role Manajemen";
        $data['menu_aktif'] = "Role";

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('nama_role', 'Role', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('administrator/role', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('nama_role')]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                    Menambahkan Role Baru !!!
                </div>'
            );
            redirect('administrator/role');
        }
    }

    public function editRole()
    {

        $this->form_validation->set_rules('nama_role', 'Nama Role', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $this->menu->updateRole();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                    Updated Role!
                </div>'
            );
            redirect('administrator/role');
        }
    }

    public function deleteRole($id)
    {
        $this->menu->deleteRole($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="fas fa-exclamation-circle"></i> Success!</h4>
                Deleted role !!!
            </div>'
        );
        redirect('administrator/role');
    }


    public function roleAccess($role_id)
    {

        $this->load->model('Model_member', 'getData');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "Role Access Manajemen";
        $data['menu_aktif'] = "Role";

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        // $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('administrator/role-access', $data);
        $this->load->view('template/footer', $data);
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id,

        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Akses berhasil diupdate. </div>');
    }
}
