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
    <section class="min-w-screen lg:aspect-video min-h-screen h-fit bg-center bg-cover" style="background-image: url('../IMG/bus4.jpg');">
        <div class="container mx-auto flex flex-wrap py-4 gap-4 md:gap-0 md:h-screen md:items-center">
            <div class="w-full text-center px-2 md:w-1/2 md:text-left md:px-8">
                <h2 class="text-2xl md:text-3xl text-white font-inter font-bold my-2">Identitas Penumpang</h2>
                <p class="font-inter text-white font-semibold text-base md:text-xl">Silahkan masukan identitas anda sesuai persyaratan disamping.</span></p>
            </div>
            <div class="w-full px-2 py-4 flex md:w-1/2">
                <div class="w-4/5  rounded-md bg-white aspect-[9/12] sm:aspect-square md:aspect-square mx-auto flex flex-col items-center justify-center px-4 py-4">
                    <form action="./ticket.php" method="POST" class="w-3/4 flex-col flex gap-4">
                        <label for="nama">
                            <p class="text-left font-inter font-semibold text-black my-2">Nama Penumpang</p>
                            <input type="text" id="nama" name="nama" class="w-full bg-transparent py-2 px-2 outline-none ring-2 ring-cyan-400 rounded-md" required>
                        </label>
                        <label for="telepon">
                            <p class="text-left font-inter font-semibold text-black my-2">Nomer Telepon</p>
                            <input type="text" id="telepon" name="telepon" class="w-full bg-transparent py-2 px-2 outline-none ring-2 ring-cyan-400 rounded-md" required>
                        </label>
                        <label for="email">
                            <p class="text-left font-inter font-semibold text-black my-2">Email</p>
                            <input type="text" id="email" name="email" class="w-full bg-transparent py-2 px-2 outline-none ring-2 ring-cyan-400 rounded-md" required>
                        </label>
                        <button class="block bg-gradient-to-r from-[#00CEFB] to-[#024EC1] text-center w-full py-2 rounded-md font-inter font-semibold text-white" type="submit">Selesai</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include('../components/footer.php'); ?>
</body>

</html>