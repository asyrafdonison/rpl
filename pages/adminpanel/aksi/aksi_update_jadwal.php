<?php
include('../../../koneksi/koneksi.php');
$id = $_POST['id'];
$id_tujuan = $_POST['id_tujuan'];
$id_bus = $_POST['id_bus'];
$harga = $_POST['harga'];
$tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
$tanggal_sampai = $_POST['tanggal_sampai'];
$status = $_POST['status'];

$query = "update jadwal set id_tujuan=$id_tujuan,id_bus=$id_bus,tanggal_keberangkatan='$tanggal_keberangkatan',harga=$harga,tanggal_sampai='$tanggal_sampai',status='$status' where id=$id";

try {
    //code...
    mysqli_query($conn, $query);
    echo "<script>alert('Update Data Berhasil!!')</script>";
    echo "<script>document.location='../jadwal.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!!')</script>";
    echo "<script>document.location='../jadwal.php'</script>";
}
