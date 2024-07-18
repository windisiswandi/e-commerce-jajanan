<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Shopee</title>
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fontawesome6/css/all.min.css'); ?>" rel="stylesheet">
</head>
<body>
    <header class="bg-blue-600">
        <nav class="px-4 sm:px-8 py-3 xl:container">
            <div class="flex justify-between items-center text-white">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <span class="border-r-2 border-white border-opacity-30 px-2"><i class="fa-solid fa-phone"></i> 012343455</span>
                        <span class="px-2">
                            Ikuti kami
                            <a href="#" class="ml-2"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="mx-2"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        </span>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-white hover:opacity-50">Tentang Kami</a>
                    <a href="#" class="text-white hover:opacity-50">Kontak</a>
                    <a href="#" class="text-white flex items-center space-x-1">
                        <div class="bg-white text-black w-5 h-5 rounded-full flex justify-center items-center text-[12px]">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <p class="font-bold">tehwinner12</p>
                    </a>
                </div>
            </div>
            <div class="flex justify-between items-center text-white py-5">
                <a href="#" class="font-bold text-2xl hidden sm:block">
                    TOKO JAJANAN LOMBOK
                </a>
                <form action="" class="flex-1 sm:px-8 mr-3">
                    <div class="w-full flex bg-white rounded overflow-hidden">
                        <input type="text" placeholder="Cari Produk . . ." class="w-full p-2 focus:outline-none text-black">
                        <button class="text-blue-700 py-2 px-4 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
                <a href="#" class="text-white text-lg">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </nav>
    </header>

    <div class="xl:container px-4 sm:px-8 py-4">
        <div class="h-[400px] bg-blue-400 rounded-md">
            tes
        </div>
    </div>
</body>
</html>
