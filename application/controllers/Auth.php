<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('id_user') == null) {
			$data['title'] = 'Login';

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));

			if ($this->form_validation->run() == false) {
				$this->load->view('Theme/Head', $data);
				$this->load->view('Theme/Navbar');
				$this->load->view('Auth/Index');
				$this->load->view('Theme/Footer');
				$this->load->view('Theme/Scripts');
			} else {
				$this->db->join('tb_role', 'tb_user.id_role = tb_role.id_role');
				$user = $this->db->get_where('tb_user', ['email_user' => $email])->row_array();
				if ($user) {
					if ($user['password_user'] == md5($password)) {
						$data = [
							'id_user' => $user['id_user'],
							'firstname_user' => $user['firstname_user'],
							'lastname_user' => $user['lastname_user'],
							'email_user' => $user['email_user'],
							'foto_user' => $user['foto_user'],
							'id_role' => $user['id_role'],
							'role' => $user['nama_role']
						];

						$this->session->set_userdata($data);

						if ($user['nama_role'] == 'User') {
							redirect('home');
						} else if ($user['nama_role'] == 'Admin') {
							redirect('dashboard');
						}
					} else {
						$this->session->set_flashdata('failed', 'Password anda salah');
						redirect('login');
					}
				} else {
					$this->session->set_flashdata('failed', 'Akun belum terdaftar');
					redirect('login');
				}
			}
		} else {
			redirect('home');
		}
	}

	public function register()
	{
		if ($this->session->userdata('id_user') == null) {
			$data['title'] = 'Daftar Akun Baru';

			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_user.email_user]');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$firstname = htmlspecialchars($this->input->post('firstname'));
			$lastname = htmlspecialchars($this->input->post('lastname'));
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));

			if ($this->form_validation->run() == false) {
				$this->load->view('Theme/Head', $data);
				$this->load->view('Theme/Navbar');
				$this->load->view('Auth/Register');
				$this->load->view('Theme/Footer');
				$this->load->view('Theme/Scripts');
			} else {
				$data = [
					'firstname_user' => $firstname,
					'lastname_user' => $lastname,
					'email_user' => $email,
					'password_user' => md5($password),
					'foto_user' => '-',
					'bio_user' => '-',
					'id_role' => 2
				];

				$save = $this->db->insert('tb_user', $data);

				if ($save) {
					$this->session->set_flashdata('success', 'Berhasil mendaftar akun, silahkan login');
					redirect('login');
				} else {
					$this->session->set_flashdata('failed', 'Gagal mendaftar akun, silahkan coba lagi');
					redirect('register');
				}
			}
		} else {
			redirect('home');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}
