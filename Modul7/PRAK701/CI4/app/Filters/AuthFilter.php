<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * AuthFilter - Middleware yang mengecek apakah user sudah login.
 * Jika belum login, redirect ke halaman login dengan pesan peringatan.
 */
class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Kalau belum ada session 'user_id', berarti belum login
        if (! session()->get('user_id')) {
            // Set flash message peringatan
            session()->setFlashdata('warning', 'Login terlebih dahulu!');
            // Redirect ke halaman login
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu aksi setelah response
    }
}