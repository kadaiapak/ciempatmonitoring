<?php

namespace App\Controllers;
use App\Models\AuthModel;


class Auth extends BaseController
{
    protected $authModel;
    public function __construct()
    {
        helper('form');
        $this->authModel = new AuthModel();
    }
    public function index()
    {
        return redirect()->to(site_url('/auth/login'));
        
    }

    public function login()
    {
        if(session('log')) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'judul' => 'Login',
        ];
        return view('auth/v_login', $data);
    }

    public function loginProcess()
    {
        if(!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'username tidak boleh kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password tidak boleh kosong'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        }
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $cek = $this->authModel->login($username, $password);
        if($cek){
            session()->set('log', true);
            session()->set('nama_asli', $cek['nama_asli']);
            session()->set('nim', $cek['nim']);
            session()->set('username', $cek['username']);
            session()->set('level', $cek['level']);
            session()->set('user_foto', $cek['user_foto']);
            return redirect()->to('/')->with('sukses','Login berhasil!');
        }else {
             return redirect()->back()->with('gagal', 'Username atau Password salah!');   
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_asli');
        session()->remove('username');
        session()->remove('level');
        session()->remove('user_foto');

        return redirect()->to('/auth');
    }
}
