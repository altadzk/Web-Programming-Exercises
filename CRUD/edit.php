<?php
// include database  
include_once("config.php"); 
 
// Cek apakah parameter $_POST terisi, update data jika iya 
if(isset($_POST['update'])) {        
    $id = $_POST['id']; 
    $nama =$_POST['nama'];     
    $telepon=$_POST['telepon'];     
    $email=$_POST['email']; 
    $alamat = $_POST['alamat']; 
    $jenis_kelamin = $_POST['jenis_kelamin']; 
    $tempat_lahir = $_POST['tempat_lahir']; 
    $tanggal_lahir = $_POST['tanggal_lahir']; 
 
    // update  data     
    $result = mysqli_query($mysqli, "UPDATE karyawan SET nama='$nama',email='$email',telepon='$telepon',alamat='$alamat',jenis_kelamin='$jenis_kelamin',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir' WHERE id_karyawan=$id"); 
 
    // Redirect kembali ke halaman utama     
    header("Location: index.php"); 
}
?> 
    <?php 
    // Mengambil ID dan menampilkan data berdasarkan ID yang didapat 
    $id = $_GET['id']; 

    // Fetch user data  
    $result = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE id_karyawan=$id"); 

    while($user_data = mysqli_fetch_array($result)) {     
    $nama = $user_data['nama'];     
    $email = $user_data['email'];     
    $telepon = $user_data['telepon'];
    $alamat = $user_data['alamat']; 
    $jenis_kelamin = $user_data['jenis_kelamin']; 
    $tempat_lahir = $user_data['tempat_lahir']; 
    $tanggal_lahir = $user_data['tanggal_lahir'];  
} 
?> 

<html> 
<head>       
    <title>Edit Data Mahasiswa</title> 
    <style type="text/css">
        body{
            background: black;
        }
        .form{
            width: 550px;
            background: white;
            margin: 80px auto;
            padding: 30px 20px;
        }
        .form_data{
            box-sizing : border-box;
            width: 100%;
            padding: 10px;
            font-size: 11pt;
            margin-bottom: 20px;
        }
         
        .tombol{
            text-align: center;
            background:black;
            color: #00ff00;
            border: solid darkgrey;
            border-radius: 3px;
            padding: 10px 20px;
        }
        .notice{
            color: white;
            text-transform: uppercase;
        }
    </style>
</head> 
 
<body>
    <center>

    <br/><br/> 
    <h1 style="color: #00ff00; text-align: center;">Update Data Karyawan</h1>
    <form class="form" name="update" method="post" action="edit.php">         
        <table border="0">             
            <tr>                  
                <td>Nama</td>                 
                <td><input type="text" class="form_data" name="nama" value=<?php echo $nama;?>></td>             
            </tr>             
            <tr>                  
                <td>Email</td>                 
                <td><input type="text" class="form_data" name="email" value=<?php echo $email;?>></td>             
            </tr>             
            <tr>                  
                <td>Telepon</td>                 
                <td><input type="text" class="form_data" name="telepon" value=<?php echo $telepon;?>></td>             
            </tr>   
            <tr>                  
                <td>Alamat</td>                 
                <td><input type="text" class="form_data" name="alamat" value=<?php echo $alamat;?>></td>             
            </tr>   
            <tr>                  
                <td>Jenis Kelamin</td>                 
                <td><select type="text" class="form_data" name="jenis_kelamin">
                    <option>pria</option>
                    <option>wanita</option>
                </select>             
            </tr>
            <tr>                  
                <td>Tempat Lahir</td>                 
                <td><input type="text" class="form_data" name="tempat_lahir" value=<?php echo $tempat_lahir;?>></td>             
            </tr>
            <tr>                  
                <td>Tanggal Lahir</td>                 
                <td><input type="date" class="form_data" name="tanggal_lahir" value=<?php echo $tanggal_lahir;?>></td>             
        
        </table>    
        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>         
        <input type="submit" class="tombol" name="update" value="Update"> 
    </form> 
    <a class="tombol" href="index.php">Kembali</a>  
    </center>   
</body> 
</html> 