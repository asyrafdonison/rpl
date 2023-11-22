<?php 
require('../../../koneksi/koneksi.php');
$id = $_GET['id'];
$query = "delete from jadwal where id=$id";

try {
    //code...
    mysqli_query($conn,$query);
    echo "<script>alert('Data Jadwal Berhasil Di Hapus!!')</script>";
    echo "<script>document.location='../jadwal.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!!')</script>";
    echo "<script>document.location='../jadwal.php'</script>";
}
