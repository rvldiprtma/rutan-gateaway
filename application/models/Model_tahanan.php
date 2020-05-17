<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tahanan extends CI_Model
{

	public function getAll()
	{
		return $this->db->query("SELECT *, tahanan.id AS tahanan_id FROM tahanan INNER JOIN pihak_penahanan ON (tahanan.pihak_penahanan = pihak_penahanan.id);");
	}
}
