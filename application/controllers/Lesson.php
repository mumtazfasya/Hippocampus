<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lesson extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user') == null || $this->session->userdata('role') != 'Admin') {
            redirect('home');
        }
        $this->load->library('form_validation');
    }

    public function index($id_section)
    {
        $data['title'] = 'Lesson';

        $data['id_section'] = $id_section;

        $data['les'] = $this->db->get_where('tb_lesson', ['id_section' => $id_section])->result_array();

        $this->load->view('Theme/Admin/Head', $data);
        $this->load->view('Theme/Admin/Navbar');
        $this->load->view('Theme/Admin/Sidebar');
        $this->load->view('Lesson/Index');
        $this->load->view('Theme/Admin/Footer');
        $this->load->view('Theme/Admin/Scripts');
    }

    public function add($id_section)
    {
        $data['title'] = 'Add Lesson';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('desc', 'Desc', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));
        $desc = htmlspecialchars($this->input->post('desc'));
        $type = htmlspecialchars($this->input->post('type'));

        if ($this->form_validation->run() == false) {
            redirect('lesson/' . $id_section);
        } else {
            $file_name = str_replace('.', '', date("dmYHis"));
            $config['upload_path']          = FCPATH . 'assets/docs/lesson/';
            $config['allowed_types']        = 'doc|docx|pdf|jpg|jpeg|png|txt|zip|rar';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 10138; // 5MB
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('attr')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('failed', $error);
                redirect('profil-user');
            } else {
                $uploaded_data = $this->upload->data();

                $data = [
                    'nama_lesson' => $nama,
                    'desc_lesson' => $desc,
                    'type_lesson' => $type,
                    'attr_lesson' => $uploaded_data['file_name'],
                    'id_section' => $id_section
                ];

                $simpan = $this->db->insert('tb_lesson', $data);

                if ($simpan) {
                    $this->session->set_flashdata('success', 'Berhasil menambah data lesson');
                    redirect('lesson/' . $id_section);
                } else {
                    $this->session->set_flashdata('failed', 'Gagal menambah data lesson');
                    redirect('lesson/' . $id_section);
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['title'] = 'Ubah Lesson';
        $data['les'] = $this->db->get_where('tb_lesson', ['id_lesson' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('desc', 'Desc', 'required');

        $nama = htmlspecialchars($this->input->post('nama'));
        $desc = htmlspecialchars($this->input->post('desc'));
        $type = htmlspecialchars($this->input->post('type'));

        if ($this->form_validation->run() == false) {
            $this->load->view('Theme/Admin/Head', $data);
            $this->load->view('Theme/Admin/Navbar');
            $this->load->view('Theme/Admin/Sidebar');
            $this->load->view('Lesson/Form');
            $this->load->view('Theme/Admin/Footer');
            $this->load->view('Theme/Admin/Scripts');
        } else {
            $file_name = str_replace('.', '', date("dmYHis"));
            $config['upload_path']          = FCPATH . 'assets/docs/lesson/';
            $config['allowed_types']        = 'doc|docx|pdf|jpg|jpeg|png|txt|zip|rar';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 10138; // 5MB
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('attr')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('failed', $error);
                redirect('profil-user');
            } else {
                $uploaded_data = $this->upload->data();

                $data = [
                    'nama_lesson' => $nama,
                    'desc_lesson' => $desc,
                    'type_lesson' => $type,
                    'attr_lesson' => $uploaded_data['file_name']
                ];

                $simpan = $this->db->update('tb_lesson', $data, ['id_lesson' => $id]);

                if ($simpan) {
                    $this->session->set_flashdata('success', 'Berhasil mengubah data lesson');
                    redirect('course');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal mengubah data lesson');
                    redirect('course');
                }
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('tb_lesson', ['id_lesson' => $id]);

        if ($delete) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data lesson');
            redirect('course');
        } else {
            $this->session->set_flashdata('failed', 'Gagal menghapus data lesson');
            redirect('course');
        }
    }
}
