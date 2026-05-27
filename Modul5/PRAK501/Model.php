<?php

require_once 'Koneksi.php';

/**
 * Mengambil semua data member dari database.
 * @return mysqli_result
 */
function getAllMember(): mysqli_result {
    $conn = getKoneksi();
    $result = mysqli_query($conn, "SELECT * FROM member ORDER BY id_member DESC");
    return $result;
}

/**
 * Mengambil satu data member berdasarkan id.
 * @param int $id
 * @return array|null
 */
function getMemberById(int $id): ?array {
    $conn = getKoneksi();
    $id   = mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, "SELECT * FROM member WHERE id_member = '$id'");
    return mysqli_fetch_assoc($result);
}

/**
 * Menambahkan data member baru ke database.
 * @return bool
 */
function insertMember(string $nama, string $nomor, string $alamat,
                      string $tgl_mendaftar, string $tgl_terkahir_bayar): bool {
    $conn  = getKoneksi();
    $nama              = mysqli_real_escape_string($conn, $nama);
    $nomor             = mysqli_real_escape_string($conn, $nomor);
    $alamat            = mysqli_real_escape_string($conn, $alamat);
    $tgl_mendaftar     = mysqli_real_escape_string($conn, $tgl_mendaftar);
    $tgl_terkahir_bayar = mysqli_real_escape_string($conn, $tgl_terkahir_bayar);

    $sql = "INSERT INTO member
                (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terkahir_bayar)
            VALUES
                ('$nama', '$nomor', '$alamat', '$tgl_mendaftar', '$tgl_terkahir_bayar')";
    return mysqli_query($conn, $sql);
}

/**
 * Mengubah data member yang sudah ada.
 * @return bool
 */
function updateMember(int $id, string $nama, string $nomor, string $alamat,
                      string $tgl_mendaftar, string $tgl_terkahir_bayar): bool {
    $conn  = getKoneksi();
    $id                = mysqli_real_escape_string($conn, $id);
    $nama              = mysqli_real_escape_string($conn, $nama);
    $nomor             = mysqli_real_escape_string($conn, $nomor);
    $alamat            = mysqli_real_escape_string($conn, $alamat);
    $tgl_mendaftar     = mysqli_real_escape_string($conn, $tgl_mendaftar);
    $tgl_terkahir_bayar = mysqli_real_escape_string($conn, $tgl_terkahir_bayar);

    $sql = "UPDATE member SET
                nama_member        = '$nama',
                nomor_member       = '$nomor',
                alamat             = '$alamat',
                tgl_mendaftar      = '$tgl_mendaftar',
                tgl_terkahir_bayar = '$tgl_terkahir_bayar'
            WHERE id_member = '$id'";
    return mysqli_query($conn, $sql);
}

/**
 * Menghapus data member berdasarkan id.
 * @return bool
 */
function deleteMember(int $id): bool {
    $conn = getKoneksi();
    $id   = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM member WHERE id_member = '$id'");
}

/**
 * Mengambil semua data buku dari database.
 * @return mysqli_result
 */
function getAllBuku(): mysqli_result {
    $conn = getKoneksi();
    return mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku DESC");
}

/**
 * Mengambil satu data buku berdasarkan id.
 * @return array|null
 */
function getBukuById(int $id): ?array {
    $conn = getKoneksi();
    $id   = mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id'");
    return mysqli_fetch_assoc($result);
}

/**
 * Menambahkan data buku baru ke database.
 * @return bool
 */
function insertBuku(string $judul, string $penulis,
                    string $penerbit, int $tahun_terbit): bool {
    $conn        = getKoneksi();
    $judul       = mysqli_real_escape_string($conn, $judul);
    $penulis     = mysqli_real_escape_string($conn, $penulis);
    $penerbit    = mysqli_real_escape_string($conn, $penerbit);
    $tahun_terbit = (int) $tahun_terbit;

    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit)
            VALUES ('$judul', '$penulis', '$penerbit', $tahun_terbit)";
    return mysqli_query($conn, $sql);
}

/**
 * Mengubah data buku yang sudah ada.
 * @return bool
 */
function updateBuku(int $id, string $judul, string $penulis,
                    string $penerbit, int $tahun_terbit): bool {
    $conn        = getKoneksi();
    $id          = mysqli_real_escape_string($conn, $id);
    $judul       = mysqli_real_escape_string($conn, $judul);
    $penulis     = mysqli_real_escape_string($conn, $penulis);
    $penerbit    = mysqli_real_escape_string($conn, $penerbit);
    $tahun_terbit = (int) $tahun_terbit;

    $sql = "UPDATE buku SET
                judul_buku   = '$judul',
                penulis      = '$penulis',
                penerbit     = '$penerbit',
                tahun_terbit = $tahun_terbit
            WHERE id_buku = '$id'";
    return mysqli_query($conn, $sql);
}

/**
 * Menghapus data buku berdasarkan id.
 * @return bool
 */
function deleteBuku(int $id): bool {
    $conn = getKoneksi();
    $id   = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM buku WHERE id_buku = '$id'");
}

/**
 * Mengambil semua data peminjaman beserta nama member dan judul buku.
 * @return mysqli_result
 */
function getAllPeminjaman(): mysqli_result {
    $conn = getKoneksi();
    $sql  = "SELECT p.*, m.nama_member, b.judul_buku
             FROM   peminjaman p
             JOIN   member     m ON p.id_member = m.id_member
             JOIN   buku       b ON p.id_buku   = b.id_buku
             ORDER  BY p.id_peminjaman DESC";
    return mysqli_query($conn, $sql);
}

/**
 * Mengambil satu data peminjaman berdasarkan id.
 * @return array|null
 */
function getPeminjamanById(int $id): ?array {
    $conn = getKoneksi();
    $id   = mysqli_real_escape_string($conn, $id);
    $sql  = "SELECT p.*, m.nama_member, b.judul_buku
             FROM   peminjaman p
             JOIN   member     m ON p.id_member = m.id_member
             JOIN   buku       b ON p.id_buku   = b.id_buku
             WHERE  p.id_peminjaman = '$id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

/**
 * Menambahkan data peminjaman baru ke database.
 * @return bool
 */
function insertPeminjaman(int $id_member, int $id_buku,
                          string $tgl_pinjam, string $tgl_kembali): bool {
    $conn        = getKoneksi();
    $id_member   = mysqli_real_escape_string($conn, $id_member);
    $id_buku     = mysqli_real_escape_string($conn, $id_buku);
    $tgl_pinjam  = mysqli_real_escape_string($conn, $tgl_pinjam);
    $tgl_kembali = $tgl_kembali ? "'" . mysqli_real_escape_string($conn, $tgl_kembali) . "'" : "NULL";

    $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali)
            VALUES ('$id_member', '$id_buku', '$tgl_pinjam', $tgl_kembali)";
    return mysqli_query($conn, $sql);
}

/**
 * Mengubah data peminjaman yang sudah ada.
 * @return bool
 */
function updatePeminjaman(int $id, int $id_member, int $id_buku,
                          string $tgl_pinjam, string $tgl_kembali): bool {
    $conn        = getKoneksi();
    $id          = mysqli_real_escape_string($conn, $id);
    $id_member   = mysqli_real_escape_string($conn, $id_member);
    $id_buku     = mysqli_real_escape_string($conn, $id_buku);
    $tgl_pinjam  = mysqli_real_escape_string($conn, $tgl_pinjam);
    $tgl_kembali = $tgl_kembali ? "'" . mysqli_real_escape_string($conn, $tgl_kembali) . "'" : "NULL";

    $sql = "UPDATE peminjaman SET
                id_member   = '$id_member',
                id_buku     = '$id_buku',
                tgl_pinjam  = '$tgl_pinjam',
                tgl_kembali = $tgl_kembali
            WHERE id_peminjaman = '$id'";
    return mysqli_query($conn, $sql);
}

/**
 * Menghapus data peminjaman berdasarkan id.
 * @return bool
 */
function deletePeminjaman(int $id): bool {
    $conn = getKoneksi();
    $id   = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman = '$id'");
}