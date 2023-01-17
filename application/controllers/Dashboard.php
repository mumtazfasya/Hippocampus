<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_user') == null || $this->session->userdata('role') != 'Admin') {
			redirect('home');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';

		$this->load->view('Theme/Admin/Head', $data);
		$this->load->view('Theme/Admin/Navbar');
		$this->load->view('Theme/Admin/Sidebar');
		$this->load->view('Dashboard/Index');
		$this->load->view('Theme/Admin/Footer');
		$this->load->view('Theme/Admin/Scripts');
	}
}
