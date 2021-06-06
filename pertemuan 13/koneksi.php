<?php
$host		="localhost";
$username	="root";
$password	="";
$database	="pertemuan13";
$koneksi	=mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysql_connect_error();
}

?>