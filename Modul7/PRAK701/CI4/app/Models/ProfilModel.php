<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    public function getProfil()
    {
        return [
            'nama'  => 'Muhammad Ghazi Rakhmadi',
            'nim'   => '2410817310009',
            'prodi' => 'Teknologi Informasi',
            'hobi'  => ['Membaca', 'Coding', 'Gaming'],
            'skill' => ['PHP', 'HTML/CSS', 'MySQL', 'JavaScript'],
            'email' => 'mghazirakhmadi63@gmail.com',
            'motto' => 'Belajar tanpa henti!',
        ];
    }
}