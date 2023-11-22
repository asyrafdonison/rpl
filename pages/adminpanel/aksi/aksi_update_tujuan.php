<?php
require('../../../koneksi/koneksi.php');
$id = $_POST['id'];
$nama_daerah = $_POST['nama_daerah'];
$jarak_tujuan = $_POST['jarak_tujuan'];

$query = "update tujuan set nama_daerah='$nama_daerah',jarak_tujuan=$jarak_tujuan where id=$id";

try {
    //code...
    mysqli_query($conn, $query);
    echo "<script>alert('Update Data Berhasil!!')</script>";
    echo "<script>document.location='../tujuan.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!!')</script>";
    echo "<script>document.location='../tujuan.php'</script>";
}
