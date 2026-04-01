<?php

$smartphones = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
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
            margin: 10px;
            background-color: #fff;
        }

        table {
            border-collapse: separate;
            border-spacing: 2px; 
            border: 1px solid #000; 
            width: 220px;
        }

        th {
            border: 1px solid #000;
            padding: 4px 6px;
            text-align: left;
            font-weight: bold;
            font-size: 16px;
        }

        td {
            border: 1px solid #000;
            padding: 4px 6px;
            font-size: 15px;
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
            <?php foreach ($smartphones as $item): ?>
                <tr>
                    <td><?php echo $item; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>