<?php
//membuka file
$namaFile = "datamhs.dat";
$myFile = fopen($namaFile, "r") or die("File tidak bisa dibuka!");
//end of membuka file

echo "<center><h1>Data Mahasiswa</h1></center>";
//menghitung jumlah baris
echo "<center>Jumlah data : ".count(file($namaFile))."</center>";
//end of menghitung jumlah baris

//tanggal hari ini
$tglNow = explode("-", date("Y-m-d"));
$dateNow = $tglNow[2];
$monthNow = $tglNow[1];
$yearNow = $tglNow[0];
$jd2 = gregoriantojd($monthNow, $dateNow, $yearNow);
//end of tanggal hari ini

//menghitung umur
function perhitunganUmur(String $tglLahir, $jd2){
    $tglLahir = explode("-", $tglLahir);
    $dateLahir = $tglLahir[2];
    $monthLahir = $tglLahir[1];
    $yearLahir = $tglLahir[0];
    $jd1 = gregoriantojd($monthLahir, $dateLahir, $yearLahir);
    $umur = intval(($jd2 - $jd1) / 365.25);
    return $umur;
}
//end of menghitung umur

//tabel
echo "<center><br>";
echo "<table border='1'>";
echo("<tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mhs</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Usia (Tahun)</th>
    <tr>");
$nomor = 1;
while (!feof($myFile)){
    echo("<tr>");
    $datamhs = explode("|", fgets($myFile));

    if ($datamhs[0] != ''){
        $usia = perhitunganUmur($datamhs[2], $jd2);
        echo("
            <td>$nomor</td>
            <td>$datamhs[0]</td>
            <td>$datamhs[1]</td>
            <td>$datamhs[2]</td>
            <td>$datamhs[3]</td>
            <td>$usia</td>");
        $nomor++;
    }
    echo("</tr>");
}
echo "</table>";
echo "/<center>";
//end of tabel

//menutup file
fclose($myFile);
//end of menutup file

?>