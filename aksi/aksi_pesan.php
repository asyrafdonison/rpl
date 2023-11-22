<?php
require('../koneksi/koneksi.php');
session_start();
$nama_penumpang = $_POST['nama_penumpang'];
$id_jadwal = $_POST['id_jadwal'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$id_user = $_SESSION['id'];

try {
    //code...
    $query = "insert into ticket(id_user,id_jadwal,nama_penumpang,email,telepon) values ($id_user,$id_jadwal,'$nama_penumpang','$email','$telepon')";
    mysqli_query($conn, $query);
    echo "<script>alert('Pemesanan Ticket Berhasil!')</script>";
    echo "<script>document.location='../pages/adminpanel/index.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Pemesanan Ticket Gagal!')</script>";
    echo "<script>document.location='../index.php'</script>";
}
