<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table         = 'buku';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];
    protected $useTimestamps = true;

    // Aturan validasi (custom pesan bahasa Indonesia)
    protected $validationRules = [
        'judul'        => 'required|alpha_numeric_punct',
        'penulis'      => 'required|alpha_numeric_punct',
        'penerbit'     => 'required|alpha_numeric_punct',
        'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]',
    ];

    protected $validationMessages = [
        'judul' => [
            'required'             => 'Judul buku harus diisi.',
            'alpha_numeric_punct'  => 'Judul harus berupa teks/string.',
        ],
        'penulis' => [
            'required'             => 'Nama penulis harus diisi.',
            'alpha_numeric_punct'  => 'Penulis harus berupa teks/string.',
        ],
        'penerbit' => [
            'required'             => 'Nama penerbit harus diisi.',
            'alpha_numeric_punct'  => 'Penerbit harus berupa teks/string.',
        ],
        'tahun_terbit' => [
            'required'      => 'Tahun terbit harus diisi.',
            'numeric'       => 'Tahun terbit harus berupa angka.',
            'greater_than'  => 'Tahun terbit harus lebih besar dari 1800.',
            'less_than'     => 'Tahun terbit harus lebih kecil dari 2024.',
        ],
    ];
}