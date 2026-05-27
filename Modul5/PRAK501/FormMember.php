<?php
date_default_timezone_set('Asia/Makassar');
require_once 'Model.php';

$id     = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$isEdit = $id > 0;
$member = $isEdit ? getMemberById($id) : null;
$error  = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama               = trim($_POST['nama_member']        ?? '');
    $nomor              = trim($_POST['nomor_member']       ?? '');
    $alamat             = trim($_POST['alamat']             ?? '');
    $tgl_mendaftar      = trim($_POST['tgl_mendaftar']      ?? '');
    $tgl_terkahir_bayar = trim($_POST['tgl_terkahir_bayar'] ?? '');

    if ($nama === '' || $nomor === '') {
        $error = 'Nama Member dan Nomor Member wajib diisi.';
    } else {
        $ok = $isEdit
            ? updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terkahir_bayar)
            : insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terkahir_bayar);
        if ($ok) { header('Location: Member.php?msg=' . ($isEdit ? 'update' : 'insert')); exit; }
        else $error = 'Gagal menyimpan. Nomor Member mungkin sudah digunakan.';
    }
    $member = compact('nama_member','nomor_member','alamat','tgl_mendaftar','tgl_terkahir_bayar') + [
        'nama_member'=>$nama,'nomor_member'=>$nomor,'alamat'=>$alamat,
        'tgl_mendaftar'=>$tgl_mendaftar,'tgl_terkahir_bayar'=>$tgl_terkahir_bayar
    ];
}

$activePage = 'member';
$pageTitle  = $isEdit ? 'Edit Member' : 'Tambah Member';
include '_layout.php';
?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Member.php">Data Member</a></li>
                <li class="breadcrumb-item active"><?= $isEdit ? 'Edit Member' : 'Tambah Member' ?></li>
            </ol>
        </nav>

        <h4 class="page-title mb-4">
            <i class="bi bi-<?= $isEdit ? 'pencil-square' : 'person-plus-fill' ?>"></i>
            <?= $isEdit ? 'Edit Data Member' : 'Tambah Member Baru' ?>
        </h4>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="form-card">
                    <div class="form-card-header">
                        <h5>
                            <i class="bi bi-<?= $isEdit ? 'pencil-square' : 'person-plus-fill' ?>"></i>
                            <?= $isEdit ? 'Edit Data Member' : 'Form Tambah Member' ?>
                        </h5>
                    </div>
                    <div class="form-card-body">

                        <?php if ($error): ?>
                        <div class="alert alert-danger py-2 mb-3">
                            <i class="bi bi-exclamation-circle-fill me-2"></i><?= htmlspecialchars($error) ?>
                        </div>
                        <?php endif; ?>

                        <form method="POST" action="FormMember.php<?= $isEdit ? "?id=$id" : '' ?>">

                            <div class="mb-3">
                                <label class="form-label required">Nama Member</label>
                                <input type="text" name="nama_member" class="form-control"
                                       placeholder="Masukkan nama lengkap"
                                       value="<?= htmlspecialchars($member['nama_member'] ?? '') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label required">Nomor Member</label>
                                <input type="text" name="nomor_member" class="form-control"
                                       placeholder="Contoh: MBR001" maxlength="15"
                                       value="<?= htmlspecialchars($member['nomor_member'] ?? '') ?>" required>
                                <div class="form-text">Maksimal 15 karakter, harus unik.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3"
                                          placeholder="Masukkan alamat lengkap"><?= htmlspecialchars($member['alamat'] ?? '') ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Mendaftar</label>
                                    <input type="datetime-local" name="tgl_mendaftar" class="form-control"
                                           value="<?php
                                               $tgl = $member['tgl_mendaftar'] ?? '';
                                               echo $tgl ? date('Y-m-d\TH:i', strtotime($tgl)) : date('Y-m-d\TH:i');
                                           ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tgl Terakhir Bayar</label>
                                    <input type="date" name="tgl_terkahir_bayar" class="form-control"
                                           value="<?= htmlspecialchars($member['tgl_terkahir_bayar'] ?? '') ?>">
                                </div>
                            </div>

                            <hr class="my-4">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-merah px-4">
                                    <i class="bi bi-save-fill me-1"></i>
                                    <?= $isEdit ? 'Simpan Perubahan' : 'Tambah Member' ?>
                                </button>
                                <a href="Member.php" class="btn btn-outline-secondary px-3">
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