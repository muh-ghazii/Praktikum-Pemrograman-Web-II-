<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(): string
    {
        if (session()->get('user_id')) {
            return redirect()->to('/buku');
        }

        return view('templates/header', ['title' => 'Login', 'active' => 'login'])
     . view('auth/login')
     . view('templates/footer');
    }

    public function prosesLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'email'    => $user['email'],
                'isLogged' => true,
            ]);
            return redirect()->to('/buku');
        }
        session()->setFlashdata('error', 'Username atau password salah!');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('success', 'Berhasil logout.');
        return redirect()->to('/login');
    }
}