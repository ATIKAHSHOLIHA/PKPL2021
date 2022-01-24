<?php
include "koneksi.php";
$sql="delete from admn where id_user= '$_GET[id]'";
mysqli_query($con, $sql);
mysqli_close($con);
header('location:admin_read.php');
?>