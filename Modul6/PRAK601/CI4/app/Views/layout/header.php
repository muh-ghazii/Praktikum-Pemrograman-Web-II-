<?php /** @var string $title */ ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - PRAK601</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --red: #8B0000;
            --red-light: #a00000;
            --bg: #F9F6F1;
            --text: #1a1a1a;
            --muted: #888;
            --border: #e0dbd4;
            --white: #ffffff;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        nav {
            background: var(--bg);
            border-bottom: 1px solid var(--border);
            padding: 0 2.5rem;
            height: 64px;
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-logo {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--red);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            justify-content: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text);
            font-size: 0.9rem;
            font-weight: 400;
            letter-spacing: 0.3px;
            padding-bottom: 4px;
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--red);
            border-bottom-color: var(--red);
            font-weight: 500;
        }

        main { flex: 1; }
    </style>
</head>
<body>

<nav>
    <a class="nav-logo" href="/beranda">GEZO</a>
    <ul class="nav-links">
        <li><a href="/beranda" class="<?= (uri_string() == '' || uri_string() == 'beranda') ? 'active' : '' ?>">Beranda</a></li>
        <li><a href="/profil" class="<?= (uri_string() == 'profil') ? 'active' : '' ?>">Profil</a></li>
    </ul>
    <div></div>
</nav>
<main>