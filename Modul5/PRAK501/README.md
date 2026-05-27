# PRAK501 – Modul 5: Function dan Database

> Praktikum Pemrograman Web II — Aplikasi Perpustakaan Sederhana (CRUD)

## Teknologi
- **PHP Native** (MySQLi)
- **MySQL / MariaDB**
- **Bootstrap 5.3**
- **Bootstrap Icons**

---

## Struktur File

| File | Keterangan |
|---|---|
| `database.sql` | Script pembuatan database & data awal |
| `Koneksi.php` | Fungsi koneksi ke database (`getKoneksi()`) |
| `Model.php` | Semua fungsi CRUD: insert, update, delete, get data untuk tabel member, buku, peminjaman |
| `Member.php` | Halaman daftar member + tombol tambah/edit/hapus |
| `FormMember.php` | Formulir tambah & edit data member |
| `Buku.php` | Halaman daftar buku + tombol tambah/edit/hapus |
| `FormBuku.php` | Formulir tambah & edit data buku |
| `Peminjaman.php` | Halaman daftar peminjaman + tombol tambah/edit/hapus |
| `FormPeminjaman.php` | Formulir tambah & edit data peminjaman |

---

## Cara Instalasi

### 1. Setup Database
```bash
# Masuk ke phpMyAdmin atau terminal MySQL
mysql -u root -p < database.sql
```

### 2. Konfigurasi Koneksi
Edit file `Koneksi.php`, sesuaikan konstanta berikut:
```php
define('DB_HOST',     'localhost');
define('DB_USER',     'root');
define('DB_PASSWORD', '');       // isi password MySQL kamu
define('DB_NAME',     'perpustakaan');
```

### 3. Letakkan di Web Server
- Salin folder `PRAK501` ke direktori:
  - **XAMPP**: `C:/xampp/htdocs/PRAK501/`
  - **WAMP**: `C:/wamp/www/PRAK501/`
  - **Laragon**: `C:/laragon/www/PRAK501/`

### 4. Akses di Browser
```
http://localhost/PRAK501/Member.php
```

---

## Fitur Aplikasi

### Member
- Melihat daftar semua member dalam tabel
- Menambah member baru
- Mengedit data member
- Menghapus member (cascade ke peminjaman)

### Buku
- Melihat daftar semua buku dalam tabel
- Menambah buku baru
- Mengedit data buku
- Menghapus buku

### Peminjaman
- Melihat daftar semua transaksi peminjaman (beserta nama member & judul buku)
- Menambah peminjaman baru (pilih member & buku dari dropdown)
- Mengedit data peminjaman
- Menghapus peminjaman
- Status otomatis: **Sudah Kembali** / **Sedang Dipinjam**

---

## Desain Basis Data

```
member (id_member PK, nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terkahir_bayar)
    |
    | 1:N (melakukan)
    ↓
peminjaman (id_peminjaman PK, id_member FK, id_buku FK, tgl_pinjam, tgl_kembali)
    ↑
    | N:1 (dipinjam)
    |
buku (id_buku PK, judul_buku, penulis, penerbit, tahun_terbit)
```
