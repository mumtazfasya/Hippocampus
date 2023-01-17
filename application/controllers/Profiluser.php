<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profiluser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user') == null) {
            redirect('home');
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Profil User';
        $id_user = $this->session->userdata('id_user');

        $data['user'] = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();

        $this->load->view('Theme/Head', $data);
        $this->load->view('Theme/Navbar');
        $this->load->view('Profiluser/Index');
        $this->load->view('Theme/Footer');
        $this->load->view('Theme/Scripts');
    }

    public function uploadPhoto()
    {
        $id_user = $this->session->userdata('id_user');

        $file_name = str_replace('.', '', date("dmYHis"));
        $config['upload_path']          = FCPATH . 'assets/img/profil/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 5069; // 5MB
        $config['max_width']            = 512;
        $config['max_height']           = 512;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('failed', $error);
            redirect('profil-user');
        } else {
            $uploaded_data = $this->upload->data();

            $data = [
                'foto_user' => $uploaded_data['file_name']
            ];

            $update = $this->db->update('tb_user', $data, ['id_user' => $id_user]);

            if ($update) {
                $this->session->set_userdata('foto_user', $uploaded_data['file_name']);
                $this->session->set_flashdata('success', 'Berhasil merubah foto profil');
                redirect('profil-user');
            } else {
                $this->session->set_flashdata('failed', 'Gagal merubah foto profil');
                redirect('profil-user');
            }
        }
    }

    public function updateProfil()
    {
        $id_user = $this->session->userdata('id_user');

        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $firstname = htmlspecialchars($this->input->post('firstname'));
        $lastname = htmlspecialchars($this->input->post('lastname'));
        $email = htmlspecialchars($this->input->post('email'));
        $bio = htmlspecialchars($this->input->post('bio'));

        if ($this->form_validation->run() == false) {
            redirect('profil-user');
        } else {
            $data = [
                'firstname_user' => $firstname,
                'lastname_user' => $lastname,
                'email_user' => $email,
                'bio_user' => $bio
            ];

            $update = $this->db->update('tb_user', $data, ['id_user' => $id_user]);

            if ($update) {
                $this->session->set_flashdata('success', 'Berhasil merubah data profil');
                redirect('profil-user');
            } else {
                $this->session->set_flashdata('failed', 'Gagal merubah data profil');
                redirect('profil-user');
            }
        }
    }
}
