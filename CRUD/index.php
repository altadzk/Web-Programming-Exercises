<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>CRUD</title>
    <style type="text/css">
        body{
            background: black;
            align-content: center;
            text-align: center;
        }
        table{
            align-content: center;
            background: black;
            text-shadow: 1px 1px 0px #fff;
            border: 1px solid #00ff00;
        }
        table th {
            padding: 15px 35px;
            border-left: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
            background: lightgrey;
        }
        table td {
            padding: 15px 35px;
            border-top: 1px solid #ffff;
            border-bottom: 1px solid #e0e0e0;
            border-left: 1px solid #e0e0e0;
            background: white;
        }
        .tombol{
            background:black;
            color: #00ff00;
            border: solid darkgrey;
            border-radius: 3px;
            padding: 10px 20px;
        }
        .klik{
            color: #00ff00;
            background:white;
            border: solid black;
            border-radius: 3px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h2 style="color: #00ff00; text-align: center;" >CRUD DATA KARYAWAN - K3519007</h2>
    <br/>
    <a class="tombol" href="tambah.php"><b>TAMBAH KARYAWAN</b></a>
    <br/>
    <br/>
    <table align="center">
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
        include "config.php";
        $no = 1;
        $result = mysqli_query($mysqli,"SELECT * FROM karyawan ");
        while($user_data = mysqli_fetch_array($result)){
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
                    <a class="klik" href='edit.php?id=<?php echo $user_data['id_karyawan']; ?>'>EDIT</a>
                    <a class="klik" href='hapus.php?id=<?php echo $user_data['id_karyawan']; ?>'>HAPUS</a>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</body>
</html>