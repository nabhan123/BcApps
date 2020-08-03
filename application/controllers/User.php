<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        # code...
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // echo 'Selamat Datang' . $data['user']['name'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // buat aturan inputan
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $nip = $this->input->post('nip');

            // cek jika ada gambar yang di upload
            $upload_image = $_FILES['image']['name'];

            // jika ada yang diupload
            if ($upload_image) {
                // lakukan cek
                $old_image =  $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    // simpan gambar ke dalam path berikut
                    unlink(FCPATH . 'assets/admin/dist/img/Profile/' . $old_image);
                }
                // kita beri aturan untuk gambarnya
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/admin/dist/img/Profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->upload->display_errors();
                }
            }
            // jalankan query
            $this->db->set('name', $name);
            $this->db->where('nip', $nip);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Your profile has been updated!
        </div>');
            // pindah halaman
            redirect('user');
        }
    }
    public function ubah_password()
    {
        # code...
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'New Password', 'required|trim|matches[new_password1]');
        // form_validation
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $current_pwd = $this->input->post('current_password');
            $new_pwd = $this->input->post('new_password1');

            if (!password_verify($current_pwd, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password lama salah!
               </div>');
                // pindah halaman
                redirect('user/ubah_password');
            } else {
                if ($current_pwd == $new_pwd) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru sama dengan password lama!
                   </div>');
                    // pindah halaman
                    redirect('user/ubah_password');
                } else {
                    // kalo beda
                    $pwd_hash = password_hash($new_pwd, PASSWORD_DEFAULT);

                    $this->db->set('password', $pwd_hash);
                    $this->db->where('nip', $this->session->userdata('nip'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password baru!
                   </div>');
                    // pindah halaman
                    redirect('user/ubah_password');
                }
            }
        }
        // echo 'Selamat Datang' . $data['user']['name'];
    }
    public function arsip_surat()
    {
        $data['title'] = 'Arsip Surat';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('surat/arsip', $data);
        $this->load->view('templates/footer');
    }
}
