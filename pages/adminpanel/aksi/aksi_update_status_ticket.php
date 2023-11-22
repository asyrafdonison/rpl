<?php
require('../../../koneksi/koneksi.php');
$id = $_POST['id'];
$status = $_POST['status'];

$query = "update ticket set status='$status' where id=$id";

try {
    //code...
    mysqli_query($conn, $query);
    echo "<script>alert('Update Data Berhasil!!')</script>";
    echo "<script>document.location='../ticket.php'</script>";
} catch (\Throwable $th) {
    //throw $th;
    echo "<script>alert('Internal Server Error!!')</script>";
    echo "<script>document.location='../ticket.php'</script>";
}
