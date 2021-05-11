<?php 
// include database 
include"config.php"; 
 
// Mengambil ID 
$id = $_GET['id']; 
 
// Menghapus baris data dengan ID yang berkesesuaian 
$result = mysqli_query($mysqli, "DELETE FROM `karyawan` WHERE `karyawan`.`id_karyawan`=$id"); 
 
// Redirect kembali ke halaman utama 
header("Location:index.php"); 
?>