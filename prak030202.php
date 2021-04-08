<?php

function hitungDenda($tglHarusKembali, $tglKembali){
    //explode tglHarusKembali
    $tgl1 = explode("-", $tglHarusKembali);
    $date1 = $tgl1[2];
    $month1 = $tgl1[1];
    $year1 = $tgl1[0];

    //explode tglKembali
    $tgl2 = explode("-", $tglKembali);
    $date2 = $tgl2[2];
    $month2 = $tgl2[1];
    $year2 = $tgl2[0];

    //mengubah menjadi format JDN
    $datee1 = gregoriantojd($month1, $date1, $year1);
    $datee2 = gregoriantojd($month2, $date2, $year2);

    //menghitung selisih hari
    $selisihHari = $datee2 - $datee1;

    //menghitung denda
    $denda = $selisihHari * 3000;

    return $denda;
}

echo "Besarnya denda adalah: Rp ".hitungDenda("2021-01-03", "2021-01-05");

?>