<?php  
$host = "localhost";
$username = "root";
$password = "";
$db = "pertemuan14";

$koneksi = mysqli_connect($host, $username, $password, $db);

if (!$koneksi){
	die("Koneksi Gagal : " . mysqli_connect_error());
}
?>