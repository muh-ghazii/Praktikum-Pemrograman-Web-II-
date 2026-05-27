<?php
date_default_timezone_set('Asia/Makassar');
require_once 'Model.php';

$id       = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$isEdit   = $id > 0;
$pinjaman = $isEdit ? getPeminjamanById($id) : null;
$error    = '';
$allMember = getAllMember();
$allBuku   = getAllBuku();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member   = (int)($_POST['id_member']   ?? 0);
    $id_buku     = (int)($_POST['id_buku']     ?? 0);
    $tgl_pinjam  = trim($_POST['tgl_pinjam']   ?? '');
    $tgl_kembali = trim($_POST['tgl_kembali']  ?? '');

    if ($id_member <= 0 || $id_buku <= 0 || $tgl_pinjam === '') {
        $error = 'Member, Buku, dan Tanggal Pinjam wajib diisi.';
    } else {
        $ok = $isEdit
            ? updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali)
            : insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
        if ($ok) { header('Location: Peminjaman.php?msg=' . ($isEdit ? 'update' : 'insert')); exit; }
        else $error = 'Terjadi kesalahan saat menyimpan data peminjaman.';
    }
    $pinjaman = ['id_member'=>$id_member,'id_buku'=>$id_buku,'tgl_pinjam'=>$tgl_pinjam,'tgl_kembali'=>$tgl_kembali];
}

$activePage = 'peminjaman';
$pageTitle  = $isEdit ? 'Edit Peminjaman' : 'Tambah Peminjaman';
include '_layout.php';
?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Peminjaman.php">Data Peminjaman</a></li>
                <li class="breadcrumb-item active"><?= $isEdit ? 'Edit Peminjaman' : 'Tambah Peminjaman' ?></li>
            </ol>
        </nav>
        <h4 class="page-title mb-4">
            <i class="bi bi-<?= $isEdit ? 'pencil-square' : 'plus-circle-fill' ?>"></i>
            <?= $isEdit ? 'Edit Data Peminjaman' : 'Tambah Peminjaman Baru' ?>
        </h4>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="form-card">
                    <div class="form-card-header">
                        <h5>
                            <i class="bi bi-<?= $isEdit ? 'pencil-square' : 'plus-circle-fill' ?>"></i>
                            <?= $isEdit ? 'Edit Data Peminjaman' : 'Form Tambah Peminjaman' ?>
                        </h5>
                    </div>
                    <div class="form-card-body">
                        <?php if ($error): ?>
                        <div class="alert alert-danger py-2 mb-3">
                            <i class="bi bi-exclamation-circle-fill me-2"></i><?= htmlspecialchars($error) ?>
                        </div>
                        <?php endif; ?>
                        <form method="POST" action="FormPeminjaman.php<?= $isEdit ? "?id=$id" : '' ?>">
                            <div class="mb-3">
                                <label class="form-label required">Member</label>
                                <select name="id_member" class="form-select" required>
                                    <option value="">-- Pilih Member --</option>
                                    <?php
                                    mysqli_data_seek($allMember, 0);
                                    while ($m = mysqli_fetch_assoc($allMember)):
                                        $sel = ($pinjaman['id_member'] ?? 0) == $m['id_member'] ? 'selected' : '';
                                    ?>
                                    <option value="<?= $m['id_member'] ?>" <?= $sel ?>>
                                        [<?= htmlspecialchars($m['nomor_member']) ?>] <?= htmlspecialchars($m['nama_member']) ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Buku</label>
                                <select name="id_buku" class="form-select" required>
                                    <option value="">-- Pilih Buku --</option>
                                    <?php
                                    mysqli_data_seek($allBuku, 0);
                                    while ($b = mysqli_fetch_assoc($allBuku)):
                                        $sel = ($pinjaman['id_buku'] ?? 0) == $b['id_buku'] ? 'selected' : '';
                                    ?>
                                    <option value="<?= $b['id_buku'] ?>" <?= $sel ?>>
                                        <?= htmlspecialchars($b['judul_buku']) ?> — <?= htmlspecialchars($b['penulis']) ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Tanggal Pinjam</label>
                                    <input type="date" name="tgl_pinjam" class="form-control"
                                           value="<?= htmlspecialchars($pinjaman['tgl_pinjam'] ?? date('Y-m-d')) ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Kembali</label>
                                    <input type="date" name="tgl_kembali" class="form-control"
                                           value="<?= htmlspecialchars($pinjaman['tgl_kembali'] ?? '') ?>">
                                    <div class="form-text">Kosongkan jika belum dikembalikan.</div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-merah px-4">
                                    <i class="bi bi-save-fill me-1"></i>
                                    <?= $isEdit ? 'Simpan Perubahan' : 'Tambah Peminjaman' ?>
                                </button>
                                <a href="Peminjaman.php" class="btn btn-outline-secondary px-3">
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