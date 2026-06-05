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

    // ── Tampilkan halaman login ──────────────────────────────
    public function login(): string
    {
        // Kalau sudah login, langsung redirect ke daftar buku
        if (session()->get('user_id')) {
            return redirect()->to('/buku');
        }

        return view('templates/header', ['title' => 'Login', 'active' => 'login'])
     . view('auth/login')
     . view('templates/footer');
    }

    // ── Proses form login ────────────────────────────────────
    public function prosesLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $this->userModel->where('username', $username)->first();

        // Cek apakah user ada & password cocok
        if ($user && password_verify($password, $user['password'])) {
            // Simpan data ke session
            session()->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'email'    => $user['email'],
                'isLogged' => true,
            ]);
            return redirect()->to('/buku');
        }

        // Login gagal
        session()->setFlashdata('error', 'Username atau password salah!');
        return redirect()->to('/login');
    }

    // ── Logout ───────────────────────────────────────────────
    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('success', 'Berhasil logout.');
        return redirect()->to('/login');
    }
}
