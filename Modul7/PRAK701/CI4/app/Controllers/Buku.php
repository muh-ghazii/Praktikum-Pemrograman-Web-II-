<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected BukuModel $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index(): string
    {
        $data = [
            'title'  => 'Daftar Buku | PRAK701',
            'active' => 'buku',
            'buku'   => $this->bukuModel->orderBy('created_at', 'DESC')->findAll(),
        ];
        return view('templates/header', $data)
             . view('buku/index', $data)
             . view('templates/footer');
    }

    public function create(): string
    {
        $data = [
            'title'      => 'Tambah Buku | PRAK701',
            'active'     => 'buku',
            'validation' => \Config\Services::validation(),
        ];
        return view('templates/header', $data)
             . view('buku/create', $data)
             . view('templates/footer');
    }

    public function store()
    {
        $rules = [
            'judul'        => 'required|alpha_numeric_punct',
            'penulis'      => 'required|alpha_numeric_punct',
            'penerbit'     => 'required|alpha_numeric_punct',
            'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]',
        ];
        $messages = [
            'judul' => [
                'required'            => 'Judul buku harus diisi.',
                'alpha_numeric_punct' => 'Judul harus berupa teks/string.',
            ],
            'penulis' => [
                'required'            => 'Nama penulis harus diisi.',
                'alpha_numeric_punct' => 'Penulis harus berupa teks/string.',
            ],
            'penerbit' => [
                'required'            => 'Nama penerbit harus diisi.',
                'alpha_numeric_punct' => 'Penerbit harus berupa teks/string.',
            ],
            'tahun_terbit' => [
                'required'     => 'Tahun terbit harus diisi.',
                'numeric'      => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                'less_than'    => 'Tahun terbit harus lebih kecil dari 2024.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            $data = [
                'title'      => 'Tambah Buku | PRAK701',
                'active'     => 'buku',
                'validation' => $this->validator,
            ];
            return view('templates/header', $data)
                 . view('buku/create', $data)
                 . view('templates/footer');
        }
        $this->bukuModel->save([
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);

        session()->setFlashdata('success', 'Buku berhasil ditambahkan!');
        return redirect()->to('/buku');
    }

    public function edit(int $id): string
    {
        $buku = $this->bukuModel->find($id);
        if (! $buku) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Buku dengan ID $id tidak ditemukan.");
        }
        $data = [
            'title'      => 'Edit Buku | PRAK701',
            'active'     => 'buku',
            'buku'       => $buku,
            'validation' => \Config\Services::validation(),
        ];
        return view('templates/header', $data)
             . view('buku/edit', $data)
             . view('templates/footer');
    }

    public function update(int $id)
    {
        $rules = [
            'judul'        => 'required|alpha_numeric_punct',
            'penulis'      => 'required|alpha_numeric_punct',
            'penerbit'     => 'required|alpha_numeric_punct',
            'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]',
        ];
        $messages = [
            'judul' => [
                'required'            => 'Judul buku harus diisi.',
                'alpha_numeric_punct' => 'Judul harus berupa teks/string.',
            ],
            'penulis' => [
                'required'            => 'Nama penulis harus diisi.',
                'alpha_numeric_punct' => 'Penulis harus berupa teks/string.',
            ],
            'penerbit' => [
                'required'            => 'Nama penerbit harus diisi.',
                'alpha_numeric_punct' => 'Penerbit harus berupa teks/string.',
            ],
            'tahun_terbit' => [
                'required'     => 'Tahun terbit harus diisi.',
                'numeric'      => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                'less_than'    => 'Tahun terbit harus lebih kecil dari 2024.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            $data = [
                'title'      => 'Edit Buku | PRAK701',
                'active'     => 'buku',
                'buku'       => $this->bukuModel->find($id),
                'validation' => $this->validator,
            ];
            return view('templates/header', $data)
                 . view('buku/edit', $data)
                 . view('templates/footer');
        }

        $this->bukuModel->update($id, [
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);
        session()->setFlashdata('success', 'Buku berhasil diperbarui!');
        return redirect()->to('/buku');
    }

    public function delete(int $id)
    {
        $this->bukuModel->delete($id);
        session()->setFlashdata('success', 'Buku berhasil dihapus!');
        return redirect()->to('/buku');
    }
}