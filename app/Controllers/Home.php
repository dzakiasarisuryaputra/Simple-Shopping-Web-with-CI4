<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
    protected $home;

    function __construct()
    {
        $this->home = new HomeModel();
        helper('number');
        helper('form');
    }

    public function index()
    {
        if (session()->has('name')) {
            $data['home'] = $this->home->findAll();
            return view('vw_home', $data);
        } else {
            return view('vw_login');
        }
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        echo "<pre>";
        print_r($response);
        echo "</pre>";
    }
    public function addCart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'qty' => 1,
            'price' => $this->request->getPost('price'),
            'gambar' => $this->request->getPost('gambar'),
        ));
        session()->setFlashdata('addS', 'Sayur telah dimasukkan ke keranjang!');
        return redirect()->to(base_url('/'));
    }

    public function clearCart()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('/'));
    }

    public function cart()
    {
        if (session()->has('name')) {
            $data = [
                'cart' => \Config\Services::cart()
            ];
            return view('vw_cart', $data);
        } else {
            return view('vw_login');
        }
    }

    public function delete($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('/cart'));
    }
}
