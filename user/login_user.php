<?php
    include "koneksi.php";
        $nip = $_POST['nip'];
        $pass=$_POST['password'];
        $sql="SELECT * FROM pegawai WHERE nip='$nip' AND password='$pass'";
        $login=mysqli_query($con,$sql);
        $ketemu=mysqli_num_rows($login);
        $r= mysqli_fetch_array($login);
        if ($ketemu > 0){
            session_start();
            $_SESSION['iduser'] = $r['nip'];
            $_SESSION['passuser'] = $r['password'];
            echo"USER BERHASIL LOGIN<br>";
            echo "id user =",$_SESSION['iduser'],"<br>";
            echo "password=",$_SESSION['passuser'],"<br>";
            header('location:user_dashboard.html');
        }
        else{
            header('location:user_login.php');
        }
    mysqli_close($con);
?>