<?php
$panjang = 0;
$lebar = 0;
$nilai = '';
$matrix = [];
$error = '';
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
    $panjang = (int) $_POST['panjang'];
    $lebar   = (int) $_POST['lebar'];
    $nilai   = trim($_POST['nilai']);

    $nilaiArr = preg_split('/\s+/', $nilai, -1, PREG_SPLIT_NO_EMPTY);
    $totalNilai = count($nilaiArr);
    $totalSel   = $panjang * $lebar;

    if ($totalNilai !== $totalSel) {
        $error = "Panjang nilai tidak sesuai dengan ukuran matriks";
    } else {
        $index = 0;
        for ($i = 0; $i < $panjang; $i++) {
            for ($j = 0; $j < $lebar; $j++) {
                $matrix[$i][$j] = $nilaiArr[$index];
                $index++;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK401 - Cetak Matriks</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 4px;
        }
        .form-row label {
            white-space: nowrap;
            margin-right: 4px;
        }
        .form-row input {
            flex: 1;
            border: 1px solid #333;
            padding: 2px 5px;
            box-sizing: border-box;
        }
        form { width: 320px; }
        table { border-collapse: collapse; margin-top: 15px; }
        td { border: 1px solid #000; padding: 6px 14px; text-align: center; }
        .error { color: black; margin-top: 10px; }
        button { margin-top: 6px; padding: 2px 10px; }
    </style>
</head>
<body>
    <form method="POST">
        <div class="form-row">
            <label>Panjang :</label>
            <input type="number" name="panjang" value="<?= htmlspecialchars($panjang) ?>" min="1">
        </div>
        <div class="form-row">
            <label>Lebar :</label>
            <input type="number" name="lebar" value="<?= htmlspecialchars($lebar) ?>" min="1">
        </div>
        <div class="form-row">
            <label>Nilai :</label>
            <input type="text" name="nilai" value="<?= htmlspecialchars($nilai) ?>">
        </div>
        <div>
            <button type="submit">Cetak</button>
        </div>
    </form>

    <?php if ($submitted): ?>
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php else: ?>
            <table>
                <?php foreach ($matrix as $baris): ?>
                    <tr>
                        <?php foreach ($baris as $sel): ?>
                            <td><?= htmlspecialchars($sel) ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>