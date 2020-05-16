
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('welcome');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Format Email tidak valid!',
        ]);

        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Password tidak boleh kosong!',
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // user ad
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];

                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {

                        redirect('administrator');
                    } else if ($user['role_id'] == 2) {

                        redirect('member');
                    } else {

                        redirect('guest');
                    }
                } else {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah. </div>');
                    redirect('Auth');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username/Email tidak aktif atau di blokir. </div>');
                redirect('Auth');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username/Email tidak dikenali atau belum terdaftar. </div>');
            redirect('Auth');
        }
    }


    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('welcome');
        }

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

        $this->load->model('Model_getOption', 'instansi_penahanan');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registarsi Rahasia Administrator';
            $data['instansi_penahanan'] = $this->instansi_penahanan->get_instansi_penahanan();
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('template/auth_footer');
        } else {
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => htmlspecialchars($this->input->post('nomor_hp', true)),
                'instansi_penahanan' => htmlspecialchars($this->input->post('instansi_penahanan')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time(),

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Baru Berhasil Dibuat!, Silahkan Login. </div>');
            redirect('Auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil logout! </div>');
        redirect('Auth');
    }

    // public function blocked()
    // {
    //     is_logged_in();
    //     $this->load->view('auth/blocked');
    // }
}
