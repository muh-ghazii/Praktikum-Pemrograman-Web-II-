<?php
$mahasiswa = [
    ['nama' => 'Andi',    'nim' => '2101001', 'uts' => 87, 'uas' => 65],
    ['nama' => 'Budi',    'nim' => '2101002', 'uts' => 76, 'uas' => 79],
    ['nama' => 'Tono',    'nim' => '2101003', 'uts' => 50, 'uas' => 41],
    ['nama' => 'Jessica', 'nim' => '2101004', 'uts' => 60, 'uas' => 75],
];

function getNilaiHuruf($nilaiAkhir) {
    if ($nilaiAkhir >= 80) {
        return 'A';
    } elseif ($nilaiAkhir >= 70) {
        return 'B';
    } elseif ($nilaiAkhir >= 60) {
        return 'C';
    } elseif ($nilaiAkhir >= 50) {
        return 'D';
    } else {
        return 'E';
    }
}
foreach ($mahasiswa as &$mhs) {
    $nilaiAkhir       = (0.4 * $mhs['uts']) + (0.6 * $mhs['uas']);
    $mhs['nilai_akhir'] = $nilaiAkhir;
    $mhs['huruf']       = getNilaiHuruf($nilaiAkhir);
}
unset($mhs); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK402 - Nilai Mahasiswa</title>
    <style>
        body { font-family: Times New Roman, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: auto; }
        th, td {
            border: 1px solid #000;
            padding: 8px 16px;
            text-align: left;
        }
        th { background-color: #c0c0c0; font-weight: bold; }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?= htmlspecialchars($mhs['nama']) ?></td>
                    <td><?= htmlspecialchars($mhs['nim']) ?></td>
                    <td><?= htmlspecialchars($mhs['uts']) ?></td>
                    <td><?= htmlspecialchars($mhs['uas']) ?></td>
                    <td><?= htmlspecialchars($mhs['nilai_akhir']) ?></td>
                    <td><?= htmlspecialchars($mhs['huruf']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>