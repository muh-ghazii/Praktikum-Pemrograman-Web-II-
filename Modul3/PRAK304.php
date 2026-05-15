<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK304</title>
</head>
<body>
    <?php
    $star = 0;
    $link_star = "https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png";

    if (isset($_POST['jumlah'])) {
        $star = $_POST['jumlah'];
    }

    if (isset($_POST['tambah'])) {
        $star++; 
    } elseif (isset($_POST['kurang'])) {
        $star--; 
    }

    if ($star < 0) {
        $star = 0;
    }
    ?>
    <form action="" method="POST">
        <label>Jumlah bintang </label>
        <input type="number" name="jumlah" required>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <?php
    if ($star > 0) {
        echo "Jumlah bintang $star <br><br>";

        for ($i = 0; $i < $star; $i++) {
            echo "<img src='$link_star' style='width: 50px; height: 50px;'> ";
        }
        echo "<br><br>";
        echo "<form action='' method='POST'>";
        echo "<input type='hidden' name='jumlah' value='$star'>";
        echo "<button type='submit' name='tambah'>Tambah</button> ";
        echo "<button type='submit' name='kurang'>Kurang</button>";
        echo "</form>";
    }
    ?>
</body>
</html>