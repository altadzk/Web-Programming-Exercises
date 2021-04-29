<?php

include('cek.php');

echo "<center><h1>".$_COOKIE['namauser']."</h1></center>";
echo "<center><h3>Hallo, nama saya Mr. PHP. Saya telah memilih secara random sebuah bilangan bulat. Silakan Anda menebak ya!</h3></center>";
?>



<?php
$bilAcak = $_COOKIE['random'];
// echo "".$bilAcak."";
if(isset($_GET['jawaban'])){
    $nilaiTebak = $_GET['jawaban'];
    if ($nilaiTebak == $bilAcak){
        echo "<center>";
        echo "<p><h3>Selamat ya,   ".$_COOKIE['namauser']." tebakan anda benar</h3></p>";
        setcookie("random", "", time()+(60*60*24*3600),"/");
        setcookie("random", rand(0,100), time()+(60*30*24*3600),"/");
        echo ("<a href='page.php'>Mulai lagi</a></center>");
    }else if ($nilaiTebak > $bilAcak){
        echo "<center><p>Waaah… masih salah ya, bilangan tebakan Anda terlalu tinggi</p></center>";
    }else if ($nilaiTebak < $bilAcak){
        echo "<center><p>Waaah… masih salah ya, bilangan tebakan Anda terlalu rendah.</p></center>";
    }
}
?>

<center><form method="get">
<b>Bilangan Tebakan Anda : <input type="text" name="jawaban"></b>
<input type="submit" name="submit" value="Submit">
</form></center>

<?php
echo ("<p><center><a href=logout.php>Log Out</a></center></p>");
?>