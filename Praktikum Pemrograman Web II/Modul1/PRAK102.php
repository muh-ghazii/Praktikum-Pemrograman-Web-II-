<?php

$panjang = 8.9;
$lebar   = 14.7;
$tinggi  = 5.4;

$volume = (1/3) * $panjang * $lebar * $tinggi;

echo "Volume Limas Alas Persegi Panjang" . "<br>";
echo "Panjang = " . $panjang . "<br>";
echo "Lebar   = " . $lebar   . "<br>";
echo "Tinggi  = " . $tinggi  . "<br>";
echo "Volume  = " . number_format($volume, 3, '.', '') . " m3" . "<br>" ;
?>