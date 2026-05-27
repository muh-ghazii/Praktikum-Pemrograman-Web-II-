<?php
require_once 'Model.php';

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    deletePeminjaman((int)$_GET['id']);
    header('Location: Peminjaman.php?msg=delete'); exit;
}

$pesan = null;
if (isset($_GET['msg'])) {
    $msgs = ['insert'=>'Peminjaman baru berhasil ditambahkan.','update'=>'Data peminjaman berhasil diperbarui.','delete'=>'Data peminjaman berhasil dihapus.'];
    if (array_key_exists($_GET['msg'], $msgs))
        $pesan = ['tipe'=>'success','teks'=>$msgs[$_GET['msg']]];
}

$dataPinjam = getAllPeminjaman();
$total      = mysqli_num_rows($dataPinjam);
$activePage = 'peminjaman'; $pageTitle = 'Data Peminjaman';
include '_layout.php';
?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Peminjaman.php">Beranda</a></li>
                <li class="breadcrumb-item active">Data Peminjaman</li>
            </ol>
        </nav>
        <?php if ($pesan): ?>
        <div class="alert alert-<?= $pesan['tipe'] ?> alert-dismissible fade show py-2 mb-3">
            <i class="bi bi-check-circle-fill me-2"></i><?= htmlspecialchars($pesan['teks']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="page-title"><i class="bi bi-arrow-left-right"></i> Daftar Peminjaman</h4>
            <a href="FormPeminjaman.php" class="btn btn-merah btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i>Tambah Peminjaman
            </a>
        </div>
        <div class="content-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:52px">No</th>
                            <th>Nama Member</th>
                            <th>Judul Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                            <th class="text-center" style="width:90px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    if ($total > 0):
                        while ($row = mysqli_fetch_assoc($dataPinjam)):
                            $sudahKembali = !empty($row['tgl_kembali']);
                    ?>
                        <tr>
                            <td><span class="badge-no"><?= $no++ ?></span></td>
                            <td><a class="nama-link"><?= htmlspecialchars($row['nama_member']) ?></a></td>
                            <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                            <td><?= date('d M Y', strtotime($row['tgl_pinjam'])) ?></td>
                            <td><?= $sudahKembali ? date('d M Y', strtotime($row['tgl_kembali'])) : '<span style="color:#bbb">—</span>' ?></td>
                            <td>
                                <?php if ($sudahKembali): ?>
                                    <span class="badge-kembali"><i class="bi bi-check-circle-fill me-1"></i>Sudah Kembali</span>
                                <?php else: ?>
                                    <span class="badge-pinjam"><i class="bi bi-hourglass-split me-1"></i>Sedang Dipinjam</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="FormPeminjaman.php?id=<?= $row['id_peminjaman'] ?>" class="btn btn-icon-edit" title="Edit">
                                        <i class="bi bi-pencil" style="font-size:.8rem"></i>
                                    </a>
                                    <a href="Peminjaman.php?action=delete&id=<?= $row['id_peminjaman'] ?>"
                                       class="btn btn-icon-del" title="Hapus"
                                       onclick="return confirm('Hapus data peminjaman ini?')">
                                        <i class="bi bi-trash" style="font-size:.8rem"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr><td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>Belum ada data peminjaman.
                        </td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="content-card-footer">
                <span>Total: <?= $total ?> transaksi peminjaman</span>
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