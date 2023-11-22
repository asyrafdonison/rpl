<?php
require('../../../koneksi/koneksi.php');
$nama_daerah = $_POST['nama_daerah'];
$jarak_tujuan = $_POST['jarak_tujuan'];

$query = "insert into tujuan(nama_daerah,jarak_tujuan) values ('$nama_daerah','$jarak_tujuan')";

try {
    //code...
    mysqli_query($conn, $query);
    echo "<script>alert('Tujuan Berhasil Di Tambahkan!!')</script>";
    echo "<script>document.location='../tujuan.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert(Internal Server Error!!')</script>";
    echo "<script>document.location='../tujuan.php'</script>";
}
