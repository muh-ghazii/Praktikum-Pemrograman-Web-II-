<?php

define('DB_HOST',     'sql113.infinityfree.com');
define('DB_USER',     'if0_41979502');
define('DB_PASSWORD', 'GhaZi2024');  
define('DB_NAME',     'if0_41979502_perpustakaan');

/**
 * Membuat dan mengembalikan koneksi ke database MySQL.
 * @return mysqli Objek koneksi database
 */
function getKoneksi(): mysqli {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$conn) {
        die("<div class='alert alert-danger m-3'>
                <strong>Koneksi Gagal!</strong> " . mysqli_connect_error() .
            "</div>");
    }

    mysqli_set_charset($conn, 'utf8mb4');
    return $conn;
}