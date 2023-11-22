<?php
session_start();
require('../../../koneksi/koneksi.php');
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$id = $_SESSION['id'];

$query = "select * from users where id=$id";
$res = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($res);

if ($data >= 1 && $data['username'] != $username) {
    echo "<script>alert('Username Sudah Di Gunakan!!')</script>";
    echo "<script>document.location='../user.php'</script>";
}

try {
    //code...
    if ($password != $data['password']) {
        $password = md5($password);
    }
    $queryUpdate = "update users set nama='$nama',username='$username',password='$password' where id=$id";
    mysqli_query($conn, $queryUpdate);
    echo "<script>alert('User Profile Berhasil Di Update!!')</script>";
    echo "<script>document.location='../user.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!!')</script>";
    echo "<script>document.location='../user.php'</script>";
}
