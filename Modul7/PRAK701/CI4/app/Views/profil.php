<?php
/** @var string $title */
/** @var array $profil */
?>
<?= view('layout/header') ?>

<style>
    .profil-wrap {
        max-width: 900px;
        margin: 60px auto;
        padding: 0 1.5rem;
    }
    .profil-hero {
        display: flex;
        align-items: center;
        gap: 2rem;
        margin-bottom: 2.5rem;
    }
    .profil-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--border);
        flex-shrink: 0;
    }
    .profil-avatar-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .profil-avatar-placeholder .material-icons { font-size: 3rem; color: var(--red); }
    .profil-hero-info h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--text);
        line-height: 1.2;
    }
    .profil-hero-info .nim {
        color: var(--muted);
        font-size: 1rem;
        margin-top: 0.3rem;
    }

    .profil-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1rem;
        margin-bottom: 1rem;
    }
    .profil-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .profil-card {
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 1.5rem;
        background: var(--white);
    }
    .profil-card.red {
        background: var(--red);
        border-color: var(--red);
        color: var(--white);
    }
    .card-label {
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 1rem;
    }
    .profil-card.red .card-label { color: rgba(255,255,255,0.6); }
    .card-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    .card-field small {
        display: block;
        font-size: 0.75rem;
        color: var(--muted);
        margin-bottom: 0.3rem;
    }
    .card-field p {
        font-size: 1rem;
        font-weight: 500;
        color: var(--text);
    }
    .motto-text {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-style: italic;
        color: var(--white);
        line-height: 1.4;
    }
    .tag-wrap { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-top: 0.75rem; }
    .tag {
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        padding: 0.3rem 0.9rem;
        border-radius: 999px;
        text-transform: uppercase;
    }
    .tag-red { background: var(--red); color: var(--white); }
    .tag-outline { border: 1.5px solid var(--text); color: var(--text); background: transparent; }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--red);
        color: var(--white);
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 0.85rem 2rem;
        border-radius: 2px;
        transition: background 0.2s;
    }
    .btn-back:hover { background: var(--red-light); }
</style>

<div class="profil-wrap">
    <div class="profil-hero">
<img src="/img/MuhammadGhaziRakhmadi.jpg" alt="Foto Profil" class="profil-avatar">
        <div class="profil-hero-info">
            <h1><?= esc($profil['nama']) ?></h1>
            <p class="nim"><?= esc($profil['nim']) ?></p>
        </div>
    </div>

    <div class="profil-grid">
        <div class="profil-card">
            <p class="card-label">Informasi Akademik</p>
            <div class="card-row">
                <div class="card-field">
                    <small>Program Studi</small>
                    <p><?= esc($profil['prodi']) ?></p>
                </div>
                <div class="card-field">
                    <small>Email</small>
                    <p><?= esc($profil['email']) ?></p>
                </div>
            </div>
        </div>
        <div class="profil-card red">
            <p class="card-label">Motto</p>
            <p class="motto-text">"<?= esc($profil['motto']) ?>"</p>
        </div>
    </div>

    <div class="profil-grid-2">
        <div class="profil-card">
            <p class="card-label">&lt;/&gt; &nbsp;Skill</p>
            <div class="tag-wrap">
                <?php foreach ($profil['skill'] as $s): ?>
                    <span class="tag tag-red"><?= esc($s) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="profil-card">
            <p class="card-label">&#9825; &nbsp;Hobi</p>
            <div class="tag-wrap">
                <?php foreach ($profil['hobi'] as $h): ?>
                    <span class="tag tag-outline"><?= esc($h) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<a href="/beranda" class="btn-back">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"></polyline>
    </svg>
    Kembali ke Beranda
</a>
</div>
<?= view('layout/footer') ?>