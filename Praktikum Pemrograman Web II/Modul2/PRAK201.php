<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK 201-Urut Nama</title>
</head>

<body>
    <form method="POST" action="">
        <label for="name1">Nama: 1</label>
        <input type="text" name="name1" id="name1" required><br>

        <label for="name2">Nama: 2</label>
        <input type="text" name="name2" id="name2" required><br>

        <label for="name3">Nama: 3</label>
        <input type="text" name="name3" id="name3" required><br>

        <button type="submit" name="Urutkan">Urutkan</button>
    </form>
    <br>

    <?php
    $first = "";
    $second = "";
    $third = "";

    if (isset($_POST['Urutkan'])) {
        $name1 = $_POST['name1'];
        $name2 = $_POST['name2'];
        $name3 = $_POST['name3'];

        if ($name1 < $name2 && $name1 < $name3) {
            $first = $name1;
            if ($name2 < $name3) {
                $second = $name2;
                $third = $name3;
            } else {
                $second = $name3;
                $third = $name2;
            }
        } elseif ($name2 < $name1 && $name2 < $name3) {
            $first = $name2;
            if ($name1 < $name3) {
                $second = $name1;
                $third = $name3;
            } else {
                $second = $name3;
                $third = $name1;
            }
        } else {
            $first = $name3;
            if ($name1 < $name2) {
                $second = $name1;
                $third = $name2;
            } else {
                $second = $name2;
                $third = $name1;
            }
        }
    }

    echo "<b>Output</b><br>";
    echo "$first <br>";
    echo "$second <br>";
    echo "$third <br>";
    ?>
</body>
</html>