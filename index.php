<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/tailwind.css">
    <title>Jogja Travel</title>
    <?php include('./material/fonts.php');
    include('./material/icons.php'); ?>
</head>

<body>
    <!-- Navbar Section -->
    <nav class="w-full min-w-screen h-14 bg-gradient-to-r from-[#00CEFB] via-[#44c4e0] to-[#024EC1]">
        <div class="container h-full mx-auto flex items-center justify-between px-2 lg:px-0 relative">
            <a href="#" class="font-inter text-3xl font-semibold text-white">JOGJA<span class="text-base font-medium font-keania">Travel</span></a>
            <ul class="hidden gap-6 font-inter text-white font-semibold md:flex">
                <li class="hover:text-[#00CEFB]"><a href="./index.php">Home</a></li>
                <li class="hover:text-[#00CEFB]"><a href="./pages/searchTicket.php">Pemesanan</a></li>
                <li class="hover:text-[#00CEFB]"><a href="#">Tiket</a></li>
                <li class="hover:text-[#00CEFB]"><a href="#">Pembayaran</a></li>
            </ul>
            <ul class="hidden gap-5 font-inter font-semibold text-white lg:flex">
                <?php
                if (empty($_SESSION['id']) && empty($_SESSION['username']) && empty($_SESSION['role'])) :
                ?>
                    <li class="hover:text-[#00CEFB]"><a href="./pages/login.php">Login</a></li>
                    <li class="hover:text-[#00CEFB]"><a href="./pages/register.php">Daftar</a></li>
                <?php else :
                ?>
                    <li class="hover:text-[#00CEFB]"><a href="./aksi/aksi_logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
            <div class="h-3/4 aspect-square flex justify-center items-center lg:hidden" onclick="saklarMenu()">
                <span class="material-symbols-outlined" style="font-size: 2.4rem;color: #FFFFFF;">
                    menu
                </span>
            </div>
            <div class="w-fit h-fit border-2 border-slate-900 bg-slate-200 absolute top-11 right-7 rounded-lg hidden flex-col lg:hidden" id="tombolMenu">
                <ul class="px-2 py-1 md:hidden">
                    <li class="hover:text-[#00CEFB]"><a href="#">Home</a></li>
                    <li class="hover:text-[#00CEFB]"><a href="#">Pemesanan</a></li>
                    <li class="hover:text-[#00CEFB]"><a href="#">Tiket</a></li>
                    <li class="hover:text-[#00CEFB]"><a href="#">Pembayaran</a></li>
                </ul>
                <hr class="border-1 border-slate-900">
                <ul class="px-2 py-1">
                    <?php
                    if (empty($_SESSION['id']) && empty($_SESSION['username']) && empty($_SESSION['role'])) :
                    ?>
                        <li class="hover:text-[#00CEFB]"><a href="./pages/login.php">Login</a></li>
                        <li class="hover:text-[#00CEFB]"><a href="./pages/register.php">Daftar</a></li>
                    <?php else :
                    ?>
                        <li class="hover:text-[#00CEFB]"><a href="./aksi/aksi_logout.php">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        const saklarMenu = () => {
            const doc = document.getElementById("tombolMenu");
            doc.classList.toggle("hidden");
            doc.classList.toggle("flex");
        };
    </script>
    <!-- End Navbar Section -->
    <!-- Hero Section (Banner Content) -->
    <section class="min-w-screen lg:aspect-video min-h-screen h-fit bg-center bg-cover mx-auto" style="background-image: url('./IMG/bus3.png');">
        <div class="container mx-auto flex justify-center items center flex-col min-h-screen h-fit px-3 lg:px-0 py-4 ">
            <div class="text-center md:text-left flex flex-col gap-2 md:w-3/4 lg:w-3/5">
                <h2 class="text-3xl md:text-4xl font-inter font-semibold text-white">Selamat Datang di <span class="text-[#00CEFB]">JOGJA TRAVEL</span></h2>
                <p class="text-base text-white font-inter font-semibold md:text-lg"><span class="text-[#00CEFB]">JOGJA TRAVEL</span> siap mengantar pelanggan dari Jogja ke seluruh wilayah Pulau Jawa! Kami adalah mitra perjalanan yang dapat diandalkan dan menyediakan layanan transportasi yang aman, nyaman, dan handal.</p>
                <p class="text-base text-white font-inter font-semibold md:text-lg">Kami dapat membantu anda untuk mencari tiket bus dengan cepat dan mudah hanya dengan sekali klik. Anda dapat membaca langkah langkah dibawah untuk mempermudah anda memesan tiket.</p>
                <div class="w-full md:inline-flex gap-5 items-center">
                    <p class="text-base text-white font-inter font-semibold my-4 md:w-fit md:text-lg">Pesan Tiket? Klik tombol <span class="hidden md:inline">disamping</span> <span class="md:hidden">dibawah</span></p>
                    <a href="./pages/searchTicket.php" class="px-12 py-2 rounded-md bg-gradient-to-r from-[#00C5F7] to-[#024EC1] font-semibold text-white text-center">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section (Banner Section) -->
    <!-- How To Order Section -->
    <section class="min-w-screen h-fit px-2 py-10">
        <div class="w-full h-fit text-center container mx-auto">
            <h2 class="text-xl md:text-3xl font-semibold font-inter text-[#00CEFB]">Langkah-Langkah Pemesanan Tiket Bus</h2>
            <p class="text-[#8b96a7] font-semibold text-base font-inter">Berikut langkah-langkah untuk memesan tiket bus JOGJA TRAVEL</p>
        </div>
        <div class="w-full h-fit flex justify-center container mx-auto my-2 flex-wrap gap-2">
            <div class="border-2 border-[#00CEFB] text-center rounded-xl text-[#8b96a7] py-8 px-2 w-3/4  md:w-2/5 aspect-square flex flex-col justify-center items-center max-w-[280px]">
                <h1 class="text-5xl font-poppins font-bold">1</h1>
                <p class="font-semibold font-poppins text-base ">Masuk kemenu pemesanan lalu isikan data seperti daerah tujuan dan tanggal keberangkatan.</p>
            </div>
            <div class="border-2 border-[#00CEFB] text-center rounded-xl text-[#8b96a7] py-8 px-2 w-3/4  md:w-2/5 aspect-square flex flex-col justify-center items-center max-w-[280px]">
                <h1 class="text-5xl font-poppins font-bold">2</h1>
                <p class="font-semibold font-poppins text-base ">Pilih jadwal keberangkatan yang sesuai dengan keinginan anda..</p>
            </div>
            <div class="border-2 border-[#00CEFB] text-center rounded-xl text-[#8b96a7] py-8 px-2 w-3/4  md:w-2/5 aspect-square flex flex-col justify-center items-center max-w-[280px]">
                <h1 class="text-5xl font-poppins font-bold">3</h1>
                <p class="font-semibold font-poppins text-base ">Memilih kursi bus yang tersedia. Pastikan memilih tempat duduk ternyaman anda.</p>
            </div>
            <div class="border-2 border-[#00CEFB] text-center rounded-xl text-[#8b96a7] py-8 px-2 w-3/4  md:w-2/5 aspect-square flex flex-col justify-center items-center max-w-[280px]">
                <h1 class="text-5xl font-poppins font-bold">4</h1>
                <p class="font-semibold font-poppins text-base ">Kemudian masukan identitas anda seperti nama lengkap dan nomor telepon, untuk keperluan pemesanan dan konfirmasi tiket.</p>
            </div>
            <div class="border-2 border-[#00CEFB] text-center rounded-xl text-[#8b96a7] py-8 px-2 w-3/4  md:w-2/5 aspect-square flex flex-col justify-center items-center max-w-[280px]">
                <h1 class="text-5xl font-poppins font-bold">5</h1>
                <p class="font-semibold font-poppins text-base ">Lakukan pembayaran sebagai tahap akhir pemesanan tiket. Anda dapat membayar melalui metode pembayaran yang tersedia, seperti kartu kredit, transfer bank, atau metode pembayaran elektronik lainnya</p>
            </div>
            <div class="border-2 border-[#00CEFB] text-center rounded-xl text-[#8b96a7] py-8 px-2 w-3/4  md:w-2/5 aspect-square flex flex-col justify-center items-center max-w-[280px]">
                <h1 class="text-5xl font-poppins font-bold">6</h1>
                <p class="font-semibold font-poppins text-base ">Setelah melakukan pembayaran anda akan menerima tiket online yang akan dikirim ke menu Tiket. Pastikan anda sudah mengeceknya sebelum keberangkatan. </p>
            </div>
        </div>
    </section>
    <!-- End How To Order Section -->
    <?php include('./components/footer.php'); ?>
</body>

</html>