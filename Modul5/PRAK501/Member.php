<?php
require_once 'Model.php';

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    deleteMember($id);
    header('Location: Member.php?msg=delete');
    exit;
}

$pesan = null;
if (isset($_GET['msg'])) {
    $msgs = ['insert'=>'Member baru berhasil ditambahkan.','update'=>'Data member berhasil diperbarui.','delete'=>'Data member berhasil dihapus.'];
    if (array_key_exists($_GET['msg'], $msgs))
        $pesan = ['tipe'=>'success','teks'=>$msgs[$_GET['msg']]];
}

$dataMember = getAllMember();
$activePage = 'member'; $pageTitle = 'Data Member'; $headerTitle = 'Data Member';
include '_layout.php';
?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Member.php">Beranda</a></li>
                <li class="breadcrumb-item active">Data Member</li>
            </ol>
        </nav>

        <?php if ($pesan): ?>
        <div class="alert alert-<?= $pesan['tipe'] ?> alert-dismissible fade show py-2 mb-3" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i><?= htmlspecialchars($pesan['teks']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="page-title"><i class="bi bi-people-fill"></i> Daftar Member</h4>
            <a href="FormMember.php" class="btn btn-merah btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i>Tambah Member
            </a>
        </div>
        <div class="content-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:52px">No</th>
                            <th>Nama Member</th>
                            <th>Nomor Member</th>
                            <th>Alamat</th>
                            <th>Tgl Mendaftar</th>
                            <th>Tgl Terakhir Bayar</th>
                            <th class="text-center" style="width:90px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    if (mysqli_num_rows($dataMember) > 0):
                        while ($row = mysqli_fetch_assoc($dataMember)): ?>
                        <tr>
                            <td><span class="badge-no"><?= $no++ ?></span></td>
                            <td><a class="nama-link"><?= htmlspecialchars($row['nama_member']) ?></a></td>
                            <td><code><?= htmlspecialchars($row['nomor_member']) ?></code></td>
                            <td><?= htmlspecialchars($row['alamat'] ?? '—') ?></td>
                            <td><?= $row['tgl_mendaftar'] ? date('d M Y H:i', strtotime($row['tgl_mendaftar'])) : '—' ?></td>
                            <td><?= $row['tgl_terkahir_bayar'] ? date('d M Y', strtotime($row['tgl_terkahir_bayar'])) : '—' ?></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="FormMember.php?id=<?= $row['id_member'] ?>" class="btn btn-icon-edit" title="Edit">
                                        <i class="bi bi-pencil" style="font-size:.8rem"></i>
                                    </a>
                                    <a href="Member.php?action=delete&id=<?= $row['id_member'] ?>"
                                       class="btn btn-icon-del" title="Hapus"
                                       onclick="return confirm('Hapus member <?= htmlspecialchars(addslashes($row['nama_member'])) ?>?')">
                                        <i class="bi bi-trash" style="font-size:.8rem"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr><td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>Belum ada data member.
                        </td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="content-card-footer">
                <span>Total: <?= mysqli_num_rows($dataMember) ?> member</span>
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