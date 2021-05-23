<?php
class koneksiDB{
	function getKoneksi(){
		$host = "localhost";
		$username = "root";
		$pass = "";
		$db = "mahasiswa";
		$konek = mysqli_connect($host, $username,$pass, $db) or die("konesi tidak berhasil".mysqli_connect_error());

		if (mysqli_connect_errno()) {
			exit();
		}
		return $konek;
	}
}
?>