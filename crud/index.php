<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>
 
    <h2>CRUD DATA MAHASISWA - WWW.MALASNGODING.COM</h2>
    <br/>
    <a href="tambah.php">+ TAMBAH MAHASISWA</a>
    <br/>
    <br/>
    <table border="1">
        <tr>
            <th>Nama</th> 
            <th>Email</th> 
            <th>Telepon</th> 
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>     
            <th>Update</th>
        </tr>

        <?php 
        include 'config.php';
        $no = 1;
        $data = mysqli_query($koneksi,"select * from karyawan");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $user_data['nama']; ?></td>
                <td><?php echo $user_data['email']; ?></td>
                <td><?php echo $user_data['telepon']; ?></td>
                <td><?php echo $user_data['alamat']; ?></td>
                <td><?php echo $user_data['jenis_kelamin']; ?></td>
                <td><?php echo $user_data['tempat_lahir']; ?></td>
                <td><?php echo $user_data['tanggal_lahir']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                    <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</body>
</html>