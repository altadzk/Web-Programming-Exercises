<?php
date_default_timezone_set('Asia/Jakarta');
$db_host = "sql100.epizy.com";
$db_user = "epiz_28586349";
$db_pass = "8tbl8qCJNA";
$db_name = "epiz_28586349_uts_alta";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("ERROR: Could not connect. " . $e->getMessage());
}

$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
?>