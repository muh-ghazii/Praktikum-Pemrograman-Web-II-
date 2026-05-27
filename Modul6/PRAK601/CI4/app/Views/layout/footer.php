</main>

<footer>
    <style>
        footer {
            background: #e8e4df;
            border-top: 1px solid var(--border);
            padding: 1.8rem 2.5rem;
        }
        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .footer-logo {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--red);
            text-decoration: none;
        }
        .footer-copy {
            color: var(--muted);
            font-size: 0.82rem;
        }
    </style>
    <div class="footer-inner">
        <a class="footer-logo" href="/beranda">PRAK601</a>
        <span class="footer-copy">&copy; <?= date('Y') ?> PRAK601 - Pemrograman Web II.</span>
    </div>
</footer>

</body>
</html>