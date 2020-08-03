<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_keluar extends CI_Model
{
    public function tampil_keluar()
    {
        return $this->db->get_where('surat_keluar');
    }
    public function edit_surat_k($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_surat_k($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_surat_k($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
