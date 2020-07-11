<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_masuk extends CI_Model
{
    public function tampil_masuk()
    {
        return $this->db->get_where('surat_masuk');
    }
    public function edit_surat($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function hapus_surat($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_surat($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hitungSurat()
    {
        return $this->db->get('surat_masuk')->num_rows();
    }
    public function getSurat($limit, $start, $search = null)
    {
        if ($search) {
            $this->db->like('jenis_surat', $search);
        }
        return $this->db->get('surat_masuk', $limit, $start)->result_array();
    }
}
