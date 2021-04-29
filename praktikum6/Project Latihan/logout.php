<?php
setcookie("namauser", "", time()+(60*60*24*3600),"/");
//redirect ke halaman login
header("Location: form.html");

?>