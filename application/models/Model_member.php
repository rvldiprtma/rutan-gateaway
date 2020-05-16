
    
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_member extends CI_Model
{

    //    public function data()
    // {
    //        $this->db->join('status_pendidikan_', 'user.status_pendidikan=status_pendidikan_.id','left');
    //        $data = $this->db->get('user')->result();
    //        return $data;
    // }

    public function getAllMember()
    {
        $this->db->where('role_id !=', 1);
        $this->db->where('role_id !=', 2);
        return $this->db->get('user')->result_array();
    }
}
