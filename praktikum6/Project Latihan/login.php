<?php
//daftar users
$namafile = "data.txt";
$myfile = fopen($namafile, "r") or die("File error");
$users = array();
while(!feof($myfile)){
    $user = explode(",", fgets($myfile));
    array_push($users, $user);
}
fclose($myfile);

//jika form login sudah submitted

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //proses pengecekan ada tidaknya username dan password dalam data
    foreach($users as $profile_user){
        if ((trim($profile_user[0]) == $username) && (trim($profile_user[2]) == $password)){
            //jika ada yg match maka akan bikin session untuk simpan nama user
            $_COOKIE['namauser'] = trim($profile_user[1]);
            setcookie("namauser", trim($profile_user[1]), time()+(60*60*24*3600),"/");
            setcookie("random", rand(0,100), time()+(60*60*24*3600),"/");
        }
        //redirect halaman ke page1.php
        if (isset($_COOKIE["namauser"])){
            header("Location: page.php");
        }
    }
    echo("<center><h2>Login gagal, silahkan coba <a href='form.html'>log in</a> kembali</h2></center>");

}
?>