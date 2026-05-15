<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK303</title>
</head>
<body>
    <form action="" method="POST">
        <label>Batas Bawah:</label>
        <input type="number" name="lower_limit" required>
        <br>
        <label>Batas Atas:</label>
        <input type="number" name="upper_limit" required>
        <br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $lower_limit = $_POST['lower_limit'];
        $upper_limit = $_POST['upper_limit'];
        $i = $lower_limit;
        $link_bintang = "https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png";

        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src='$link_bintang' style='width: 20px; height: 20px;'> ";
            } else {
                echo "$i ";
            }
            $i++;
        } while ($i <= $upper_limit);
    }
    ?>
</body>
</html>