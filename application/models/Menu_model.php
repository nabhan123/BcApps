<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`. *, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        
        ";
        return $this->db->query($query)->result_array();
    }
    public function edit_submenu($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_submenu($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_submenu($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
