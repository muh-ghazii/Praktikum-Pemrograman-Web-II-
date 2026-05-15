<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK204-Ejaan Bilangan</title>
</head>
<body>
    <?php
    $value = "";
    $result = "";

    if (isset($_POST['submit'])){
        if ($_POST['value'] != ""){
            $value = $_POST['value'];
            if ($value == 0){
                $result = "Nol";
            } elseif ($value >= 1 && $value < 10){
                $result = "Satuan";
            }elseif ($value >= 11 && $value < 20){
                $result = "Belasan";
            } elseif ($value == 10  || ($value >= 20 && $value < 100)){
                $result = "Puluhan";
            } elseif ($value >= 100 && $value < 1000){
                $result = "Ratusan";
            } else{
                $result = "Anda Menginput Melebihi Limit Bilangan";
            }
        }
    }
    ?>

    <form method="POST" action="">
        <label for="value">Nilai : </label>
        <input type="number" name="value" id="value" value="<?php echo $value; ?>"><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <?php
    if ($result != "") {
        echo "<h2>Hasil : $result</h2>";
    }
    ?>
</body>
</html>