<?php
$baris = 4;
$kolom = 5;
$angka = 1;
echo "<table border='1'>";
for($i=$baris; $i<9; $i++){
	echo "<tr>";
	for ($j=$kolom; $j<9; $j++){
		echo "<td>$angka</td>";
		$angka++;
	}
	echo "</tr>";
}
echo "</table>";
?>