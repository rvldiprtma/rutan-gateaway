<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_registrasi extends CI_Model
{

    //    public function data()
    // {
    //        $this->db->join('status_pendidikan_', 'user.status_pendidikan=status_pendidikan_.id','left');
    //        $data = $this->db->get('user')->result();
    //        return $data;
    // }

    public function get_instansi_penahanan()
    {
        $data = $this->db->get('instansi_penahanan')->result();
        return $data;
    }

    public function get_pihak_penahanan()
    {
        $data = $this->db->get('instansi_penahanan')->result();
        return $data;
    }
}
