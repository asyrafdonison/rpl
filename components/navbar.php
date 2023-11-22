<nav class="w-full min-w-screen h-14 bg-gradient-to-r from-[#00CEFB] via-[#44c4e0] to-[#024EC1]">
    <div class="container h-full mx-auto flex items-center justify-between px-2 lg:px-0 relative">
        <a href="#" class="font-inter text-3xl font-semibold text-white">JOGJA<span class="text-base font-medium font-keania">Travel</span></a>
        <ul class="hidden gap-6 font-inter text-white font-semibold md:flex">
            <li class="hover:text-[#00CEFB]"><a href="../index.php">Home</a></li>
            <li class="hover:text-[#00CEFB]"><a href="./searchTicket.php">Pemesanan</a></li>
            <li class="hover:text-[#00CEFB]"><a href="#">Tiket</a></li>
            <li class="hover:text-[#00CEFB]"><a href="#">Pembayaran</a></li>
        </ul>
        <ul class="hidden gap-5 font-inter font-semibold text-white lg:flex">
            <?php
            session_start();
            if (empty($_SESSION['id']) && empty($_SESSION['username']) && empty($_SESSION['role'])) :
            ?>
                <li class="hover:text-[#00CEFB]"><a href="./login.php">Login</a></li>
                <li class="hover:text-[#00CEFB]"><a href="./register.php">Daftar</a></li>
            <?php else :
            ?>
                <li class="hover:text-[#00CEFB]"><a href="../aksi/aksi_logout.php">Logout</a></li>
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
                session_start();
                if (empty($_SESSION['id']) && empty($_SESSION['username']) && empty($_SESSION['role'])) :
                ?>
                    <li class="hover:text-[#00CEFB]"><a href="./login.php">Login</a></li>
                    <li class="hover:text-[#00CEFB]"><a href="./register.php">Daftar</a></li>
                <?php else :
                ?>
                    <li class="hover:text-[#00CEFB]"><a href="../aksi/aksi_logout.php">Logout</a></li>
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