<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function login()
    {
        return view('auth/v_login');
    }

    public function register()
    {
        $data = [
            'validasi' => \Config\Services::validation()
        ];
        return view('auth/v_register', $data);
    }

    public function save()
    {
        //Validasi
        if (!$this->validate([
            'email' => [
                'rules' => 'is_unique[tb_user.email]',
                'errors' => [
                    'is_unique' => 'Username sudah digunakan.'
                ]
            ],
            'password' => [
                'rules' => 'min_length[5]|max_length[15]',
                'errors' => [
                    'min_length' => 'Password minimal terdiri dari 5 huruf',
                    'max_length' => 'Password maksimal terdiri dari 15 huruf',
                ]
            ],
            'cpassword' => 'required|matches[password]'
        ])) {
            return redirect()->to('/auth/register')->withInput();
        }


        $this->UserModel->save([
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => sha1($this->request->getVar('password')),
            'role' => 'user',
        ]);

        session()->setFlashdata('pesan-regis', 'Akun berhasil dibuat, silakan login.');
        return redirect()->to('/auth/login');
    }

    public function cek()
    {
        // Ambil data dari form
        $data = $this->request->getVar();

        // Ambil data user di database yang usernamenya sama 
        $user = $this->UserModel->where('username', $data['username'])->first();
        if (!$user) {
            // Jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('pesan-login', 'Username tidak ditemukan');
            return redirect()->to('/auth/login');
        }

        // Cek password
        // Jika salah arahkan lagi ke halaman login
        if ($user['password'] != sha1($data['password'])) {
            session()->setFlashdata('pesan-login', 'Password salah');
            return redirect()->to('/');
        } else {
            // Jika benar, arahkan user masuk ke aplikasi 
            $sessLogin = [
                'isLogin' => true,
                'idUser' => $user['id_user'],
                'username' => $user['username'], // Untuk menampilkan nama di sidebar
                'email' => $user['email'], // Menampilkan username di navbar
                'role' => $user['role']
            ];
            session()->set($sessLogin);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
