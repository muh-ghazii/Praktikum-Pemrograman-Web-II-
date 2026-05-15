<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK 301</title>
</head>
<body>
    <form action="" method="post">
        <label for="amount">Jumlah Peserta:</label>
        <input type="number" name="amount" id="amount" required>
        <br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>
<?php
    if (isset($_POST['submit'])) {
        $amount = $_POST['amount'];
        $i = 1;
        while ($i <= $amount){
            if ($i % 2 == 0) {
                echo "<h2 style='color: green;'>Peserta ke-$i</h2>";
            } else {
                echo "<h2 style='color: red;'>Peserta ke-$i</h2>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>