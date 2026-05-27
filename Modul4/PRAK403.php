<?php
$dataMahasiswa = [
    [
        'no'   => 1,
        'nama' => 'Ridho',
        'matkul' => [
            ['nama_mk' => 'Pemrograman I',                  'sks' => 2],
            ['nama_mk' => 'Praktikum Pemrograman I',         'sks' => 1],
            ['nama_mk' => 'Pengantar Lingkungan Lahan Basah','sks' => 2],
            ['nama_mk' => 'Arsitektur Komputer',             'sks' => 3],
        ],
    ],
    [
        'no'   => 2,
        'nama' => 'Ratna',
        'matkul' => [
            ['nama_mk' => 'Basis Data I',           'sks' => 2],
            ['nama_mk' => 'Praktikum Basis Data I', 'sks' => 1],
            ['nama_mk' => 'Kalkulus',               'sks' => 3],
        ],
    ],
    [
        'no'   => 3,
        'nama' => 'Tono',
        'matkul' => [
            ['nama_mk' => 'Rekayasa Perangkat Lunak',       'sks' => 3],
            ['nama_mk' => 'Analisis dan Perancangan Sistem', 'sks' => 3],
            ['nama_mk' => 'Komputasi Awan',                 'sks' => 3],
            ['nama_mk' => 'Kecerdasan Bisnis',              'sks' => 3],
        ],
    ],
];

foreach ($dataMahasiswa as &$mhs) {
    $totalSks = 0;
    foreach ($mhs['matkul'] as $mk) {
        $totalSks += $mk['sks'];
    }
    $mhs['total_sks']   = $totalSks;
    $mhs['keterangan']  = ($totalSks < 7) ? 'Revisi KRS' : 'Tidak Revisi';
}
unset($mhs);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK403 - KRS Mahasiswa</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; margin: 30px; }
        table { border-collapse: collapse; width: auto; }
        th, td {
            border: 1px solid #000;
            padding: 7px 14px;
            text-align: left;
            vertical-align: top;
        }
        th { background-color: #c0c0c0; font-weight: bold; }
        .tidak-revisi {
            background-color: #28a745;
            color: #000000;
            text-align: center;
        }
        .revisi-krs {
            background-color: #fa1f35;
            color: #000000;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Mata Kuliah diambil</th>
                <th>SKS</th>
                <th>Total SKS</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataMahasiswa as $mhs): ?>
                <?php $jumlahMk = count($mhs['matkul']); ?>
                <?php foreach ($mhs['matkul'] as $index => $mk): ?>
                    <tr>
                        <td><?= $index === 0 ? $mhs['no'] : '' ?></td>
                        <td><?= $index === 0 ? htmlspecialchars($mhs['nama']) : '' ?></td>
                        <td><?= htmlspecialchars($mk['nama_mk']) ?></td>
                        <td><?= htmlspecialchars($mk['sks']) ?></td>
                        <td><?= $index === 0 ? htmlspecialchars($mhs['total_sks']) : '' ?></td>
                        <?php if ($index === 0): ?>
                            <?php $kelas = ($mhs['keterangan'] === 'Revisi KRS') ? 'revisi-krs' : 'tidak-revisi'; ?>
                            <td class="<?= $kelas ?>"><?= htmlspecialchars($mhs['keterangan']) ?></td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>