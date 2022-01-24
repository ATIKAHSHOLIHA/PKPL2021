<?php
    include "koneksi.php";
        $id_user = $_POST['id_user'];
        $pass=$_POST['password'];
        $sql="SELECT * FROM admn WHERE id_user='$id_user' AND password='$pass'";
        $login=mysqli_query($con,$sql);
        $ketemu=mysqli_num_rows($login);
        $r= mysqli_fetch_array($login);
        if ($ketemu > 0){
            session_start();
            $_SESSION['iduser'] = $r['id_user'];
            $_SESSION['passuser'] = $r['password'];
            echo"USER BERHASIL LOGIN<br>";
            echo "id user =",$_SESSION['iduser'],"<br>";
            echo "password=",$_SESSION['passuser'],"<br>";
            header('location:admin_dashboard.php');
        }
        else{
            header('location:admin_login.php');
        }
    mysqli_close($con);
?>