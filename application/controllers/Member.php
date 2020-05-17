
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Model_getOption', 'pihak_penahanan');
		$this->load->model('Model_tahanan', 'tahanan');

		is_logged_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Tahanan Manajemen";
		$data['menu_aktif'] = "Tahanan";

		$data['tahanan'] = $this->tahanan->getAll()->result();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('member/index', $data);
		$this->load->view('template/footer', $data);
	}


	public function add_tahanan()
	{
		if ($this->input->post()) {
			$this->db->insert('tahanan', $this->input->post());
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil ditambahkan. </div>');
			redirect('member');
		}

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Tambah Tahanan";
		$data['menu_aktif'] = "Tahanan";

		//data ini diambil dari database, table pihak_penahanan
		$data['pihak_penahanan'] = $this->pihak_penahanan->get_pihak_penahanan();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('member/add_tahanan', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_tahanan($id)
	{
		if ($this->input->post()) {
			$this->db->update('tahanan', $this->input->post(), ['id' => $this->input->post('id')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil diubah. </div>');
			redirect('member');
		}

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Edit Tahanan";
		$data['menu_aktif'] = "Tahanan";

		//data ini diambil dari database, table pihak_penahanan
		$data['pihak_penahanan'] = $this->pihak_penahanan->get_pihak_penahanan();

		$data['tahanan'] = $this->db->get_where('tahanan', ['id' => $id], 1)->row();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('member/edit_tahanan', $data);
		$this->load->view('template/footer', $data);
	}

	public function delete_tahanan($id)
	{
		$this->db->delete('tahanan', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data berhasil dihapus. </div>');
		redirect('member');
	}
}
