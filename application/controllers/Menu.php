<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        # code...
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        // buat rule nya
        $this->form_validation->set_rules('menu', 'menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New menu added!
           </div>');
            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        
        // load model
        $this->load->model('Menu_model', 'menu');

        $data['submenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get_where('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New submenu added!
            </div>');
            redirect('menu/submenu');
        }
    }
    public function editSubmenu($id)
    {
        $where = [
            'id' => $id
        ];

        $data['title'] = 'Edit Surat';
        $data['user'] = $this->db->get_where('user', ['nip' =>
        $this->session->userdata('nip')])->row_array();

        $data['submenu'] = $this->Menu_model->edit_submenu($where, 'user_sub_menu')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/edit', $data);
        $this->load->view('templates/footer');    
    }
    public function hapus($id)
    {
        $where = [
            'id' => $id
        ];
        $this->Menu_model->hapus_submenu($where, 'user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Deleted Success!
            </div>');
        redirect('menu/submenu');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $menu_id = $this->input->post('menu_id');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active = $this->input->post('is_active');
    
        $data = [
            'title' => $title,
            'menu_id' => $menu_id,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active
           
        ];  
        $where = [
            'id' => $id
        ];
    
        $this->Menu_model->update_submenu($where, $data, 'user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Update Success!
        </div>');
        redirect('menu/submenu');  
      }
    }


