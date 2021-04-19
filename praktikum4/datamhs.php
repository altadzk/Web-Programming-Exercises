<?php
//author @alta

$namaFile = "datamhs.dat";
$myFile = fopen($namaFile, "r") or die("File tidak dapat dibuka!");

$tgl1 = explode("-", date("Y-m-d"));
$date1 = $tgl1[2];
$month1 = $tgl1[1];
$year1 = $tgl1[0];
$jd2 = gregoriantojd($month1, $date1, $year1);

function hitungUmur(String $tglLahir, $jd2){
    $tgl2 = explode("-", $tglLahir);
    $date2 = $tgl2[2];
    $month2 = $tgl2[1];
    $year2 = $tgl2[0];
    $jd1 = gregoriantojd($month2, $date2, $year2);
    $umur = intval(($jd2 - $jd1) / 365.25);
    return $umur;
}

echo "<center><h2>Data Mahasiswa</h2></center>";
echo "<center>Jumlah data : ".count(file($namaFile))."</center>";


echo "<center><br>";
echo "<table border='1'>";
echo("<tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Usia (Tahun)</th>
    <tr>");
$nomor = 1;
while (!feof($myFile)){
    echo("<tr>");
    $datamhs = explode("|", fgets($myFile));

    if ($datamhs[0] != ''){
        $usia = hitungUmur($datamhs[2], $jd2);
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

fclose($myFile);

?>