<?php
require('../../../koneksi/koneksi.php');
$id = $_POST['id'];
$nama_bus = $_POST['nama_bus'];
$jumlah_kursi = $_POST['jumlah_kursi'];
$harga_km = $_POST['harga_km'];
$id_tipe = $_POST['id_tipe'];
$id_kelas = $_POST['id_kelas'];


$query = "update bus set nama_bus='$nama_bus',jumlah_kursi=$jumlah_kursi,harga_km=$harga_km,id_tipe=$id_tipe,id_kelas=$id_kelas where id=$id";

try {
    //code...
    mysqli_query($conn, $query);
    echo "<script>alert('Data Bus Berhasil Di Update!!')</script>";
    echo "<script>document.location='../bus.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!!')</script>";
    echo "<script>document.location='../bus.php'</script>";
}
