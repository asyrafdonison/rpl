<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogja Travel | Cari Ticket</title>
    <link rel="stylesheet" href="../CSS/tailwind.css">
    <?php include('../material/fonts.php');
    include('../material/icons.php'); ?>
</head>

<?php

require('../koneksi/koneksi.php');

?>

<body>
    <!-- Navbar -->
    <?php include('../components/navbar.php'); ?>
    <!-- End Navbar -->
    <!-- Main Section -->
    <section class="min-w-screen lg:aspect-video min-h-screen h-fit bg-center bg-cover" style="background-image: url('../IMG/bus4.jpg');">
        <div class="container mx-auto flex flex-wrap py-4 gap-4 md:gap-0 md:h-screen md:items-center">
            <div class="w-full text-center px-2 md:w-1/2 md:text-left md:px-8">
                <h2 class="text-2xl text-white font-inter font-bold my-2">MENCARI KEBERANGKATAN DAN TUJUAN ANDA</h2>
                <p class="font-inter text-white font-semibold text-base md:text-lg">Isi form disamping untuk mencari keberangkatan dan tujuan anda.<span class="block">Pastikan form terisi dan sesuai dengan keinginan anda</span></p>
            </div>
            <div class="w-full px-2 py-4 flex md:w-1/2">
                <div class="w-4/5  rounded-md bg-white aspect-[9/12] sm:aspect-square md:aspect-square mx-auto flex flex-col items-center justify-center px-4 py-4">
                    <form action="./ticket.php" method="GET" class="w-3/4 flex-col flex gap-4">
                        <label for="tujuan">
                            <p class="text-left font-inter font-semibold text-black my-2">Kota Tujuan</p>
                            <select name="tujuan" id="tujuan" class="font-semibold w-full bg-transparent py-2 px-2 outline-none ring-2 ring-cyan-400 rounded-md" required>
                                <option value="" selected disabled>Pilih Tujuan</option>
                                <?php
                                $query = "select * from tujuan";
                                $res = mysqli_query($conn, $query);
                                while ($d = $res->fetch_assoc()) : ?>
                                    <option value="<?php echo $d['nama_daerah'] ?>"><?php echo $d['nama_daerah'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </label>
                        <label for="tanggal">
                            <p class="text-left font-inter font-semibold text-black my-2">Tanggal Keberangkatan</p>
                            <input type="date" id="tanggal" name="tanggal" class="w-full bg-transparent py-2 px-2 outline-none ring-2 ring-cyan-400 rounded-md" required>
                        </label>
                        <button class="block bg-gradient-to-r from-[#00CEFB] to-[#024EC1] text-center w-full py-2 rounded-md font-inter font-semibold text-white" type="submit">Cari Tiket</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Section End -->
    <!-- Footer -->
    <?php include('../components/footer.php'); ?>
    <!-- End Footer -->
    <?php

    // if (isset($_POST['tombol'])) {
    //     $tujuan = $_POST['tujuan'];
    //     $tanggal = $_POST['tanggal'];
    //     echo "<script>alert('$tujuan Dan $tanggal')</script>";
    //     header("Location: ./ticket.php?tujuan=$tujuan&tanggal=$tanggal");
    // }
    ?>
</body>

</html>