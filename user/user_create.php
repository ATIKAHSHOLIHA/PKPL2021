<html>
<head>
<style>
		.error {
			font-size: 15px;
			color: red;
		}
	</style>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>User-Sign-Up </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
</head>
<body class="h-100">
<?php
	$nipErr = $namaErr = $jkelErr = $alamatErr = $emailErr = $jabatanErr = $passErr = "";
	$nip = $nama = $jkel = $alamat = $email = $nohp = $jabatan = $pass = "";

    $flag = true;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["nip"])) {
			$nipErr = "Nomor Induk Pegawai harus diisi";
			$flag = false;
		} else {
			$nip = test_input($_POST["nip"]);
		}

        if (empty($_POST["nama"])) {
			$namaErr = "Nama harus diisi";
			$flag = false;
		} else {
			$nama = test_input($_POST["nama"]);
		}

		if (empty($_POST["jkel"])) {
            $jkelErr = "Jenis Kelamin harus dipilih";
        } else {
            $jkel = test_input($_POST["jkel"]);
        } 

		if (empty($_POST["alamat"])) {
			$alamatErr = "Alamat harus diisi";
			$flag = false;
		} else {
			$alamat = test_input($_POST["alamat"]);
		}

		if (empty($_POST["email"])) {
            $email = "";
			$flag = false;
            }else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Email tidak sesuai format"; 
                }
            }

        if (empty($_POST["nohp"])) {
			$nohpErr = "";
			$flag = false;
		} else {
			$nohp = test_input($_POST["nohp"]);
		}
		
		if (empty($_POST["jabatan"])) {
			$jabatanErr = "Jabatan harus diisi";
			$flag = false;
		} else {
			$jabatan = test_input($_POST["jabatan"]);
		}

		if (empty($_POST["password"])) {
			$passErr = "Password harus diisi";
			$flag = false;
		} else {
			$pass = test_input($_POST["password"]);
		}
		

    if ($flag) {

		$conn = new mysqli("localhost","root","","simpeg");

		if ($conn->connect_error) {
			die("connection failed error: " . $conn->connect_error);
		}
	
		$sql = "INSERT INTO pegawai (nip, nama, jkel, alamat, email, nohp, jabatan, password) 
		VALUES('$nip','$nama','$jkel','$alamat','$email','$nohp','$jabatan','$pass') ";
		// execute sql insert
		if ($conn->query($sql) === TRUE) {
			echo "<script> alert('Data Tersimpan');</script>";
			}
		}
    }

    function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
    ?>

 <a href="user_read.php">Go to Home</a>
 <br/><br/>

 <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>

 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form1">
 <table width="50%" border="0">
 <tr> 
 	<td>Nomor Induk Pegawai</td>
 	<td><input type="text" name="nip">
    <span class = "error">* <?php echo $nipErr;?></span></td>
 </tr>
 <tr> 
 	<td>Nama Lengkap</td>
 	<td><input type="text" name="nama">
    <span class = "error">* <?php echo $namaErr;?></span></td>
 </tr>
 <tr>
	<td>Gender:</td>
	<td>
    <input type = "radio" name = "jkel" value = "L">Laki-Laki
    <input type = "radio" name = "jkel" value = "P">Perempuan
    <span class = "error">* <?php echo $jkelErr;?></span>
    </td>
</tr>
 <tr> 
 	<td>Alamat</td>
 	<td><textarea name="alamat" rows = "5" cols = "40"></textarea>
    <span class = "error">* <?php echo $alamatErr;?></span></td>
 </tr>
 <tr>
	<td>E-mail : </td>
	<td><input type="email" name="email">
	<span class="error">* <?= $emailErr; ?></span>
	</td>
</tr>
<tr>
	<td>Nomor HP : </td>
	<td><input type="text" name="nohp">
	</td>
</tr>
<tr>
	<td>Jabatan : </td>
	<td><input type="text" name="jabatan">
	<span class="error">* <?= $jabatanErr; ?></span>
	</td>
</tr>
<tr>
	<td>Password : </td>
	<td><input type="password" name="password">
	<span class="error">* <?= $passErr; ?></span>
	</td>
</tr>
 <tr> 
 <td></td>
 <td><input class="button btn btn-primary" type="submit" name="button"> </td>
 </tr>
 </table>
 </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
 // Check If form submitted, insert form data into users table.
 if(isset($_POST['Submit'])) {
 $nip = $_POST['nip'];
 $nama = $_POST['nama'];
 $jkel = $_POST['jkel'];
 $alamat = $_POST['alamat'];
 $email = $_POST['email'];
 $nohp = $_POST['nohp'];
 $jabatan = $_POST['jabatan'];
 $pass = $_POST['password'];

 // include database connection file
 include_once("koneksi.php");
 // Insert user data into table
 $result = mysqli_query($con, "INSERT INTO pegawai (nip, nama, jkel, alamat, email, nohp, jabatan,password) 
 VALUES('$nip','$nama','$jkel','$alamat','$email','$nohp','$jabatan','$pass')");
 // Show message when user added
 echo "Data berhasil disimpan.";
 header('location:user_read.php');
 }
 ?>
 </body>
 </html>