<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Halaman extends BaseController
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }

    public function beranda()
    {
        $profil = $this->profilModel->getProfil();

        $data = [
            'title' => 'Beranda',
            'nama'  => $profil['nama'],
            'nim'   => $profil['nim'],
        ];

        return view('beranda', $data);
    }

    public function profil()
    {
        $data = [
            'title'  => 'Profil Saya',
            'profil' => $this->profilModel->getProfil(),
        ];

        return view('profil', $data);
    }
}