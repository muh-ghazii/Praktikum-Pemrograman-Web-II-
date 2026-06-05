<div class="container py-4">
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success-custom d-flex align-items-center gap-2 mb-4 p-3">
        <i class="bi bi-check-circle-fill"></i>
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="fw-bold mb-1" style="font-family:'Hanken Grotesk',sans-serif;">
                <i class="bi bi-journal-text me-2" style="color:var(--primary)"></i>Daftar Buku
            </h4>
            <p class="text-muted small mb-0">Total: <?= count($buku) ?> buku dalam koleksi</p>
        </div>
        <a href="/buku/create" class="btn btn-primary-custom px-4 py-2">
            <i class="bi bi-plus-lg me-1"></i>Tambah Buku
        </a>
    </div>

    <div class="card-custom overflow-hidden d-none d-md-block">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th style="width:50px; padding:1rem 1.2rem">#</th>
                        <th style="padding:1rem .8rem">Judul</th>
                        <th style="padding:1rem .8rem">Penulis</th>
                        <th style="padding:1rem .8rem">Penerbit</th>
                        <th style="width:130px; padding:1rem .8rem">Tahun</th>
                        <th style="width:160px; padding:1rem .8rem" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($buku)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2" style="color:#ccc"></i>
                            Belum ada data. <a href="/buku/create" style="color:var(--primary);font-weight:600;">Tambah sekarang</a>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($buku as $i => $b): ?>
                    <tr>
                        <td style="padding:.85rem 1.2rem; color:var(--text-muted);"><?= $i + 1 ?></td>
                        <td style="padding:.85rem .8rem; font-weight:600;"><?= esc($b['judul']) ?></td>
                        <td style="padding:.85rem .8rem;"><?= esc($b['penulis']) ?></td>
                        <td style="padding:.85rem .8rem;"><?= esc($b['penerbit']) ?></td>
                        <td style="padding:.85rem .8rem;"><span class="badge-year"><?= esc($b['tahun_terbit']) ?></span></td>
                        <td style="padding:.85rem .8rem;" class="text-end">
                            <a href="/buku/edit/<?= $b['id'] ?>" class="btn-edit me-1">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <a href="/buku/delete/<?= $b['id'] ?>" class="btn-delete"
                               onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if (!empty($buku)): ?>
        <div class="px-4 py-3 d-flex justify-content-between align-items-center" style="border-top:1px solid #f0f0f0;">
            <span class="pagination-info">Menampilkan 1 hingga <?= count($buku) ?> dari <?= count($buku) ?> entri</span>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-sm" style="border:1px solid var(--border);border-radius:6px;color:var(--text-muted);font-size:.82rem;">Sebelumnya</button>
                <button class="btn btn-sm btn-primary-custom px-3" style="font-size:.82rem;border-radius:6px;">1</button>
                <button class="btn btn-sm" style="border:1px solid var(--border);border-radius:6px;color:var(--text-muted);font-size:.82rem;">Selanjutnya</button>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="d-md-none">
        <?php if (empty($buku)): ?>
        <div class="card-custom p-4 text-center text-muted">
            <i class="bi bi-inbox fs-2 d-block mb-2" style="color:#ccc"></i>
            Belum ada data. <a href="/buku/create" style="color:var(--primary);font-weight:600;">Tambah sekarang</a>
        </div>
        <?php else: ?>
        <div class="d-flex flex-column gap-3">
            <?php foreach ($buku as $i => $b): ?>
            <div class="card-custom p-3">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div style="flex:1; padding-right:.5rem;">
                        <div class="fw-bold mb-1" style="font-size:.95rem; line-height:1.3;">
                            <?= esc($b['judul']) ?>
                        </div>
                        <div class="text-muted small"><?= esc($b['penulis']) ?></div>
                    </div>
                    <span class="badge-year" style="white-space:nowrap;"><?= esc($b['tahun_terbit']) ?></span>
                </div>
                <div class="text-muted small mb-3">
                    <i class="bi bi-building me-1"></i><?= esc($b['penerbit']) ?>
                </div>
                <div class="d-flex gap-2">
                    <a href="/buku/edit/<?= $b['id'] ?>"
                       class="btn btn-primary-custom py-1 flex-fill text-center"
                       style="font-size:.82rem; font-weight:600; border-radius:8px;">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <a href="/buku/delete/<?= $b['id'] ?>"
                       class="btn py-1"
                       style="font-size:.82rem; font-weight:600; border-radius:8px; border:1.5px solid #ccc; color:var(--text-muted); flex:1; text-align:center;"
                       onclick="return confirm('Yakin ingin menghapus buku ini?')">
                        <i class="bi bi-trash me-1"></i>Hapus
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>