<?php


$namaFile = "datamhs.dat";
$myFile = fopen($namaFile, "a") or die("File tidak bisa dibuka!");


$nim1 = $_POST['nim'];
$nama1 = $_POST['nama'];
$tglLahir1 = $_POST['tgllahir'];
$tmptLahir1 = $_POST['tmptlhr'];


fwrite($myFile, "\n".$nim1."|".$nama1."|".$tglLahir1."|".$tmptLahir1."");
fclose($myFile);

echo "Data telah ditambahkan";
?>