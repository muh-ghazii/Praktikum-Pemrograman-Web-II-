<?php
$activePage = $activePage ?? '';
$pageTitle  = $pageTitle  ?? 'PRAK501';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> – Perpustakaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --merah: #cc0000;
            --merah-dark: #990000;
            --merah-light: #fff0f0;
            --sidebar-w: 210px;
        }
        * { box-sizing: border-box; }
        body { background: #f4f4f4; font-family: 'Segoe UI', sans-serif; margin: 0; }

        /* ── TOPBAR MOBILE ── */
        .mobile-topbar {
            display: none;
            position: fixed; top: 0; left: 0; right: 0;
            height: 56px; background: #fff;
            border-bottom: 1px solid #e8e8e8;
            align-items: center;
            padding: 0 16px;
            z-index: 200;
            gap: 12px;
        }
        .mobile-topbar .brand-name {
            font-size: .95rem; font-weight: 800;
            color: var(--merah); flex: 1;
        }
        .btn-hamburger {
            background: none; border: none;
            font-size: 1.4rem; color: #555;
            padding: 4px 6px; cursor: pointer;
        }

        /* ── OVERLAY ── */
        .sidebar-overlay {
            display: none;
            position: fixed; inset: 0;
            background: rgba(0,0,0,.4);
            z-index: 150;
        }
        .sidebar-overlay.show { display: block; }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: #fff;
            border-right: 1px solid #e8e8e8;
            display: flex; flex-direction: column;
            z-index: 160;
            transition: transform .25s ease;
        }
        .sidebar-brand {
            padding: 22px 20px 18px;
            border-bottom: 1px solid #f0f0f0;
        }
        .sidebar-brand .brand-name {
            font-size: 1rem; font-weight: 800;
            color: var(--merah); line-height: 1.2;
        }
        .sidebar-brand .brand-sub { font-size: .72rem; color: #999; margin-top: 2px; }
        .sidebar-nav { padding: 10px 0; flex: 1; }
        .sidebar-nav a {
            display: flex; align-items: center; gap: 10px;
            padding: 11px 20px;
            color: #555; text-decoration: none;
            font-size: .875rem; font-weight: 500;
            border-left: 3px solid transparent;
            transition: all .15s;
        }
        .sidebar-nav a:hover { background: var(--merah-light); color: var(--merah); }
        .sidebar-nav a.active {
            background: var(--merah-light); color: var(--merah);
            border-left-color: var(--merah); font-weight: 700;
        }
        .sidebar-nav a i { font-size: 1rem; width: 18px; text-align: center; }

        /* ── MAIN ── */
        .main-wrap { margin-left: var(--sidebar-w); min-height: 100vh; display: flex; flex-direction: column; }
        .top-bar {
            background: #fff; border-bottom: 1px solid #e8e8e8;
            padding: 14px 28px; font-size: .95rem; font-weight: 700;
            color: var(--merah); letter-spacing: .2px;
        }
        .content-area { padding: 24px 28px; flex: 1; }

        /* ── CARDS & TABLES ── */
        .content-card { background: #fff; border-radius: 10px; box-shadow: 0 1px 6px rgba(0,0,0,.07); overflow: hidden; }
        .content-card-header {
            padding: 16px 20px; border-bottom: 1px solid #f0f0f0;
            display: flex; align-items: center; justify-content: space-between;
        }
        .content-card-header h5 { font-size: 1.1rem; font-weight: 700; color: #222; margin: 0; display: flex; align-items: center; gap: 8px; }
        .content-card-header h5 i { color: var(--merah); }
        .content-card-footer {
            padding: 12px 20px; border-top: 1px solid #f0f0f0;
            font-size: .82rem; color: #888;
            display: flex; align-items: center; justify-content: space-between;
        }
        .table { margin: 0; }
        .table thead th {
            background: #fff; color: #888; font-size: .75rem;
            text-transform: uppercase; letter-spacing: .5px;
            font-weight: 700; border-bottom: 2px solid #f0f0f0;
            padding: 12px 16px; white-space: nowrap;
        }
        .table tbody td { padding: 13px 16px; vertical-align: middle; border-color: #f5f5f5; }
        .table tbody tr:hover { background: #fafafa; }

        /* ── BUTTONS ── */
        .btn-merah { background: var(--merah); color: #fff; border: none; }
        .btn-merah:hover { background: var(--merah-dark); color: #fff; }
        .btn-icon-edit { background: #fff7ed; color: #d97706; border: 1px solid #fde68a; width:32px;height:32px;padding:0;border-radius:6px; }
        .btn-icon-edit:hover { background: #fef3c7; }
        .btn-icon-del  { background: #fff0f0; color: var(--merah); border: 1px solid #fecaca; width:32px;height:32px;padding:0;border-radius:6px; }
        .btn-icon-del:hover  { background: #fee2e2; }

        /* ── BADGES ── */
        .badge-no { background:#f5f5f5; color:#555; border-radius:6px; font-size:.78rem; padding:3px 9px; font-weight:600; }
        .badge-kembali { background:#f0fdf4; color:#166534; border:1px solid #bbf7d0; border-radius:20px; font-size:.78rem; padding:4px 12px; font-weight:600; }
        .badge-pinjam  { background:#fffbeb; color:#92400e; border:1px solid #fde68a; border-radius:20px; font-size:.78rem; padding:4px 12px; font-weight:600; }
        .nama-link { color: var(--merah); font-weight: 600; text-decoration: none; }
        .badge-tahun { background:#f5f5f5; color:#555; border-radius:6px; font-size:.82rem; padding:4px 10px; font-weight:600; display:inline-block; }

        /* ── BREADCRUMB ── */
        .breadcrumb { font-size:.82rem; margin-bottom:14px; }
        .breadcrumb-item a { color: var(--merah); text-decoration:none; }
        .breadcrumb-item.active { color:#888; }
        .breadcrumb-item + .breadcrumb-item::before { color:#ccc; }

        /* ── PAGE TITLE ── */
        .page-title { font-size:1.5rem; font-weight:800; color:var(--merah); margin:0 0 18px; display:flex; align-items:center; gap:10px; }
        .page-title i { color:var(--merah); }

        /* ── FORM CARD ── */
        .form-card { background:#fff; border-radius:10px; box-shadow:0 1px 6px rgba(0,0,0,.07); }
        .form-card-header { padding:18px 24px; border-bottom:1px solid #f0f0f0; }
        .form-card-header h5 { margin:0; font-weight:700; color:#222; font-size:1rem; display:flex; align-items:center; gap:8px; }
        .form-card-header h5 i { color:var(--merah); }
        .form-card-body { padding:24px; }
        .form-label { font-weight:600; font-size:.875rem; color:#444; margin-bottom:5px; }
        .required::after { content:' *'; color:var(--merah); }
        .form-control:focus, .form-select:focus { border-color:var(--merah); box-shadow:0 0 0 .2rem rgba(204,0,0,.15); }

        /* ── PAGINATION ── */
        .pagination .page-link { color:var(--merah); border-color:#eee; }
        .pagination .page-item.active .page-link { background:var(--merah); border-color:var(--merah); color:#fff; }

        /* alert fix */
        .alert-dismissible { display:flex; align-items:center; justify-content:space-between; padding-right:16px; }
        .alert-dismissible .btn-close { position:static; flex-shrink:0; margin-left:auto; }

        code { background:#f0f0f0; color:#333; padding:2px 7px; border-radius:4px; font-size:.82rem; }

        /* ── RESPONSIVE MOBILE ── */
        @media (max-width: 768px) {
            .mobile-topbar { display: flex; }
            .sidebar {
                transform: translateX(-100%);
                top: 0;
                z-index: 160;
            }
            .sidebar.open { transform: translateX(0); }
            .main-wrap { margin-left: 0; padding-top: 56px; }
            .top-bar { display: none; }
            .content-area { padding: 16px; }
            .page-title { font-size: 1.2rem; }
            .table thead th { font-size: .7rem; padding: 10px 10px; }
            .table tbody td { padding: 10px 10px; font-size: .85rem; }
            .form-card-body { padding: 16px; }
        }
    </style>
</head>
<body>

<!-- Mobile Topbar (hanya muncul di HP) -->
<div class="mobile-topbar">
    <button class="btn-hamburger" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>
    <div class="brand-name">Ruang Baca Prabowo</div>
</div>

<!-- Overlay gelap saat sidebar terbuka di HP -->
<div class="sidebar-overlay" id="overlay" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-name">Ruang Baca<br>Prabowo</div>
        <div class="brand-sub">Admin Portal</div>
    </div>
    <nav class="sidebar-nav">
        <a href="Buku.php" class="<?= ($activePage==='buku') ? 'active' : '' ?>">
            <i class="bi bi-book-fill"></i> Buku
        </a>
        <a href="Member.php" class="<?= ($activePage==='member') ? 'active' : '' ?>">
            <i class="bi bi-people-fill"></i> Member
        </a>
        <a href="Peminjaman.php" class="<?= ($activePage==='peminjaman') ? 'active' : '' ?>">
            <i class="bi bi-arrow-left-right"></i> Peminjaman
        </a>
    </nav>
</div>

<div class="main-wrap">
    <div class="top-bar">Sistem Manajemen Perpustakaan Merah Putih</div>
    <div class="content-area">
