<?php

require('../middleware/guest.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/tailwind.css">
    <title>Register</title>
</head>

<style>
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .mobilemode {
            background-image: url('../IMG/bus2.jpg');
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .mobilemode {
            background-image: url('../IMG/bus2.jpg');
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .mobilemode {
            background-image: url('../IMG/bus2.jpg');
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .mobilemode {
            background-image: none;
        }
    }
</style>


<body>
    <div class="w-full min-h-screen h-fit flex">
        <div class="hidden lg:w-[60%] lg:flex h-screen bg-center bg-cover" style="background-image: url('../IMG/bus2.jpg');"></div>
        <div class="w-full lg:w-[40%] items-center justify-center flex h-screen  flex-col mx-auto px-2 mobilemode bg-center bg-cover">
            <div class="rounded-lg px-4 py-4 bg-white bg-opacity-50 backdrop-blur-sm lg:bg-opacity-0 lg:bg-transparent lg:backdrop-blur-none ">
                <h2 class=" text-4xl tracking-wide font-bold text-slate-900">Register</h2>
                <p class="font-semibold text-base my-3">Silahkan buat akun pertamamu!</p>
                <form action="../aksi/aksi_register.php" method="POST" class="my-4 flex flex-col gap-4">
                    <label for="nama">
                        <p class="font-light text-lg">Nama Lengkap</p>
                        <input type="text" id="nama" name="nama" class="py-2 px-3 w-full rounded-2xl outline-none ring-0 border-[1px] border-blue-500" minlength="3" required>
                    </label>
                    <label for="username">
                        <p class="font-light text-lg">Username</p>
                        <input type="text" id="username" name="username" class="py-2 px-3 w-full rounded-2xl outline-none ring-0 border-[1px] border-blue-500" minlength="3" required>
                    </label>
                    <label for="password">
                        <p class="font-light text-lg">Password</p>
                        <input type="password" id="password" name="password" class="py-2 px-3 w-full rounded-2xl outline-none ring-0 border-[1px] border-blue-500" minlength="3" required>
                    </label>
                    <label for="verifpassword">
                        <p class="font-light text-lg">Ulangi Password</p>
                        <input type="password" id="verifpassword" name="verifpassword" class="py-2 px-3 w-full rounded-2xl outline-none ring-0 border-[1px] border-blue-500" minlength="3" required>
                    </label>
                    <button class="bg-gradient-to-r from-cyan-300 to-blue-600 py-2 rounded-lg text-xl text-white font-semibold" type="submit">Buat Akun</button>
                </form>
                <p class="font-semibold tracking-wide text-base">Sudah Punya Akun? <a href="./login.php" class="font-normal text-cyan-500 hover:text-cyan-600 active:text-cyan-700">Login Sekarang!</a></p>
            </div>
        </div>
    </div>
</body>

</html>