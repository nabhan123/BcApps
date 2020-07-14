<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persuratan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // pagination
        // load library
        $this->load->library('pagination');

        // config
        // $config['total_rows'] = $this->db->count_all_results();
        $config['total_rows'] = $this->model_masuk->hitungSurat();
        $config['per_page'] = 3;
        // $config['num_links'] = 2;


        // init
        $this->pagination->initialize($config);

        // metod search       
        if ($this->input->post('submit')) {
            $data['search'] = $this->input->post('search');
            // simpan data ke session
            // $this->session->set_userdata('search', $data['search']);
        } else {
            $data['search'] = null;
        }


        $data['start'] = $this->uri->segment(3);
        $data['masuk'] = $this->model_masuk->getSurat($config['per_page'], $data['start'], $data['search']);

        $data['jenis'] = [
            'Umum Eksternal', 'Umum Internal', 'Pembatalan PIB', 'Pembatalan CN/PIBK',
            'Rollback CN/PIBK', 'Aktivasi Modul', 'Rekam Perbaikan PIB', 'Otoritas Pegawai', 'Redis PIB', 'Peminjaman Arsip', 'Permintaan Data'
        ];



        // $this->form_validation->set_rules('jenis_surat', 'Title', 'required');
        // $this->form_validation->set_rules('nomor', 'Menu', 'required');
        // $this->form_validation->set_rules('tgl', 'Url', 'required');
        // $this->form_validation->set_rules('hal', 'Icon', 'required');
        // $this->form_validation->set_rules('asal', 'Icon', 'required');
        // $this->form_validation->set_rules('waktu_rekam', 'Icon', 'required');
        // $this->form_validation->set_rules('nama_rekam', 'Icon', 'required');
        // $this->form_validation->set_rules('status', 'Icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('surat/masuk', $data);
            $this->load->view('templates/footer');
        } else {
            // $data = [
            //     'jenis' => $this->input->post('jenis'),
            //     'nomor' => $this->input->post('nomor'),
            //     'tgl' => $this->input->post('tgl'),
            //     'hal' => $this->input->post('hal'),
            //     'asal' => $this->input->post('asal'),
            //     'waktu_rekam' => $this->input->post('waktu_rekam'),
            //     'nama_rekam' => $this->input->post('jenis'),
            //     'status' => $this->input->post('status')
            // ];

            $this->db->insert('surat_masuk', ['suratmasuk' => $this->input->post('suratmasuk')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New submenu added!
           </div>');
            redirect('persuratan');
        }
    }
    public function surat_k()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('surat/keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $data = [
            'jenis_surat' => $this->input->post('jenis_surat'),
            'nomor' => $this->input->post('nomor'),
            'tgl' => $this->input->post('tgl'),
            'hal' => $this->input->post('hal'),
            'asal' => $this->input->post('asal'),
            'waktu_rekam' => $this->input->post('waktu_rekam'),
            'nama_rekam' => $this->input->post('nama_rekam'),
            'nip_rekam' => $this->input->post('nip_rekam'),
            'status' => $this->input->post('status')
        ];

        $this->db->insert('surat_masuk', $data);
        redirect('persuratan');
    }
    public function edit($id)
    {
        $where = [
            'id' => $id
        ];

        $data['title'] = 'Edit Surat';
        $data['user'] = $this->db->get_where('user', ['nip' =>
        $this->session->userdata('nip')])->row_array();

        $data['surat'] = $this->model_masuk->edit_surat($where, 'surat_masuk')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('surat/edit', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $where = [
            'id' => $id
        ];
        $this->model_masuk->hapus_surat($where, 'surat_masuk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Deleted Success!
            </div>');
        redirect('persuratan');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $jenis_surat = $this->input->post('jenis_surat');
        $nomor = $this->input->post('nomor');
        $tgl = $this->input->post('tgl');
        $hal = $this->input->post('hal');
        $asal = $this->input->post('asal');
        $waktu_rekam = $this->input->post('waktu_rekam');
        $nama_rekam = $this->input->post('nama_rekam');
        $nip_rekam = $this->input->post('nip_rekam');

        $data = [
            'jenis_surat' => $jenis_surat,
            'nomor' => $nomor,
            'tgl' => $tgl,
            'hal' => $hal,
            'asal' => $asal,
            'waktu_rekam' => $waktu_rekam,
            'nama_rekam' => $nama_rekam,
            'nip_rekam' => $nip_rekam
        ];

        $where = [
            'id' => $id
        ];

        $this->model_masuk->update_surat($where, $data, 'surat_masuk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Success!
            </div>');
        redirect('persuratan');
    }
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['masuk'] = $this->model_masuk->tampil_masuk('surat_masuk')->result();

        // load view
        $this->load->view('laporan_pdf', $data);

        // menentukan uk kertas
        $uk_kertas = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($uk_kertas, $orientation);

        // convert to pdf
        $this->dompdf->load_html($html);
        // lakukan rendering
        $this->dompdf->render();
        // menentukan file eksportnya
        $this->dompdf->stream("surat_masuk.pdf", array('Attachment' => 0));
    }
    public function excel()
    {
        $data['masuk'] = $this->model_masuk->tampil_masuk('surat_masuk')->result();

        // panggil file phpExcel

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        // buat objek
        $objek = new PHPExcel();

        // get propertize metod
        $objek->getProperties()->setCreator("BC Juanda Ganas");
        $objek->getProperties()->setLastModifiedBy("BC Juanda Ganas");
        $objek->getProperties()->setTitle("Surat Masuk");

        // mengatur posisi sheet dalam excel
        $objek->setActiveSheetIndex(0);

        // konversi data kita ke excel
        $objek->getActiveSheet()->setCellValue('A1', 'No');
        $objek->getActiveSheet()->setCellValue('B1', 'Jenis Surat');
        $objek->getActiveSheet()->setCellValue('C1', 'Nomor');
        $objek->getActiveSheet()->setCellValue('D1', 'Tgl');
        $objek->getActiveSheet()->setCellValue('E1', 'Hal');
        $objek->getActiveSheet()->setCellValue('F1', 'Waktu Rekam');
        $objek->getActiveSheet()->setCellValue('G1', 'Nama Rekam');
        $objek->getActiveSheet()->setCellValue('H1', 'NIP Rekam');
        $objek->getActiveSheet()->setCellValue('I1', 'Status Rekam');

        $baris = 2;
        $no = 1;

        // mulai memasukan data kedalam table
        foreach ($data['masuk'] as $m) {
            $objek->getActiveSheet()->setCellValue('A1' . $baris, $no++);
            $objek->getActiveSheet()->setCellValue('B1' . $baris, $m->jenis_surat);
            $objek->getActiveSheet()->setCellValue('C1' . $baris, $m->nomor);
            $objek->getActiveSheet()->setCellValue('D1' . $baris, $m->tgl);
            $objek->getActiveSheet()->setCellValue('E1' . $baris, $m->hal);
            $objek->getActiveSheet()->setCellValue('F1' . $baris, $m->waktu_rekam);
            $objek->getActiveSheet()->setCellValue('G1' . $baris, $m->nama_rekam);
            $objek->getActiveSheet()->setCellValue('H1' . $baris, $m->nip_rekam);
            $objek->getActiveSheet()->setCellValue('I1' . $baris, $m->status);

            $baris++;
        }
        // menentukan nama file yang nanti di eksport
        $file_name = "Surat_Masuk" . '.xlsx';

        // set title
        $objek->getActiveSheet()->setTitle("Surat Masuk");

        header('Pragma: public');
        header('Expires: 0');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Type: application/force-download');
        header('Content-Type: application/octet-stream');
        header('Content-Type: application/download');
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

        $writer = PHPExcel_IOFactory::createwriter($objek, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function print()
    {
        $data['masuk'] = $this->model_masuk->tampil_masuk('surat_masuk')->result();
        $this->load->view('surat/print_masuk', $data);
    }
}
