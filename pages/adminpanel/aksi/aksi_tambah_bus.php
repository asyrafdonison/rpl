<?php
require('../../../koneksi/koneksi.php');
$nama_bus = $_POST['nama_bus'];
$jumlah_kursi = $_POST['jumlah_kursi'];
$harga_km = $_POST['harga_km'];
$id_tipe = $_POST['id_tipe'];
$id_kelas = $_POST['id_kelas'];


$query = "insert into bus(id_tipe,id_kelas,jumlah_kursi,harga_km,nama_bus) values ($id_tipe,$id_kelas,$jumlah_kursi,$harga_km,'$nama_bus')";

try {
    //code...
    mysqli_query($conn, $query);
    echo "<script>alert('Data Bus Berhasil Di Tambahkan!!')</script>";
    echo "<script>document.location='../bus.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!!')</script>";
    echo "<script>document.location='../bus.php'</script>";
}
