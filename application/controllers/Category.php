<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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
        $data['title'] = 'Categories';

        $data['cat'] = $this->db->get('tb_category')->result_array();

        $this->load->view('Theme/Admin/Head', $data);
        $this->load->view('Theme/Admin/Navbar');
        $this->load->view('Theme/Admin/Sidebar');
        $this->load->view('Category/Index');
        $this->load->view('Theme/Admin/Footer');
        $this->load->view('Theme/Admin/Scripts');
    }

    public function add()
    {
        $data['title'] = 'Add Category';

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));

        if ($this->form_validation->run() == false) {
            redirect('category');
        } else {
            $data = [
                'nama_category' => $nama
            ];

            $simpan = $this->db->insert('tb_category', $data);

            if ($simpan) {
                $this->session->set_flashdata('success', 'Berhasil menambah data kategori');
                redirect('category');
            } else {
                $this->session->set_flashdata('failed', 'Gagal menambah data kategori');
                redirect('category');
            }
        }
    }

    public function edit($id = null)
    {
        $data['title'] = 'Ubah Category';
        $data['cat'] = $this->db->get_where('tb_category', ['id_category' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));

        if ($this->form_validation->run() == false) {
            $this->load->view('Theme/Admin/Head', $data);
            $this->load->view('Theme/Admin/Navbar');
            $this->load->view('Theme/Admin/Sidebar');
            $this->load->view('Category/Form');
            $this->load->view('Theme/Admin/Footer');
            $this->load->view('Theme/Admin/Scripts');
        } else {
            $data = [
                'nama_category' => $nama
            ];

            $simpan = $this->db->update('tb_category', $data, ['id_category' => $id]);

            if ($simpan) {
                $this->session->set_flashdata('success', 'Berhasil mengubah data kategori');
                redirect('category');
            } else {
                $this->session->set_flashdata('failed', 'Gagal mengubah data kategori');
                redirect('category');
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('tb_category', ['id_category' => $id]);

        if ($delete) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data kategori');
            redirect('category');
        } else {
            $this->session->set_flashdata('failed', 'Gagal menghapus data kategori');
            redirect('category');
        }
    }
}
