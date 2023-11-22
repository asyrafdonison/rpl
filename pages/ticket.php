<?php
$tujuan = $_GET['tujuan'];
$tanggal = $_GET['tanggal'];

if (empty($tujuan) || empty($tanggal)) {
    header("Location: ./searchTicket.php");
}

require('../koneksi/koneksi.php');

$query = "select a.id,nama_bus,nama_kelas,harga,nama_daerah,DATE(tanggal_keberangkatan) as tanggal_keberangkatan,DATE(tanggal_sampai) as tanggal_sampai,DATE_FORMAT(tanggal_keberangkatan, '%H:%i') as waktu_keberangkatan,DATE_FORMAT(tanggal_sampai, '%H:%i') as waktu_sampai,status from jadwal as a inner join tujuan as b on a.id_tujuan = b.id inner join bus as c on a.id_bus = c.id inner join kelas as d on c.id_kelas = d.id WHERE nama_daerah = '$tujuan' and DATE(tanggal_keberangkatan) = '$tanggal'";

$res = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOGJA TRAVEL | Ticket</title>
    <link rel="stylesheet" href="../CSS/tailwind.css">
    <?php include('../material/fonts.php');
    include('../material/icons.php'); ?>
</head>

<body>
    <?php include('../components/navbar.php'); ?>
    <!-- Banner Section -->
    <section class="min-w-screen lg:aspect-video min-h-screen h-fit bg-center bg-cover" style="background-image: url('../IMG/bus5.png');">
        <div class="container mx-auto py-4 px-2 md:px-2 flex flex-col gap-4 lg:px-14">
            <h2 class="text-center text-3xl font-semibold text-slate-900 font-inter">Ticket Bus</h2>
            <h4 class="font-semibold text-lg md:text-xl font-inter text-center md:text-left lg:w-3/4 lg:mx-auto">Yogyakarta &#8594; <?php echo $tujuan; ?></h4>
            <p class="font-semibold text-lg  md:text-xl font-inter text-center md:text-left lg:w-3/4 lg:mx-auto"><?php echo $tanggal; ?></p>
            <?php
            if (0 >= $res->fetch_assoc()) {
            ?>
                <!-- Ticket Section -->
                <div class="w-full lg:w-4/5 rounded-lg aspect-video bg-white h-fit sm:max-h-12 md:max-h-44 py-4 px-3 md:px-6 mx-auto flex justify-center items-center">
                    <h2 class="text-center text-3xl font-bold font-inter">Ticket Pada Jadwal Ini Tidak Tersedia!!</h2>
                </div>
                <!-- Ticket Section End -->
                <?php
            } else {
                foreach ($res as $d) {
                ?>
                    <!-- Ticket Section -->
                    <div class="w-full lg:w-4/5 rounded-lg aspect-video bg-white h-fit sm:max-h-12 md:max-h-44 py-4 px-3 md:px-6 mx-auto">
                        <div class="flex w-full justify-between">
                            <h2 class="text-xl md:text-2xl lg:text-3xl text-black font-inter font-semibold"><?php echo $d['nama_bus'] ?></h2>
                            <h3 class="font-semibold font-inter"><span class="text-[#FF0505] text-xl md:text-2xl lg:text-3xl">Rp <?php echo number_format($d['harga'], 0, ",", "."); ?></span> / <span class="font-md">Kursi</span></h3>
                        </div>
                        <h4 class="text-base font-inter capitalize font-light"><?php echo $d['nama_kelas'] ?> Class</h4>
                        <div class="min-w-full flex justify-between h-fit flex-wrap gap-4 md:gap-0">
                            <div class="w-full md:w-1/2">
                                <div class="flex items-center gap-2"><span class="material-symbols-outlined">
                                        radio_button_unchecked
                                    </span><?php echo $d['waktu_keberangkatan'] ?> (<?php echo $d['tanggal_keberangkatan'] ?>)<span class="text-sm font-inter text-slate-400">Yogyakarta</span></div>
                                <span class="material-symbols-outlined my-2">
                                    south
                                </span>
                                <div class="flex items-center gap-2"><span class="material-symbols-outlined">
                                        radio_button_checked
                                    </span><?php echo $d['waktu_sampai'] ?> (<?php echo $d['tanggal_sampai'] ?>)<span class="text-sm font-inter text-slate-400"><?php echo $d['nama_daerah'] ?></span></div>
                            </div>
                            <?php
                            if ($d['status'] === "ditutup") : ?>
                                <div class="w-full md:w-1/2 flex justify-center md:block relative">
                                    <a class="md:w-fit text-sm text-white font-semibold font-inter px-4 py-2 rounded-md bg-red-500 md:absolute md:bottom-0 md:right-0">Ticket Di Tutup</a>
                                </div>
                            <?php
                            else : ?>
                                <div class="w-full md:w-1/2 flex justify-center md:block relative">
                                    <a href="./pesanTicket.php?id=<?php echo $d['id'] ?>" class="md:w-fit text-sm text-white font-semibold font-inter px-4 py-2 rounded-md bg-gradient-to-r from-[#00CEFB] to-[#024EC1] md:absolute md:bottom-0 md:right-0">Lihat Selengkapnya</a>
                                </div>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                    <!-- Ticket Section End -->
            <?php }
            } ?>

        </div>
    </section>
    <!-- End Banner Section -->
    <?php include('../components/footer.php'); ?>
</body>

</html>