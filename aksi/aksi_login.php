<?php
require('../koneksi/koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    echo "<script>alert('Harap Lengkapi Data Dengan Benar!')</script>";
    echo "<script>document.location='../pages/login.php'</script>";
}

try {
    //code...
    $password = md5($password);
    $query = "select * from users where username='$username' and password='$password'";
    $res = mysqli_query($conn, $query);
    if (0 < $hasil = $res->fetch_assoc()) {
        session_start();
        $_SESSION['id'] = $hasil['id'];
        $_SESSION['role'] = $hasil['role'];
        $_SESSION['username'] = $hasil['username'];
        echo "<script>alert('Login Success')</script>";
        echo "<script>document.location='../pages/adminpanel/index.php'</script>";
    } else {
        echo "<script>alert('Username Atau Password Salah!')</script>";
        echo "<script>document.location='../pages/login.php'</script>";
    }
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!')</script>";
    echo "<script>document.location='../pages/login.php'</script>";
}
