<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK 302</title>
</head>
<body>
    <form action="" method="post">
        <label for="height">Tinggi :</label>
        <input type="number" name="height" id="height" required>
        <br>
        <label for="images">Alamat Gambar :</label>
        <input type="text" name="images" id="images" required>
        <br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>
    
    <?php
    if (isset($_POST['submit'])) {
        $height = $_POST['height'];
        $images = $_POST['images'];
        $i = 1;
        while ($i <= $height) {

            $j = 1;
            while ($j < $i) {
                echo "<img src='$images' style='width: 25px; height: 25px; opacity: 0;'>";
                $j++;
            }
            $k = $height;
            while ($k >= $i) {
                echo "<img src='$images' style='width: 25px; height: 25px;'>";
                $k--;
            }
            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>