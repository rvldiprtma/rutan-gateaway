<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_menu extends CI_Model
{

    //    public function data()
    // {
    //        $this->db->join('status_pendidikan_', 'user.status_pendidikan=status_pendidikan_.id','left');
    //        $data = $this->db->get('user')->result();
    //        return $data;
    // }

    public function getSubmenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return  $this->db->query($query)->result_array();
    }

    public function deleteMenu($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('user_menu');
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function deleteSubmenu($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('user_menu');
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }

    // public function getIdSubmenu($id)
    // {
    //     return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    // }

    public function updateSubmenu()
    {
        $data = [
            'title' => $this->input->post('nama_submenu', true),
            'menu_id' => $this->input->post('menu_id', true),
            'url' => empty($_POST['url_submenu']) ? '#' : $this->input->post('url_submenu', true),
            'icon' => $this->input->post('icon_submenu', true),
            'is_active' => empty($_POST['is_active']) ? '0' : $this->input->post('is_active', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

    // public function getIdMenu($id)
    // {
    //     return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    // }


    public function updateMenu()
    {
        $data = [
            'menu' => $this->input->post('nama_menu', true),
        ];
        $this->db->where('id', $this->input->post('menu_id'));
        $this->db->update('user_menu', $data);
    }

    public function updateRole()
    {
        $data = [
            'role' => $this->input->post('nama_role', true),
        ];
        $this->db->where('id', $this->input->post('role_id'));
        $this->db->update('user_role', $data);
    }

    public function deleteRole($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('user_menu');
        $this->db->delete('user_role', ['id' => $id]);
    }
}
