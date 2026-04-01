<?php

$smartphones = [
    "s22"      => "Samsung Galaxy S22",
    "s22plus"  => "Samsung Galaxy S22+",
    "a03"      => "Samsung Galaxy A03",
    "xcover5"  => "Samsung Galaxy Xcover 5"
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone Samsung</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 20px;
            background-color: #fff;
        }

        table {
            border-collapse: separate;
            border-spacing: 2px;
            border: 1px solid #000;
            width: 300px;
        }

        th {
            background-color: #ff0000;
            color: #000; 
            font-weight: bold;
            font-size: 22px; 
            padding: 25px 5px; 
            text-align: left;
            border: 1px solid #000; 
        }

        td {
            border: 1px solid #000; 
            padding: 5px 8px;
            background-color: #fff;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($smartphones as $key => $value): ?>
                <tr>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>