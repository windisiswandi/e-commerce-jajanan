<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- tailwindcss -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- fontawesome -->
    <link href="<?= base_url('assets/vendor/fontawesome6/css/all.min.css'); ?>" rel="stylesheet">
    <!-- aos -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/aos/aos.css'); ?>">
    <script src="<?= base_url('assets/vendor/aos/aos.js'); ?>"></script>
    <!-- slick -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/slick/slick.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/slick/slick-theme.css'); ?>">
</head>
<body>
    <header class="bg-blue-500">
        <nav class="px-4 sm:px-8 py-3 xl:container">
            <div class="justify-between items-center text-white hidden sm:flex">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <span class="border-r-2 border-white border-opacity-30 px-2"><i class="fa-solid fa-phone text-sm mr-2"></i> 012343455</span>
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
            <div class="flex sm:justify-between sm:items-center flex-col sm:flex-row text-white sm:py-5 space-y-2 sm:space-y-0">
                <a href="#" class="text-lg font-bold text-center sm:text-left sm:text-2xl sm:block">
                    TOKO JAJANAN LOMBOK
                </a>
                <div class="flex-1 flex items-center">
                    <form action="" class="w-full sm:px-8 mr-5 sm:mr-3">
                        <div class="bg-white flex rounded overflow-hidden">
                            <input type="text" placeholder="Cari Produk . . ." class="w-full px-3 sm:p-2 focus:outline-none text-black text-sm sm:text-base">
                            <button class="text-blue-700 py-2 px-4 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="flex items-center space-x-3 sm:space-x-0">
                        <a href="#" class="text-white text-lg">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <a href="#" class="text-white text-lg sm:hidden">
                            <div class="bg-white text-black w-6 h-6 rounded-full flex justify-center items-center text-[12px]">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>