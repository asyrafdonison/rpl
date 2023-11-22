<?php

require('../middleware/auth.php');
require('../koneksi/koneksi.php');
$id = $_GET['id'];

$query = "select b.nama_daerah,c.nama_bus,status from jadwal as a inner join tujuan as b on a.id_tujuan = b.id inner join bus as c ON a.id_bus = c.id where a.id = $id";
$res = mysqli_query($conn, $query);

if ($res->fetch_row()[2] === 'ditutup') {
    echo "<script>alert('Ticket Tidak Tersedia!')</script>";
    echo "<script>document.location='./searchTicket.php'</script>";
}

if (mysqli_num_rows($res) == 0) {
    echo "<script>alert('Ticket Tidak Di Temukan')</script>";
    echo "<script>document.location='./searchTicket.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOGJA TRAVEL | Detail Ticket</title>
    <link rel="stylesheet" href="../CSS/tailwind.css">
    <?php include('../material/fonts.php');
    include('../material/icons.php'); ?>
</head>

<body>
    <?php include('../components/navbar.php'); ?>
    <section class="min-w-screen lg:aspect-video min-h-screen h-fit bg-center bg-cover" style="background-image: url('../IMG/bus6.jpg');">
        <div class="container mx-auto flex flex-wrap py-4 gap-4 md:gap-0 md:h-screen md:items-center">
            <div class="w-full text-center px-2 md:w-1/2 md:text-left md:px-8">
                <h2 class="text-3xl font-inter font-bold my-2 text-white">HARAP ISI DATA DIRI PENUMPANG</h2>
                <p class="font-inter text-black font-semibold text-base md:text-lg">Isi datadiri penumpang pada form berikut untuk melanjutkan pemesanan ticket bus </span></p>
            </div>
            <div class="w-full px-2 py-4 flex md:w-1/2">
                <div class="w-4/5  rounded-md bg-white aspect-[9/12] sm:aspect-square md:aspect-square mx-auto flex flex-col items-center justify-center px-4 py-4">
                    <form action="../aksi/aksi_pesan.php" method="POST" class="w-3/4 flex-col flex gap-4">
                        <h2 class="text-2xl font-bold font-inter text-center">PESAN TICKET</h2>
                        <input type="text" hidden name="id_jadwal" value="<?php echo $id ?>">
                        <label for="nama_penumpang">
                            <p class="text-left font-inter font-semibold text-black my-2">Nama Penumpang</p>
                            <input type="text" id="nama_penumpang" name="nama_penumpang" class="w-full bg-transparent py-2 px-2 outline-none ring-2 ring-cyan-400 rounded-md" required>
                        </label>
                        <label for="email">
                            <p class="text-left font-inter font-semibold text-black my-2">Email Penumpang</p>
                            <input type="text" id="email" name="email" class="w-full bg-transparent py-2 px-2 outline-none ring-2 ring-cyan-400 rounded-md" required>
                        </label>
                        <label for="telepon">
                            <p class="text-left font-inter font-semibold text-black my-2">Nomer Telepon Penumpang</p>
                            <input type="text" id="telepon" name="telepon" class="w-full bg-transparent py-2 px-2 outline-none ring-2 ring-cyan-400 rounded-md" required>
                        </label>
                        <button class="block bg-gradient-to-r from-[#00CEFB] to-[#024EC1] text-center w-full py-2 rounded-md font-inter font-semibold text-white" type="submit">Pesan Ticket</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include('../components/footer.php'); ?>
</body>

</html>