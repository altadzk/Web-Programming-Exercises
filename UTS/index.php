<?php
if (isset($_POST['submit'])){
	setcookie("nama", $_POST['nama'], time()+3*30*24*3600,"/");
	setcookie("email", $_POST['email'], time()+3*30*24*3600,"/");
	setcookie("lives", 5, time()+3*30*24*3600,"/");
	setcookie("score", 0, time()+3*30*24*3600,"/");
	header("Location: game.php");
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
	<?php 
	if (!isset($_COOKIE['nama'])){
	?>
	<div class="container mx-auto" style="margin-top: 5%;">
        <form method="post">
            <div class="card bg-dark">
				<div style="background-image: url('https://i.pinimg.com/564x/60/f8/4b/60f84bc6b48bffe1ea4b30b9239d5372.jpg');" class="card-header text-center">
					<h3 style="color: #59ff00;" class="card-header bg-dark text-center"><b>Game Matematika</b></h3>
				</div>
			</div>
			<hr><h4 style="text-align: center; color: white;">Selamat Datang di Game Matematika! <br>Silahkan Login!</h4><hr>
			<div class="card bg-dark">
				<div class="card-body bg-dark">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<button type="submit" class="btn" style="color: #59ff00; background-color: black; " name="submit">Login</button>
				</div>
			</div>
		</form>
	</div>
	<?php } else { ?>
	<div class="container mx-auto" style="margin-top: 5%;">
        	<center>
            <div class="card bg-dark">
				<div class="card-header bg-dark text-center">
					<h3 style="color: #59ff00">Game Matematika</h3>
				</div>
			</div>
			<hr><h4 style="color: white;">Hallo <?php echo $_COOKIE['nama']?> , selamat datang kembali di permainan ini!!!</h4><hr>
			<a href="game.php" class="btn btn-dark">Start Game</a>
			<hr><h5 style="color: white;">Bukan Anda? (<a href="keluar.php" style="text-decoration: none; color: #59ff00">klik di sini</a>)</h5><hr>
			</center>
	</div>
	<?php }?>
</body>
</html>