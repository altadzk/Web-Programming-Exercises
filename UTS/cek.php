<?php  
if (!isset($_COOKIE['nama'])){
	header('Location: index.php');
}
$a 		= $_POST['a'];
$b 		= $_POST['b'];
$jawab 	= $_POST['jawab'];

function hitung_jml($a, $b){
	$x = $a + $b;
	return $x;
}

$x = hitung_jml($a, $b);

if ($x == $jawab){
	$output = "Selamat Jawaban Kamu Benar, Jawaban Kamu $jawab";
	setcookie("score", $_COOKIE['score']+=10, time()+3*30*24*3600,"/");
} else {
	$output = "Maaf Jawaban kamu Salah, Jawaban Kamu $jawab , Jawaban Yang Benar $x";
	setcookie("lives", $_COOKIE['lives']-=1, time()+3*30*24*3600,"/");
	setcookie("score", $_COOKIE['score']-=2, time()+3*30*24*3600,"/");
}
?>
<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Game Matematika</title> 
	<style>
		body {
		  height: 100%;			
		  display: -ms-flexbox;
		  display: flex;
		  -ms-flex-align: center;
		  align-items: center;
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: black;
		  color: #59ff00;
		}
	</style>
</head> 
<body>
	<div class="container mx-auto" style="margin-top: 5%;">
        	<center>
            <div class="card bg-dark">
				<div class="card-header bg-dark text-center">
					<h3 style="color: #59ff00">Game Matematika</h3>
				</div>
			</div>
			<hr><h4 style="color: white;">Hallo <?php echo $_COOKIE['nama']?> , <?php echo $output?> <br>
			Lives: <?php echo $_COOKIE['lives'] ?> | Score: <?php echo $_COOKIE['score'] ?></h4><hr>
			<a href="game.php" class="btn btn-dark">Soal Selanjutnya</a>
			</center>
	</div>
</body>
</html>