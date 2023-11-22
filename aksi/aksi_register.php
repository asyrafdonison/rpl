<?php
require('../koneksi/koneksi.php');
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$verifpassword = $_POST['verifpassword'];
$compare = mysqli_query($conn, "select * from users where username='$username'");

if (empty($nama) or empty($username) or empty($password) or empty($verifpassword)) {
    echo "<script>alert('Harap Lengkapi Data Dengan Benar!')</script>";
    echo "<script>document.location='../pages/register.php'</script>";
}

if (0 < $compare->fetch_assoc()) {
    echo "<script>alert('Username Sudah Di Gunakan!')</script>";
    echo "<script>document.location='../pages/register.php'</script>";
}

if ($password !== $verifpassword) {
    echo "<script>alert('Password tidak cocok!')</script>";
    echo "<script>document.location='../pages/register.php'</script>";
}

try {
    //code...
    $password = md5($password);
    $query = "insert into users(nama,username,password) values ('$nama','$username','$password')";
    $res = mysqli_query($conn, $query);
    echo "<script>alert('Daftar Akun Success!')</script>";
    echo "<script>document.location='../pages/login.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!')</script>";
    echo "<script>document.location='../pages/register.php'</script>";
}
