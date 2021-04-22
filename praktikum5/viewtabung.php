<?php


$namaFile = "datatabung.dat";
$myFile = fopen($namaFile, "r") or die("File tidak bisa dibuka!");


echo "<h2>DATA UKURAN TABUNG</h2>";

echo "<table border='1'>";
echo("<tr>
        <th>NAMA TABUNG</th>
        <th>DIAMETER</th>
        <th>TINGGI</th>
        <th>LUAS</th>
    </tr>");

while (!feof($myFile)){
    echo("<tr>");
    $dataTabung = explode(",", fgets($myFile));
    $link = "http://localhost:8080/pemweb/hitungluas.php";
    echo("
        <td>$dataTabung[0]</td>
        <td>$dataTabung[1]</td>
        <td>$dataTabung[2]</td>
        <td><a href=$link target='_blank'>view</a></td>
        ");
    echo("</tr>");
};
echo("</table>");

fclose($myFile);
?>