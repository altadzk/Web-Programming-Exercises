<?php
function hitungGaji($gol, $masaKerja){
    if ($gol == "A"){
         if ($masaKerja < 10) {
            $gaji = 5000000;
         } else {
             $gaji = 7000000;
         }
    } else if ($gol == "B"){
            if ($masaKerja < 10) {
                $gaji = 6000000;
             } else {
                 $gaji = 8000000;
             }
         }
return $gaji;
}

echo "Besarnya gaji golongan A dengan masa kerja 5 tahun adalah Rp.".hitungGaji("A", 5)."\n";
echo "Besarnya gaji golongan A dengan masa kerja 11 tahun adalah Rp.".hitungGaji("A", 11)."\n";
echo "Besarnya gaji golongan B dengan masa kerja 2 tahun adalah Rp.".hitungGaji("B", 2)."\n";
echo "Besarnya gaji golongan B dengan masa kerja 14 tahun adalah Rp.".hitungGaji("B", 14)."\n";

?>