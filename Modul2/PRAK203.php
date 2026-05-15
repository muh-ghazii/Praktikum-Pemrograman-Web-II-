<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK203-Konversi Suhu</title>
</head>
<body>
    <?php
    $value = "";
    $from = "";
    $to = "";
    $result = "";

    if (isset($_POST['konversi'])) {
        $value = $_POST['value'];

        if (isset($_POST['from']) && isset($_POST['to']) && $value != ""){
            $from = $_POST['from'];
            $to = $_POST['to'];

            if ($from == "Celcius") {
                if ($to == "Celcius") $result = $value;
                elseif ($to == "Fahrenheit") $result = ($value * 9/5) + 32;
                elseif ($to == "Rheamur") $result = $value * 4/5;
                elseif ($to == "Kelvin") $result = $value + 273.15;
            }
            elseif ($from == "Fahrenheit") {
                if ($to == "Celcius") $result = ($value - 32) * 5/9;
                elseif ($to == "Fahrenheit") $result = $value;
                elseif ($to == "Rheamur") $result = ($value - 32) * 4/9;
                elseif ($to == "Kelvin") $result = ($value - 32) * 5/9 + 273.15;
            }
            elseif ($from == "Rheamur"){
                if ($to == "Celcius") $result = $value * 5/4;
                elseif ($to == "Fahrenheit") $result = $value * 9/4 + 32;
                elseif ($to == "Rheamur") $result = $value;
                elseif ($to == "Kelvin") $result = $value * 5/4 + 273.15;
            }
            elseif ($from == "Kelvin"){
                if ($to == "Celcius") $result = $value - 273.15;
                elseif ($to == "Fahrenheit") $result = ($value - 273.15) * 9/5 + 32;
                elseif ($to == "Rheamur") $result = ($value - 273.15) * 4/5;
                elseif ($to == "Kelvin") $result = $value;
            }
        }
    }
    ?>

    <form method = "POST" action="">
        <label>Nilai : </label>
        <input type="number" step="any" name="value" id="value" value ="<?php echo $value; ?>"><br><br>

        <label>Dari : </label><br>
        <input type="radio" name="from" id="from" value="Celcius" <?php if ($from=="Celcius") echo "checked"; ?>>Celcius<br>
        <input type="radio" name="from" id="from" value="Fahrenheit" <?php if ($from=="Fahrenheit") echo "checked"; ?>>Fahrenheit<br>
        <input type="radio" name="from" id="from" value="Rheamur" <?php if ($from=="Rheamur") echo "checked"; ?>>Rheamur<br>
        <input type="radio" name="from" id="from" value="Kelvin" <?php if ($from=="Kelvin") echo "checked"; ?>>Kelvin<br><br>

        <label>Ke : </label><br>
        <input type="radio" name="to" id="to" value="Celcius" <?php if ($to=="Celcius") echo "checked"; ?>>Celcius<br>
        <input type="radio" name="to" id="to" value="Fahrenheit" <?php if ($to=="Fahrenheit") echo "checked"; ?>>Fahrenheit<br>
        <input type="radio" name="to" id="to" value="Rheamur" <?php if ($to=="Rheamur") echo "checked"; ?>>Rheamur<br>
        <input type="radio" name="to" id="to" value="Kelvin" <?php if ($to=="Kelvin") echo "checked"; ?>>Kelvin<br><br>

        <button type="submit" name="konversi">Konversi</button>
    </form>

    <?php
    if ($result !== "") {

        $symbol = "";
        if ($to == "Celcius") $symbol = "°C";
        elseif ($to == "Fahrenheit") $symbol = "°F";
        elseif ($to == "Rheamur") $symbol = "°R";
        elseif ($to == "Kelvin") $symbol = "°K";

        echo "<h2>Hasil Konversi:  " . number_format($result, 1) . " $symbol</h2>";
    }
    ?>
</body>
</html>