<?php
include "koneksi.php";
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$pass = $_POST['password'];
$sql = "INSERT INTO admn(id_user,password, nama, email) VALUES ('$id_user', '$pass', '$nama','$email')";
$query=mysqli_query($con,$sql);
mysqli_close($con);
header('location:admin_read.php');
?>