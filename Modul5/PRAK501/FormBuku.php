<?php
require_once 'Model.php';

$id     = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$isEdit = $id > 0;
$buku   = $isEdit ? getBukuById($id) : null;
$error  = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul       = trim($_POST['judul_buku']    ?? '');
    $penulis     = trim($_POST['penulis']        ?? '');
    $penerbit    = trim($_POST['penerbit']       ?? '');
    $tahun_terbit = (int)($_POST['tahun_terbit'] ?? 0);

    if ($judul === '' || $penulis === '') {
        $error = 'Judul Buku dan Penulis wajib diisi.';
    } else {
        $ok = $isEdit
            ? updateBuku($id, $judul, $penulis, $penerbit, $tahun_terbit)
            : insertBuku($judul, $penulis, $penerbit, $tahun_terbit);
        if ($ok) { header('Location: Buku.php?msg=' . ($isEdit ? 'update' : 'insert')); exit; }
        else $error = 'Terjadi kesalahan saat menyimpan data buku.';
    }
    $buku = ['judul_buku'=>$judul,'penulis'=>$penulis,'penerbit'=>$penerbit,'tahun_terbit'=>$tahun_terbit];
}

$activePage = 'buku';
$pageTitle  = $isEdit ? 'Edit Buku' : 'Tambah Buku';
include '_layout.php';
?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Buku.php">Data Buku</a></li>
                <li class="breadcrumb-item active"><?= $isEdit ? 'Edit Buku' : 'Tambah Buku' ?></li>
            </ol>
        </nav>

        <h4 class="page-title mb-4">
            <i class="bi bi-<?= $isEdit ? 'pencil-square' : 'journal-plus' ?>"></i>
            <?= $isEdit ? 'Edit Data Buku' : 'Tambah Buku Baru' ?>
        </h4>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="form-card">
                    <div class="form-card-header">
                        <h5>
                            <i class="bi bi-<?= $isEdit ? 'pencil-square' : 'journal-plus' ?>"></i>
                            <?= $isEdit ? 'Edit Data Buku' : 'Form Tambah Buku' ?>
                        </h5>
                    </div>
                    <div class="form-card-body">

                        <?php if ($error): ?>
                        <div class="alert alert-danger py-2 mb-3">
                            <i class="bi bi-exclamation-circle-fill me-2"></i><?= htmlspecialchars($error) ?>
                        </div>
                        <?php endif; ?>
                        <form method="POST" action="FormBuku.php<?= $isEdit ? "?id=$id" : '' ?>">
                            <div class="mb-3">
                                <label class="form-label required">Judul Buku</label>
                                <input type="text" name="judul_buku" class="form-control"
                                       placeholder="Masukkan judul buku"
                                       value="<?= htmlspecialchars($buku['judul_buku'] ?? '') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Penulis</label>
                                <input type="text" name="penulis" class="form-control"
                                       placeholder="Nama penulis"
                                       value="<?= htmlspecialchars($buku['penulis'] ?? '') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control"
                                       placeholder="Nama penerbit"
                                       value="<?= htmlspecialchars($buku['penerbit'] ?? '') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" class="form-control"
                                       placeholder="Contoh: 2023" min="1900" max="<?= date('Y') ?>"
                                       value="<?= htmlspecialchars($buku['tahun_terbit'] ?? '') ?>">
                            </div>
                            <hr class="my-4">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-merah px-4">
                                    <i class="bi bi-save-fill me-1"></i>
                                    <?= $isEdit ? 'Simpan Perubahan' : 'Tambah Buku' ?>
                                </button>
                                <a href="Buku.php" class="btn btn-outline-secondary px-3">
                                    <i class="bi bi-arrow-left me-1"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("open");
    document.getElementById("overlay").classList.toggle("show");
}
</script>
</body></html>