<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user') == null || $this->session->userdata('role') != 'Admin') {
            redirect('home');
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Course';

        $data['cat'] = $this->db->get('tb_category')->result_array();
        $this->db->join('tb_category', 'tb_category.id_category = tb_course.id_category');
        $data['course'] = $this->db->get('tb_course')->result_array();

        $this->load->view('Theme/Admin/Head', $data);
        $this->load->view('Theme/Admin/Navbar');
        $this->load->view('Theme/Admin/Sidebar');
        $this->load->view('Course/Index');
        $this->load->view('Theme/Admin/Footer');
        $this->load->view('Theme/Admin/Scripts');
    }

    public function add()
    {
        $data['title'] = 'Add Sub Category';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));
        $desc = htmlspecialchars($this->input->post('desc'));
        $harga = htmlspecialchars($this->input->post('harga'));
        $id_category = htmlspecialchars($this->input->post('id_category'));

        if ($this->form_validation->run() == false) {
            redirect('course');
        } else {
            $file_name = str_replace('.', '', date("dmYHis"));
            $config['upload_path']          = FCPATH . 'assets/img/course/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 5069; // 5MB
            $config['max_width']            = 1280;
            $config['max_height']           = 720;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('thumb')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('failed', $error);
                redirect('course');
            } else {
                $uploaded_data = $this->upload->data();

                $data = [
                    'nama_course' => $nama,
                    'desc_course' => $desc,
                    'harga_course' => $harga,
                    'thumb_course' => $uploaded_data['file_name'],
                    'id_category' => $id_category
                ];

                $simpan = $this->db->insert('tb_course', $data);

                if ($simpan) {
                    $this->session->set_flashdata('success', 'Berhasil menambah data course');
                    redirect('course');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal menambah data course');
                    redirect('course');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['title'] = 'Ubah Course';

        $data['course'] = $this->db->get_where('tb_course', ['id_course' => $id])->row_array();
        $data['cat'] = $this->db->get_where('tb_category')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));
        $desc = htmlspecialchars($this->input->post('desc'));
        $harga = htmlspecialchars($this->input->post('harga'));
        $id_category = htmlspecialchars($this->input->post('id_category'));

        if ($this->form_validation->run() == false) {
            $this->load->view('Theme/Admin/Head', $data);
            $this->load->view('Theme/Admin/Navbar');
            $this->load->view('Theme/Admin/Sidebar');
            $this->load->view('Course/Form');
            $this->load->view('Theme/Admin/Footer');
            $this->load->view('Theme/Admin/Scripts');
        } else {
            $file_name = str_replace('.', '', date("dmYHis"));
            $config['upload_path']          = FCPATH . 'assets/img/course/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 5069; // 5MB
            $config['max_width']            = 1280;
            $config['max_height']           = 720;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('thumb')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('failed', $error);
                redirect('course');
            } else {
                $uploaded_data = $this->upload->data();

                $data = [
                    'nama_course' => $nama,
                    'desc_course' => $desc,
                    'harga_course' => $harga,
                    'thumb_course' => $uploaded_data['file_name'],
                    'id_category' => $id_category
                ];

                $simpan = $this->db->update('tb_course', $data, ['id_course' => $id]);

                if ($simpan) {
                    $this->session->set_flashdata('success', 'Berhasil mengubah data course');
                    redirect('course');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal mengubah data course');
                    redirect('course');
                }
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('tb_course', ['id_course' => $id]);

        if ($delete) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data course');
            redirect('course');
        } else {
            $this->session->set_flashdata('failed', 'Gagal menghapus data course');
            redirect('course');
        }
    }
}
