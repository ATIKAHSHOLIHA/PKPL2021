<?php
// include database connection file
include_once("koneksi.php");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{ 
 $nip = $_POST['nip'];
 $nama=$_POST['nama'];
 $jkel=$_POST['jkel'];
 $alamat=$_POST['alamat'];
 $email=$_POST['email']; 
 $nohp=$_POST['nohp']; 
 $jabatan=$_POST['jabatan'];
 // update user data
$result = mysqli_query($con, "UPDATE pegawai SET 
nama='$nama',jkel='$jkel',alamat='$alamat',email='$email',nohp='$nohp',jabatan='$jabatan' WHERE nip='$nip'");
 // Redirect to homepage to display updated user in list
header("Location: user_read.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$nip = $_GET['nip'];
// Fetech user data based on id
$result = mysqli_query($con, "SELECT * FROM pegawai WHERE nip='$nip'");
while($user_data = mysqli_fetch_array($result))
{
$nip = $user_data['nip'];
$nama = $user_data['nama'];
$jkel = $user_data['jkel'];
$alamat = $user_data['alamat'];
$email = $user_data['email'];
$nohp = $user_data['nohp'];
$jabatan = $user_data['jabatan'];
}
?>
<html>
<head> 
<title>Edit Data Pegawai</title>
</head>
<body>
 <a href="index.html">Home</a>
 <br/><br/>
<form name="update" method="post" action="user_edit.php">
<table border="0">
<tr> 
<td>Nama</td>
<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
</tr>
<tr> 
<td>Gender</td>
<td>
    <input type = "radio" name = "jkel" value = "L">Laki-Laki
    <input type = "radio" name = "jkel" value = "P">Perempuan
</td>
</tr>
<tr> 
<td>Alamat</td>
<td><textarea name="alamat" rows = "5" cols = "40" value=<?php echo $alamat;?>></textarea></td>
</tr>
<tr> 
<td>Email</td>
<td><input type="email" name="email" value=<?php echo $email;?>></td>
</tr>
<tr> 
<td>No HP</td>
<td><input type="text" name="nohp" value=<?php echo $nohp;?>></td>
</tr>
<tr> 
<td>Jabatan</td>
<td><input type="text" name="jabatan" value=<?php echo $jabatan;?>></td>
</tr>
<tr>
<td><input type="hidden" name="nip" value=<?php echo $_GET['nip'];?>></td>
<td><input type="submit" name="update" value="Update"></td>
</tr>
</table>
</form>
</body>
</html>