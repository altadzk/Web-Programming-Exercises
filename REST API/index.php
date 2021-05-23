<?php
include_once("koneksi.php");
$db = new koneksiDB();
$koneksi = $db->getKoneksi();
$request = $_SERVER['REQUEST_METHOD'];
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segment = explode('/', $uri_path);

switch ($request) {
	case 'GET':
		if (!empty($uri_segment[4])) {
			$NIM = intval($uri_segment[4]);
			get_mhs($NIM);
		} else {
			get_mhs();
		}
		break;

	case 'POST':
		insert_mhs();
		break;

	case 'PUT':
		$NIM = intval($uri_segment[4]);
		update_mhs($NIM);
		break;

	case 'DELETE':
		$NIM = intval($uri_segment[4]);
		delete_mhs($NIM);
		break;

	default:
		header("HTTP/1.0 405 Method Tidak Terdaftar");
		break;
}


function get_mhs($NIM=""){
	global $koneksi;
	$query = "SELECT * FROM tb_mahasiswa";
	if (!empty($NIM)) {
		$query .= " WHERE NIM='".$NIM."' LIMIT 1";
	}
	$respon = array();
	$result = mysqli_query($koneksi, $query);
	$i = 0;
	if ($result) {
		$respon['kode'] = 1;
		$respon['status'] = "sukses";
		while ($row=mysqli_fetch_array($result)) {
			$respon['data'][$i]['NIM'] = $row['NIM'];
			$respon['data'][$i]['nama'] = $row['nama'];
			$respon['data'][$i]['angkatan'] = $row['angkatan'];
			$respon['data'][$i]['semester'] = $row['semester'];
			$respon['data'][$i]['IPK'] = $row['IPK'];
			$i++;
		}
	} else {
		$respon['kode'] = 0;
		$respon['status'] = "gagal";
	}
	header('Content-Type: application/json');
	echo json_encode($respon);
}

function insert_mhs(){
	global $koneksi;
	$data = json_decode(file_get_contents('php://input'), true);
	$nama = $data['nama'];
	$angkatan = $data['angkatan'];
	$semester = $data['semester'];
	$IPK = $data['IPK'];

	$query = "INSERT INTO tb_mahasiswa set nama='".$nama."', angkatan='".$angkatan."', semester='".$semester."', IPK='".$IPK."'";

	if (mysqli_query($koneksi, $query)) {
		$respon = [
			'kode'=>1,
			'status'=>'Data Mahasiswa Berhasil Ditambah'
		];
	} else {
		$respon = [
			'kode'=>0,
			'status'=>'Data Mahasiswa Gagal Ditambah'
		];
	}
	header('Content-Type: application/json');
	echo json_encode($respon);
}

function update_mhs($NIM){
	global $koneksi;
	$data = json_decode(file_get_contents('php://input'), true);
	$nama = $data['nama'];
	$angkatan = $data['angkatan'];
	$semester = $data['semester'];
	$IPK = $data['IPK'];

	$query = "INSERT INTO tb_mahasiswa set nama='".$nama."', angkatan='".$angkatan."', semester='".$semester."', IPK='".$IPK."' WHERE NIM=".$NIM;

	if (mysqli_query($koneksi, $query)) {
		$respon = [
			'kode'=>1,
			'status'=>'Data Mahasiswa Berhasil Diupdate'
		];
	} else {
		$respon = [
			'kode'=>0,
			'status'=>'Data Mahasiswa Gagal Diupdate'
		];
	}
	header('Content-Type: application/json');
	echo json_encode($respon);
}

function delete_mhs($NIM){
	global $koneksi;
	$query = "DELETE FROM `tb_mahasiswa` WHERE NIM='".$NIM."'";

	if (mysqli_query($koneksi, $query)) {
		$respon = [
			'kode'=>1,
			'status'=>'Data Mahasiswa Berhasil Dihapus'
		];
	} else {
		$respon = [
			'kode'=>0,
			'status'=>'Data Mahasiswa Gagal Dihapus'
		];
	}
	header('Content-Type: application/json');
	echo json_encode($respon);
}

?>