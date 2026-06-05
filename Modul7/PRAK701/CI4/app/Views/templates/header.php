<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:   #FF0000;
            --primary-dark: #cc0000;
            --secondary: #FFFFFF;
            --tertiary:  #2D3436;
            --neutral:   #F8F9FA;
            --text:      #2D3436;
            --text-muted:#636e72;
            --border:    #e0e0e0;
        }

        * { font-family: 'Inter', sans-serif; }
        h1,h2,h3,h4,h5,h6,
        .navbar-brand { font-family: 'Hanken Grotesk', sans-serif; }

        body {
            background-color: var(--neutral);
            color: var(--text);
            min-height: 100vh;
        }

        /* ── Navbar ── */
        .navbar-custom {
            background: #fff;
            border-bottom: 3px solid var(--primary);
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }
        .navbar-brand {
            color: var(--primary) !important;
            font-weight: 700;
            font-size: 1.1rem;
            display: flex; align-items: center; gap: .5rem;
        }
        .navbar-brand .brand-icon {
            background: var(--primary);
            color: #fff;
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: .9rem;
        }
        .nav-link-custom {
            color: var(--text-muted) !important;
            font-weight: 500;
            font-size: .9rem;
            transition: color .2s;
        }
        .nav-link-custom:hover { color: var(--primary) !important; }

        .badge-user {
            display: flex; align-items: center; gap: .4rem;
            color: var(--text-muted);
            font-size: .85rem;
            font-weight: 500;
        }
        .badge-user i { color: var(--text-muted); }

        .btn-logout {
            background: transparent;
            border: 1.5px solid var(--primary);
            color: var(--primary);
            border-radius: 8px;
            font-size: .85rem;
            font-weight: 600;
            padding: .35rem .9rem;
            transition: all .2s;
        }
        .btn-logout:hover {
            background: var(--primary);
            color: #fff;
        }

        /* ── Cards ── */
        .card-custom {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
        }

        /* ── Buttons ── */
        .btn-primary-custom {
            background: var(--primary);
            border: none;
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            transition: background .2s;
        }
        .btn-primary-custom:hover { background: var(--primary-dark); color: #fff; }

        .btn-outline-primary-custom {
            background: transparent;
            border: 1.5px solid var(--primary);
            color: var(--primary);
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-outline-primary-custom:hover { background: var(--primary); color: #fff; }

        /* ── Table ── */
        .table-custom thead th {
            background: #fff;
            color: var(--text-muted);
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            border-bottom: 2px solid var(--border);
        }
        .table-custom td {
            color: var(--text);
            font-size: .9rem;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }
        .table-custom tbody tr:hover { background: #fff5f5; }

        /* ── Form ── */
        .form-control-custom {
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-size: .9rem;
            padding: .6rem .9rem;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-control-custom:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255,0,0,.1);
            outline: none;
        }
        .form-label { font-size: .85rem; font-weight: 600; color: var(--text); }

        /* ── Badge tahun ── */
        .badge-year {
            background: #f0f0f0;
            color: var(--text-muted);
            font-size: .8rem;
            padding: .3em .7em;
            border-radius: 6px;
            font-weight: 500;
        }

        /* ── Action buttons ── */
        .btn-edit {
            background: transparent;
            border: 1.5px solid var(--primary);
            color: var(--primary);
            border-radius: 6px;
            font-size: .8rem;
            font-weight: 600;
            padding: .3rem .7rem;
            transition: all .2s;
        }
        .btn-edit:hover { background: var(--primary); color: #fff; }

        .btn-delete {
            background: transparent;
            border: 1.5px solid #ccc;
            color: var(--text-muted);
            border-radius: 6px;
            font-size: .8rem;
            font-weight: 600;
            padding: .3rem .7rem;
            transition: all .2s;
        }
        .btn-delete:hover { background: #ff4444; border-color: #ff4444; color: #fff; }

        /* ── Pagination ── */
        .pagination-info {
            font-size: .82rem;
            color: var(--text-muted);
        }

        /* ── Alert ── */
        .alert-success-custom {
            background: #fff5f5;
            border: 1px solid #ffcccc;
            color: var(--primary-dark);
            border-radius: 8px;
            font-size: .88rem;
        }
        .alert-warning-custom {
            background: #fff3cd;
            border: 1px solid #ffc107;
            color: #856404;
            border-radius: 8px;
            font-size: .88rem;
        }
        .alert-error-custom {
            background: #fff5f5;
            border: 1px solid #ffaaaa;
            color: #cc0000;
            border-radius: 8px;
            font-size: .88rem;
        }
        .invalid-feedback-custom {
            color: var(--primary);
            font-size: .8rem;
            margin-top: .25rem;
        }

        /* ── Mobile responsive ── */
@media (max-width: 768px) {
    .navbar-brand { font-size: .85rem; }
    .container { padding-left: 1rem; padding-right: 1rem; }

    /* Table scroll horizontal */
    .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; }

    /* Sembunyikan kolom penerbit di hp kecil */
    .hide-mobile { display: none !important; }

    /* Form full width */
    .card-custom { border-radius: 8px; }

    /* Tombol full width di mobile */
    .d-flex.gap-2 .btn-primary-custom,
    .d-flex.gap-2 .btn-outline-primary-custom { flex: 1; }

    /* Header tabel lebih kecil */
    .table-custom thead th { font-size: .7rem; padding: .6rem .5rem !important; }
    .table-custom td { font-size: .82rem; padding: .6rem .5rem !important; }

    /* Footer teks kecil */
    footer .container { flex-direction: column; gap: .3rem; text-align: center; }
}

@media (max-width: 480px) {
    .brand-icon { display: none; }
    .navbar-brand { font-size: .8rem; }
}
    </style>
</head>
<body style="min-height:100vh; display:flex; flex-direction:column;">
<div style="flex:1;">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/buku">
            <div class="brand-icon"><i class="bi bi-book-fill"></i></div>
            <span>Perpustakaan Merah Putih Prabowo</span>
        </a>
        <button class="navbar-toggler border-0 p-1" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu"
                style="width:36px; height:36px; border-radius:8px; background:#fff0f0;">
            <i class="bi bi-list fs-5" style="color:var(--primary)"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <!-- Divider di mobile -->
            <hr class="d-lg-none my-2" style="border-color:#f0f0f0;">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <?php if (session()->get('isLogged')): ?>
                <li class="nav-item">
                    <span class="d-flex align-items-center gap-2 py-2 py-lg-0"
                          style="color:var(--text-muted); font-size:.88rem; font-weight:500;">
                        <i class="bi bi-person-circle fs-5" style="color:var(--text-muted)"></i>
                        <?= esc(session()->get('username')) ?>
                    </span>
                </li>
                <li class="nav-item pb-2 pb-lg-0">
                    <a href="/logout" class="btn-logout d-inline-flex align-items-center gap-1">
                        <i class="bi bi-box-arrow-right"></i>Logout
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link-custom py-2" href="/login">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Login
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>