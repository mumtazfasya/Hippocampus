<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
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
        $data['title'] = 'Cart';

        $this->db->join('tb_course', 'tb_course.id_course = tb_cart.id_course');
        $data['cart'] = $this->db->get_where('tb_cart', ['id_user' => $this->session->userdata('id_user'), 'status_cart' => 'active'])->result_array();

        $this->load->view('Theme/Head', $data);
        $this->load->view('Theme/Navbar');
        $this->load->view('Cart/Index');
        $this->load->view('Theme/Footer');
        $this->load->view('Theme/Scripts');
    }

    public function add($id_course)
    {
        $data['title'] = 'Add To Cart';

        $kode = 'CART-' . date('mY') . $this->session->userdata('id_user');

        $data = [
            'kode_cart' => $kode,
            'id_user' => $this->session->userdata('id_user'),
            'id_course' => $id_course,
            'status_cart' => 'active'
        ];

        $simpan = $this->db->insert('tb_cart', $data);

        if ($simpan) {
            $this->session->set_flashdata('success', 'Berhasil menambah course ke keranjang');
            redirect('cart');
        } else {
            $this->session->set_flashdata('failed', 'Gagal menambah course ke keranjang');
            redirect('cart');
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('tb_cart', ['id_cart' => $id]);

        if ($delete) {
            $this->session->set_flashdata('success', 'Berhasil menghapus course dari keranjang');
            redirect('cart');
        } else {
            $this->session->set_flashdata('failed', 'Gagal menghapus course dari keranjang');
            redirect('cart');
        }
    }
}
