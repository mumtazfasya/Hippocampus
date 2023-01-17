<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courseuser extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Home';

        $this->db->join('tb_category', 'tb_category.id_category = tb_course.id_course');
        $data['course'] = $this->db->get('tb_course')->result_array();

        $this->load->view('Theme/Head', $data);
        $this->load->view('Theme/Navbar');
        $this->load->view('Courseuser/Index');
        $this->load->view('Theme/Footer');
        $this->load->view('Theme/Scripts');
    }

    public function my()
    {
        $data['title'] = 'Course Saya';

        $this->db->join('tb_trans', 'tb_trans.id_course = tb_course.id_course');
        $data['course'] = $this->db->get_where('tb_course', ['id_user' => $this->session->userdata('id_user'), 'status_trans' => 'success'])->result_array();

        $this->load->view('Theme/Head', $data);
        $this->load->view('Theme/Navbar');
        $this->load->view('Courseuser/Saya');
        $this->load->view('Theme/Footer');
        $this->load->view('Theme/Scripts');
    }

    public function detail($id_course)
    {
        $data['title'] = 'Detail Course';

        $this->db->join('tb_category', 'tb_category.id_category = tb_course.id_course');
        $data['course'] = $this->db->get('tb_course')->row_array();
        $data['sec'] = $this->db->get_where('tb_section', ['id_course' => $id_course])->result_array();

        $this->load->view('Theme/Head', $data);
        $this->load->view('Theme/Navbar');
        $this->load->view('Courseuser/Detail');
        $this->load->view('Theme/Footer');
        $this->load->view('Theme/Scripts');
    }
}
