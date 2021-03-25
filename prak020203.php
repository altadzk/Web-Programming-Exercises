<?php
$baris = 4;
$kolom = 5;
$angka = 1;
echo "<table border='1'>";
for($i=$baris; $i<9; $i++){
	echo "<tr>";
	for ($j=$kolom; $j<9; $j++){
		if ($angka % 2==0){
			echo "<td style='color: white; background-color: red;'>$angka</td>";
		}
		else {
			echo "<td style='color: red; background-color: white;'>$angka</td>";
		}
		$angka++;
	}
	echo "</tr>";
}
echo "</table>";
?>