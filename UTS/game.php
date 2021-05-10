<?php  
if (!isset($_COOKIE['nama'])){
	header('Location: index.php');
}
$a = rand(0,20);
$b = rand(0,30);
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
	if (isset($_COOKIE['nama']) AND ($_COOKIE['lives'] > 0))
	{?>
	<div class="container mx-auto" style="width: 80%; margin-top: 5%;">
        <form method="post" action="cek.php">
            <div class="card bg-dark">
				<div class="card-header bg-dark text-center">
					<h3 style="text-align: center; color: #59ff00">Game Matematika</h3>
				</div>
			</div>
			<hr><h4 style="color: white; text-align: center;">Hallo <?php echo $_COOKIE['nama']?> , tetap semangat ya… you can do the best!!</h4><hr>
			<div class="card bg-dark">
				<div class="card-body bg-dark">
					<div class="form-inline">
						<label class="control-label col-sm-3">Lives : </label>
						<input type="text" class="form-control text-disabled" name="nyawa" value="<?php echo $_COOKIE['lives']?>" disabled />
						<label class="control-label col-sm-3">Score : </label>
						<input type="text" class="form-control" name="score" value="<?php echo $_COOKIE['score']?>" disabled>
					</div><hr><center>
					<div class="form-group" style="width: 60%">
						<input type="hidden" name="a" value="<?php echo $a?>">
						<input type="hidden" name="b" value="<?php echo $b?>">
						<input type="text" class="form-control" name="soal" placeholder="<?php echo $a?> + <?php echo $b?> = " disabled>
					</div>
					<div class="form-group" style="width: 60%">
						<input type="text" class="form-control" name="jawab" placeholder="Masukkan Jawaban" required>
					</div><hr>
					<button type="submit" class="btn" style="background-color: black; color: #59ff00" name="submit">Jawab</button>
				</center>	
				</div>
			</div>
		</form>
	</div>
	<?php } else {
		$nama 	= $_COOKIE['nama'];
		$score 	= $_COOKIE['score'];

		include 'koneksi.php';
		$sql = "INSERT INTO hof (nama, score) VALUES ('$nama', '$score')";

		mysqli_query($mysqli, $sql);
	?>
	<div class="container mx-auto" style="width: 80%; margin-top: 5%;">
        <div class="card bg-dark">
			<div class="card-header bg-dark text-center">
				<h3 style="text-align: center; color: #59ff00">Game Over</h3>
			</div>
		</div>
		<hr><h4 style="color: white; text-align: center;">Hallo <?php echo $_COOKIE['nama']?> , Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik. <br>Score Kamu : <?php echo $_COOKIE['score']?> </h4><hr>
		<div class="card bg-dark">
			<div class="card-header bg-dark text-center">
				<h3 style="text-align: center; color: #59ff00">Hall Of Fame</h3>
			</div>
		</div>
		<table class="table table-borderless" style="color: white;">
			<thead style="text-align: center;">
				<th>No</th>
				<th>Nama</th>
				<th>Score</th>
			</thead>
			<?php 
			include 'koneksi.php';
			$sql = "SELECT * FROM hof ORDER BY score DESC limit 10";
			$query = $mysqli->query($sql);

			if ($query->num_rows > 0) {
            $no = 1;
	        while($row = $query->fetch_assoc()) 
	        {?>
			<tbody style="text-align: center;">
				<td><?php echo $no++?></td>
				<td><?php echo $row['nama'] ?></td>
				<td><?php echo $row['score'] ?></td>
			</tbody>
			<?php }}?>
		</table>
		<center><a href="keluar.php" class="btn btn-secondary">Main Lagi</a></center>
	</div>
	<?php } ?>	
</body>
</html>