<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Member extends BaseController
{
    function __construct()
    {
        helper('number');
        helper('form');
    }
    public function index()
    {
        if (session()->has('name')) {
            if (session()->has('role')) {
                return view('vw_sudahmember');
            } else {
                return view('vw_member');
            }
        } else {
            return view('vw_login');
        }
    }

    // public function asmember()
    // {
    //     if (session()->has('name')) {
    //         return view('vw_sudahmember');
    //     } else {
    //         return view('vw_login');
    //     }
    // }

    public function insertMem($uname = 0)
    {
        $users = new UsersModel();
        $data = [
            'role' => $this->request->getVar('role')
        ];

        $users->update($uname, $data);
        session()->set([
            'role' => $this->request->getVar('role')
        ]);
        return redirect()->to('/member');
    }
}
