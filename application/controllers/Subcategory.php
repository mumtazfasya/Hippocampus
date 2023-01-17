<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcategory extends CI_Controller
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
        $data['title'] = 'Sub Categories';

        $data['parent'] = $this->db->get_where('tb_category', ['parent_category' => 0])->result_array();
        $data['cat'] = $this->db->get_where('tb_category', ['parent_category !=' => 0])->result_array();

        $this->load->view('Theme/Admin/Head', $data);
        $this->load->view('Theme/Admin/Navbar');
        $this->load->view('Theme/Admin/Sidebar');
        $this->load->view('Subcategory/Index');
        $this->load->view('Theme/Admin/Footer');
        $this->load->view('Theme/Admin/Scripts');
    }

    public function add()
    {
        $data['title'] = 'Add Sub Category';

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));
        $parent = htmlspecialchars($this->input->post('parent'));

        if ($this->form_validation->run() == false) {
            redirect('category');
        } else {
            $data = [
                'nama_category' => $nama,
                'parent_category' => $parent
            ];

            $simpan = $this->db->insert('tb_category', $data);

            if ($simpan) {
                $this->session->set_flashdata('success', 'Berhasil menambah data sub kategori');
                redirect('subcategory');
            } else {
                $this->session->set_flashdata('failed', 'Gagal menambah data sub kategori');
                redirect('subcategory');
            }
        }
    }

    public function edit($id = null)
    {
        $data['title'] = 'Ubah Sub Category';

        $data['cat'] = $this->db->get_where('tb_category', ['id_category' => $id])->row_array();
        $data['parent'] = $this->db->get_where('tb_category', ['parent_category' => 0])->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));
        $parent = htmlspecialchars($this->input->post('parent'));

        if ($this->form_validation->run() == false) {
            $this->load->view('Theme/Admin/Head', $data);
            $this->load->view('Theme/Admin/Navbar');
            $this->load->view('Theme/Admin/Sidebar');
            $this->load->view('Subcategory/Form');
            $this->load->view('Theme/Admin/Footer');
            $this->load->view('Theme/Admin/Scripts');
        } else {
            $data = [
                'nama_category' => $nama,
                'parent_category' => $parent
            ];

            $simpan = $this->db->update('tb_category', $data, ['id_category' => $id]);

            if ($simpan) {
                $this->session->set_flashdata('success', 'Berhasil mengubah data sub kategori');
                redirect('subcategory');
            } else {
                $this->session->set_flashdata('failed', 'Gagal mengubah data sub kategori');
                redirect('subcategory');
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('tb_category', ['id_category' => $id]);

        if ($delete) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data sub kategori');
            redirect('subcategory');
        } else {
            $this->session->set_flashdata('failed', 'Gagal menghapus data sub kategori');
            redirect('subcategory');
        }
    }
}
