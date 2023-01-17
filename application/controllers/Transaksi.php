<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $data['title'] = 'Transaksi';

        $data['trans'] = $this->db->query(" SELECT firstname_user, lastname_user, kode_trans, SUM(harga_course) AS harga_trans, status_trans FROM tb_trans JOIN tb_user ON tb_user.id_user = tb_trans.id_user JOIN tb_course ON tb_course.id_course = tb_trans.id_course WHERE status_trans = 'pending' GROUP BY tb_trans.kode_trans ")->result_array();

        $this->load->view('Theme/Admin/Head', $data);
        $this->load->view('Theme/Admin/Navbar');
        $this->load->view('Theme/Admin/Sidebar');
        $this->load->view('Transaksi/Index');
        $this->load->view('Theme/Admin/Footer');
        $this->load->view('Theme/Admin/Scripts');
    }

    public function checkout()
    {
        $data['title'] = 'Checkout';

        $kode_cart = 'CART-' . date('mY') . $this->session->userdata('id_user');

        $checkout = $this->db->query(" INSERT INTO tb_trans(kode_trans,id_user,id_course,status_trans) SELECT kode_cart, tb_cart.id_user, tb_cart.id_course, 'pending' FROM tb_cart WHERE kode_cart = '$kode_cart'");

        if ($checkout) {
            $data = [
                'status_cart' => 'non-active'
            ];
            $this->db->update('tb_cart', $data, ['kode_cart' => $kode_cart]);
            $this->session->set_flashdata('success', 'Berhasil checkout');
            redirect('success-checkout');
        } else {
            $this->session->set_flashdata('failed', 'Gagal checkout');
            redirect('cart');
        }
    }

    public function confirm($kode)
    {
        $data = ['status_trans' => 'success'];
        $confirm = $this->db->update('tb_trans', $data, ['kode_trans' => $kode, 'status_trans' => 'pending']);

        if ($confirm) {
            $this->session->set_flashdata('success', 'Berhasil konfirmasi');
            redirect('transaksi');
        } else {
            $this->session->set_flashdata('failed', 'Gagal konfirmasi');
            redirect('transaksi');
        }
    }

    public function success()
    {
        $data['title'] = 'Success Checkout';

        $id_user = $this->session->userdata('id_user');

        $data['total'] = $this->db->query(" SELECT SUM(harga_course) as harga_total FROM tb_trans JOIN tb_course ON tb_trans.id_course = tb_course.id_course WHERE id_user = '$id_user' AND status_trans = 'pending' GROUP BY id_user ")->row_array();

        $this->load->view('Theme/Head', $data);
        $this->load->view('Theme/Navbar');
        $this->load->view('Checkout/Success');
        $this->load->view('Theme/Footer');
        $this->load->view('Theme/Scripts');
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
