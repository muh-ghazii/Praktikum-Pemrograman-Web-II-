<?php
require_once 'Model.php';

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    deleteBuku((int)$_GET['id']);
    header('Location: Buku.php?msg=delete'); exit;
}

$pesan = null;
if (isset($_GET['msg'])) {
    $msgs = ['insert'=>'Buku baru berhasil ditambahkan.','update'=>'Data buku berhasil diperbarui.','delete'=>'Data buku berhasil dihapus.'];
    if (array_key_exists($_GET['msg'], $msgs))
        $pesan = ['tipe'=>'success','teks'=>$msgs[$_GET['msg']]];
}

$dataBuku = getAllBuku();
$total    = mysqli_num_rows($dataBuku);
$activePage = 'buku'; $pageTitle = 'Data Buku';
include '_layout.php';
?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Buku.php">BERANDA</a></li>
                <li class="breadcrumb-item active">DATA BUKU</li>
            </ol>
        </nav>

        <?php if ($pesan): ?>
        <div class="alert alert-<?= $pesan['tipe'] ?> alert-dismissible fade show py-2 mb-3">
            <i class="bi bi-check-circle-fill me-2"></i><?= htmlspecialchars($pesan['teks']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        <h4 class="page-title"><i class="bi bi-book-fill"></i> Daftar Buku</h4>
        <div class="content-card">
            <div class="content-card-header">
                <div>
                    <div style="font-weight:700;color:#222">Katalog Buku</div>
                    <div style="font-size:.78rem;color:#999;text-transform:uppercase;letter-spacing:.5px">Total: <?= $total ?> Entri</div>
                </div>
                <a href="FormBuku.php" class="btn btn-merah btn-sm px-3">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Buku
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:52px">No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th class="text-center" style="width:90px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    if ($total > 0):
                        while ($row = mysqli_fetch_assoc($dataBuku)): ?>
                        <tr>
                            <td><span class="badge-no"><?= $no++ ?></span></td>
                            <td><a class="nama-link"><?= htmlspecialchars($row['judul_buku']) ?></a></td>
                            <td><?= htmlspecialchars($row['penulis']) ?></td>
                            <td><?= htmlspecialchars($row['penerbit'] ?? '—') ?></td>
                            <td><span class="badge-tahun"><?= htmlspecialchars($row['tahun_terbit'] ?? '—') ?></span></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="FormBuku.php?id=<?= $row['id_buku'] ?>" class="btn btn-icon-edit" title="Edit">
                                        <i class="bi bi-pencil" style="font-size:.8rem"></i>
                                    </a>
                                    <a href="Buku.php?action=delete&id=<?= $row['id_buku'] ?>"
                                       class="btn btn-icon-del" title="Hapus"
                                       onclick="return confirm('Hapus buku ini?')">
                                        <i class="bi bi-trash" style="font-size:.8rem"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr><td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>Belum ada data buku.
                        </td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="content-card-footer">
                <span>Menampilkan 1 sampai <?= $total ?> dari <?= $total ?> entri</span>
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