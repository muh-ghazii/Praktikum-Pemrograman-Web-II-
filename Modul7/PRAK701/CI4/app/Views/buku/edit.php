<div class="container py-4" style="max-width:640px;">

    <a href="/buku" class="text-decoration-none d-flex align-items-center gap-1 mb-3"
       style="color:var(--text-muted); font-size:.88rem; font-weight:500;">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Buku
    </a>

    <h4 class="fw-bold mb-4" style="font-family:'Hanken Grotesk',sans-serif;">
        <i class="bi bi-pencil-square me-2" style="color:var(--primary)"></i>Edit Buku
    </h4>

    <div class="card-custom p-4">
        <form action="/buku/update/<?= $buku['id'] ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Judul Buku <span style="color:var(--primary)">*</span></label>
                <input type="text" name="judul"
                       class="form-control form-control-custom"
                       value="<?= old('judul', $buku['judul']) ?>">
                <?php if ($validation->hasError('judul')): ?>
                <div class="invalid-feedback-custom">
                    <i class="bi bi-exclamation-circle me-1"></i><?= $validation->getError('judul') ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis <span style="color:var(--primary)">*</span></label>
                <input type="text" name="penulis"
                       class="form-control form-control-custom"
                       value="<?= old('penulis', $buku['penulis']) ?>">
                <?php if ($validation->hasError('penulis')): ?>
                <div class="invalid-feedback-custom">
                    <i class="bi bi-exclamation-circle me-1"></i><?= $validation->getError('penulis') ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Penerbit <span style="color:var(--primary)">*</span></label>
                <input type="text" name="penerbit"
                       class="form-control form-control-custom"
                       value="<?= old('penerbit', $buku['penerbit']) ?>">
                <?php if ($validation->hasError('penerbit')): ?>
                <div class="invalid-feedback-custom">
                    <i class="bi bi-exclamation-circle me-1"></i><?= $validation->getError('penerbit') ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="form-label">Tahun Terbit <span style="color:var(--primary)">*</span></label>
                <input type="number" name="tahun_terbit"
                       class="form-control form-control-custom"
                       min="1801" max="2023"
                       value="<?= old('tahun_terbit', $buku['tahun_terbit']) ?>">
                <div class="mt-1" style="font-size:.78rem; color:var(--text-muted);">
                    <i class="bi bi-info-circle me-1"></i>Antara tahun 1801 - 2024
                </div>
                <?php if ($validation->hasError('tahun_terbit')): ?>
                <div class="invalid-feedback-custom">
                    <i class="bi bi-exclamation-circle me-1"></i><?= $validation->getError('tahun_terbit') ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary-custom px-4 py-2 flex-fill">
                    <i class="bi bi-save me-2"></i>Update
                </button>
                <a href="/buku" class="btn btn-outline-primary-custom px-4 py-2">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>