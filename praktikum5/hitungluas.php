<?php

$phi = 22/7;
$nama = $_GET["n"];
$diameter = $_GET["d"];
$tinggi = $_GET["t"];
$luasSelimut = ($phi * $diameter) * $tinggi;
$luasLingkaran = ($phi * ($diameter ** 2)) / 4;
$luasTabung = round($luasSelimut + (2 * $luasLingkaran), 2);

echo ("Luas tabung $nama dengan diameter $diameter dan tinggi $tinggi adalah $luasTabung satuan luas");
?>