<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        // kasih session jika ada
        if ($this->session->userdata('nip')) {
            redirect('user');
        }
        // 2. tambahkan rule untuk form inputan
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('password', 'Password ', 'required|trim');
        // 1. validasi
        // jika salah
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Halaman Login';
            $this->load->view('templates/header_L', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('templates/footer');
            // jika benar arahkan ke function _login
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        // kita ambil nip & pwd yang lolos validasi
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');

        // kita query db dengan mencari user berdasarkan
        // inputan
        $user = $this->db->get_where('user', ['nip' => $nip])->row_array();

        // kita cek jika usernya ada
        if ($user) {
            // jika ada cek usernya aktif atau tidak
            if ($user['is_active'] == 1) {
                // kita cek pwd
                if (password_verify($password, $user['password'])) {
                    // jika benar
                    // siapkan session
                    $data = [
                        'nip' => $user['nip'],
                        'role_id' => $user['role_id']
                    ];
                    // simpan ke session
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah! 
               </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                NIP is not active! 
               </div>');
                redirect('auth');
            }
            // jika tidak ada
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                NIP is not registered! 
               </div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        // 2. kita beri aturan untuk form inputan
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[user.nip]', [
            'is_unique' => 'This NIP has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        // 1.melakukan validasi pada form inputan
        // jika gagal validasi
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Registrasi';
            $this->load->view('templates/header_L', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templates/footer');
            // jika benar 
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'date_created' => time(),
                'is_active' => 1,
                'role_id' => 2
            ];
            //masukkan ke db 
            $this->db->insert('user', $data);
            // kasih flashdata
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation your account has been created! Please Login
               </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        // kita unset setiap session nya
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logout!
           </div>');
        redirect('auth');
    }
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'alvianakmaln@gmail.com',
            'smtp_pass' => 'Akmaln123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        // siapkan email
        $this->email->from('alvianakmaln@gmail.com', 'Reset Password');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account   : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password  : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
