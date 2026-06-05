<?php
/** @var string $title */
/** @var string $nama */
/** @var string $nim */
?>
<?= view('layout/header') ?>

<style>
    .beranda-wrap {
        max-width: 700px;
        margin: 80px auto;
        padding: 0 1.5rem;
        text-align: center;
    }
    .beranda-wrap h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 1rem;
    }
    .beranda-wrap p.sub {
        color: var(--muted);
        font-size: 1rem;
        line-height: 1.6;
        max-width: 480px;
        margin: 0 auto 3rem;
    }
    .beranda-card {
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 2.5rem 2rem;
        background: var(--white);
    }
.avatar-wrap {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 1.5rem;
    border: 3px solid var(--border);
}
.avatar-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
    .avatar-wrap .material-icons {
        font-size: 2.2rem;
        color: var(--red);
    }
    .beranda-card h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 0.5rem;
    }
    .nim-badge {
        display: inline-block;
        background: var(--red);
        color: var(--white);
        font-size: 0.8rem;
        font-weight: 500;
        padding: 0.3rem 1rem;
        border-radius: 2px;
        letter-spacing: 0.5px;
        margin-bottom: 1.5rem;
    }
    .divider {
        border: none;
        border-top: 1px solid var(--border);
        margin: 1.5rem 0;
    }
    .btn-primary {
        display: inline-block;
        background: var(--red);
        color: var(--white);
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 500;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 0.85rem 2.5rem;
        border-radius: 2px;
        transition: background 0.2s;
    }
    .btn-primary:hover { background: var(--red-light); }
</style>

<div class="beranda-wrap">
    <h1>Selamat Datang!</h1>
    <p class="sub">Halo Semuanya!, Ini merupakan halaman website profil saya dan ini untuk memenuhi tugas praktikum pemrograman web II</p>

    <div class="beranda-card">
<div class="avatar-wrap">
<img src="/img/MuhammadGhaziRakhmadi.jpg" alt="Foto Profil">
</div>
        <h2><?= esc($nama) ?></h2>
        <div class="nim-badge">NIM: <?= esc($nim) ?></div>
        <hr class="divider">
        <a href="/profil" class="btn-primary">Lihat Profil Saya</a>
    </div>
</div>
<?= view('layout/footer') ?>