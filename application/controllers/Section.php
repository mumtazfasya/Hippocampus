<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user') == null || $this->session->userdata('role') != 'Admin') {
            redirect('home');
        }
        $this->load->library('form_validation');
    }

    public function index($id_course)
    {
        $data['title'] = 'Section';

        $data['id_course'] = $id_course;

        $data['sec'] = $this->db->get_where('tb_section', ['id_course' => $id_course])->result_array();

        $this->load->view('Theme/Admin/Head', $data);
        $this->load->view('Theme/Admin/Navbar');
        $this->load->view('Theme/Admin/Sidebar');
        $this->load->view('Section/Index');
        $this->load->view('Theme/Admin/Footer');
        $this->load->view('Theme/Admin/Scripts');
    }

    public function add($id_course)
    {
        $data['title'] = 'Add Section';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('desc', 'Desc', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));
        $desc = htmlspecialchars($this->input->post('desc'));

        if ($this->form_validation->run() == false) {
            redirect('section/' . $id_course);
        } else {
            $data = [
                'nama_section' => $nama,
                'desc_section' => $desc,
                'id_course' => $id_course
            ];

            $simpan = $this->db->insert('tb_section', $data);

            if ($simpan) {
                $this->session->set_flashdata('success', 'Berhasil menambah data section');
                redirect('section/' . $id_course);
            } else {
                $this->session->set_flashdata('failed', 'Gagal menambah data section');
                redirect('section/' . $id_course);
            }
        }
    }

    public function edit($id = null)
    {
        $data['title'] = 'Ubah Section';
        $data['sec'] = $this->db->get_where('tb_section', ['id_section' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('desc', 'Desc', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));
        $desc = htmlspecialchars($this->input->post('desc'));

        if ($this->form_validation->run() == false) {
            $this->load->view('Theme/Admin/Head', $data);
            $this->load->view('Theme/Admin/Navbar');
            $this->load->view('Theme/Admin/Sidebar');
            $this->load->view('Section/Form');
            $this->load->view('Theme/Admin/Footer');
            $this->load->view('Theme/Admin/Scripts');
        } else {
            $data = [
                'nama_section' => $nama,
                'desc_section' => $desc
            ];

            $simpan = $this->db->update('tb_section', $data, ['id_section' => $id]);

            if ($simpan) {
                $this->session->set_flashdata('success', 'Berhasil mengubah data section');
                redirect('course');
            } else {
                $this->session->set_flashdata('failed', 'Gagal mengubah data section');
                redirect('course');
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('tb_section', ['id_section' => $id]);

        if ($delete) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data section');
            redirect('course');
        } else {
            $this->session->set_flashdata('failed', 'Gagal menghapus data section');
            redirect('course');
        }
    }
}
