<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Home';

		$this->db->join('tb_category', 'tb_category.id_category = tb_course.id_course');
		$data['course'] = $this->db->get('tb_course')->result_array();

		$this->load->view('Theme/Head', $data);
		$this->load->view('Theme/Navbar');
		$this->load->view('Home/Index');
		$this->load->view('Theme/Footer');
		$this->load->view('Theme/Scripts');
	}
}
