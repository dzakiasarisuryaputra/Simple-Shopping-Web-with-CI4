<?php

namespace App\Controllers;

use App\Models\CheckModel;

class Checkout extends BaseController
{
    protected $CartModel;

    public function __construct()
    {
        $this->CartModel = new CheckModel();
    }

    public function invoice()
    {
        if (session()->has('name')) {
            $checkout = $this->CartModel->getCk(session()->get('username'));
            $data = [
                'checkout' => $checkout
            ];
            return view('vw_ck', $data);
        } else {
            return view('vw_login');
        }
    }

    public function checkout()
    {
        if (session()->has('role')) {
            $barang = implode(",", $this->request->getVar('brg_ck[]'));
            $q = implode(",", $this->request->getVar('qty[]'));
            $hrg = implode(",", $this->request->getVar('hbrg_ck[]'));
            $checkout = new CheckModel();
            $checkout->insert([
                'uname_p' => $this->request->getVar('uname_p'),
                'nama_p' => $this->request->getVar('nama_p'),
                'nohp' => $this->request->getVar('nohp'),
                'alamat' => $this->request->getVar('alamat'),
                'brg_ck' => $barang,
                'qty' => $q,
                'hbrg_ck' => $hrg,
                'kurir' => $this->request->getVar('kurir'),
                'bayar_ck' => $this->request->getVar('bayar_ck')
            ]);
            $cart = \Config\Services::cart();
            $cart->destroy();
            return redirect()->to('/ck');
        } else {
            return redirect()->to('/member');
        }
    }
}
