CREATE TABLE IF NOT EXISTS member (
    id_member     INT AUTO_INCREMENT PRIMARY KEY,
    nama_member   VARCHAR(250) NOT NULL,
    nomor_member  VARCHAR(15)  NOT NULL UNIQUE,
    alamat        TEXT,
    tgl_mendaftar DATETIME,
    tgl_terkahir_bayar DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS buku (
    id_buku      INT AUTO_INCREMENT PRIMARY KEY,
    judul_buku   VARCHAR(500) NOT NULL,
    penulis      VARCHAR(500) NOT NULL,
    penerbit     VARCHAR(250),
    tahun_terbit INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_member     INT  NOT NULL,
    id_buku       INT  NOT NULL,
    tgl_pinjam    DATE NOT NULL,
    tgl_kembali   DATE,
    CONSTRAINT fk_member    FOREIGN KEY (id_member) REFERENCES member(id_member) ON DELETE CASCADE,
    CONSTRAINT fk_buku      FOREIGN KEY (id_buku)   REFERENCES buku(id_buku)   ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terkahir_bayar) VALUES
('Rio',    'MBR001', 'Jl. Merdeka No. 10, Banjarmasin',  NOW(), '2024-12-31'),
('Ocha',   'MBR002', 'Jl. Diponegoro No. 5, Banjarbaru', NOW(), '2024-11-30'),
('Amrina',  'MBR003', 'Jl. Sudirman No. 22, Kotabaru',  NOW(), '2025-01-31');

-- Data contoh buku
INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES
('Pemrograman Web dengan PHP',   'Budi Raharjo',   'Informatika Bandung', 2022),
('Belajar MySQL dari Dasar',     'Abdul Kadir',    'Andi Publisher',      2021),
('Desain Web Modern Bootstrap',  'Eko Kurniawan',  'Elex Media',          2023);

-- Data contoh peminjaman
INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES
(1, 1, '2024-10-01', '2024-10-15'),
(2, 2, '2024-10-05', NULL),
(3, 3, '2024-10-10', '2024-10-24');