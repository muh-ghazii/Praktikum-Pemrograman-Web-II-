<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK305</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="string_input" required>
        <button type="submit" name="submit">submit</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['string_input'];
        $panjang = strlen($input);
        echo "<h3>Input:</h3>";
        echo "$input <br>";
        echo "<h3>Output:</h3>";
        
        for ($i = 0; $i < $panjang; $i++) {
            $karakter = strtolower($input[$i]);
            for ($j = 0; $j < $panjang; $j++) {
                if ($j == 0) {
                    echo strtoupper($karakter);
                } else {
                    echo $karakter;
                }
            }
        }
    }
    ?>
</body>
</html>