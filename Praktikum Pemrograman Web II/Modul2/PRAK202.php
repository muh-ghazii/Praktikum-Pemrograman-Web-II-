<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK 202-Validasi Form</title>
    <style>
        .error {color: red;}
    </style>
</head>
<body>
    <?php
    $nameErrorMessage = "";
    $NIMErrorMessage = "";
    $genderErrorMessage = "";
    
    $name = "";
    $nim = "";
    $gender = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (empty($_POST["name"])){
            $nameErrorMessage = "Nama tidak boleh kosong";
        } else {
            $name = $_POST["name"];
        }
        if (empty($_POST["NIM"])){
            $NIMErrorMessage = "NIM tidak boleh kosong";
        } else {
            $nim = $_POST["NIM"];
        }
        if (empty($_POST["jk"])){
            $genderErrorMessage = "Jenis kelamin tidak boleh kosong";
        } else {
            $gender = $_POST["jk"];
        }
    }
    ?>

    <form method="POST" action="">
        <label for="name">Nama: </label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErrorMessage; ?></span><br><br>

        <label for="NIM">NIM: </label>
        <input type="text" name="NIM" id="NIM" value="<?php echo $nim; ?>">
        <span class="error">* <?php echo $NIMErrorMessage; ?></span><br><br>

        <label>Jenis Kelamin: </label>
        <span class="error">* <?php echo $genderErrorMessage; ?></span><br>
        <input type="radio" name="jk" value="Laki-Laki" <?php if (isset($gender) && $gender=="Laki-Laki") echo "checked";?>> Laki-Laki<br>
        <input type="radio" name="jk" value="Perempuan" <?php if (isset($gender) && $gender=="Perempuan") echo "checked";?>> Perempuan<br><br>

        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <?php
    if (!empty($name) && !empty($nim) && !empty($gender)) {
        echo "<h2>Output:</h2>";
        echo "$name <br>";
        echo "$nim <br>";
        echo "$gender <br>";
    }
    ?>
</body>
</html>