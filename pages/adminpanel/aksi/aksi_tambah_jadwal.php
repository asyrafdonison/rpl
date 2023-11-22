<?php
require('../../../koneksi/koneksi.php');
$id_tujuan = $_POST['id_tujuan'];
$id_bus = $_POST['id_bus'];
$harga = $_POST['harga'];
$tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
$tanggal_sampai = $_POST['tanggal_sampai'];
$status = $_POST['status'];

$query = "insert into jadwal(id_tujuan,id_bus,harga,tanggal_keberangkatan,tanggal_sampai,status) values ($id_tujuan,$id_bus,$harga,'$tanggal_keberangkatan','$tanggal_sampai','$status')";

try {
    //code...
    mysqli_query($conn, $query);
    echo "<script>alert('Jadwal Berhasil Di Tambahkan!!')</script>";
    echo "<script>document.location='../jadwal.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert(Internal Server Error!!')</script>";
    echo "<script>document.location='../jadwal.php'</script>";
}
