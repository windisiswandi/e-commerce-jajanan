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
    <link rel="stylesheet" href="<?= base_url('assets/vendor/slick/slick.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/iziToast/css/iziToast.min.css'); ?>">
</head>
<body class="bg-slate-100">
    <header class="bg-blue-500 sticky top-0 z-8">
        <nav class="px-4 sm:px-8 py-3 xl:container">
            <div class="justify-between items-center text-white hidden sm:flex">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <span class="border-r-2 border-white border-opacity-30 px-2"><i class="fa-solid fa-phone text-sm mr-2"></i> <?= $data_pengaturan->nomor_telp; ?></span>
                        <span class="px-2">
                            Ikuti kami
                            <a href="<?= $data_pengaturan->facebook ?>" class="ml-2"><i class="fa-brands fa-facebook"></i></a>
                            <a href="<?= $data_pengaturan->instagram ?>" class="mx-2"><i class="fa-brands fa-instagram"></i></a>
                            <a href="<?= $data_pengaturan->twitter ?>"><i class="fa-brands fa-twitter"></i></a>
                        </span>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="#kontak" class="text-white hover:opacity-50 px-2">Kontak</a>
                    <?php if($this->session->userdata('username')): ?>
                        <!-- <div class="relative"> -->
                            <?php if($this->session->userdata('role') == 'user'): ?>
                            <div class="text-white cursor-pointer flex items-center space-x-1 ml-3 group relative">
                                <?php if(@$user->foto) : ?>
                                    <img src="<?= base_url('assets/img/users/'.$user->foto) ?>" class="w-6 h-6 rounded-full">
                                <?php else: ?>
                                    <div class="bg-white text-black w-5 h-5 rounded-full flex justify-center items-center text-[12px]">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                <?php endif; ?>
                                <p class="font-bold"><?= $this->session->userdata('username'); ?></p>
                                <div class="bg-white p-4 rounded absolute top-7 right-0 w-36 text-black shadow-xl invisible  group-hover:visible z-20">
                                    <a href="<?= base_url('user/profile') ?>" class="hover:text-blue-500 block">Akun Saya</a>
                                    <a href="<?= base_url('user/orders') ?>" class="hover:text-blue-500 block">Pesanan Saya</a>
                                    <a href="<?= base_url('auth/logout') ?>" class="hover:text-blue-500 block">Logout</a>
                                    <div class="w-4 h-4 rotate-45 bg-white absolute -top-1 right-10"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                        <!-- </div> -->
                    <?php else: ?>
                        <a href="<?= base_url('auth/user_register') ?>" class="text-white hover:opacity-50 border-r-2 border-white border-opacity-20 px-2 font-bold">Daftar</a>
                        <a href="<?= base_url('auth/user_login') ?>" class="text-white hover:opacity-50 px-2 font-bold">Login</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex sm:justify-between sm:items-center flex-col sm:flex-row text-white sm:py-5 space-y-2 sm:space-y-0">
                <a href="<?= base_url('/'); ?>" class="text-lg font-bold text-center sm:text-left sm:text-2xl sm:block">
                    <i class="fa-solid fa-bag-shopping text-white text-2xl"></i> TOKO JAJANAN LOMBOK
                </a>
                <div class="flex-1 flex items-center">
                    <form action="<?= base_url('product'); ?>" class="w-full sm:px-8 mr-5 sm:mr-3">
                        <div class="bg-white flex rounded overflow-hidden">
                            <input type="text" placeholder="Cari Produk . . ." name="search" class="w-full px-3 sm:p-2 focus:outline-none text-black text-sm sm:text-base">
                            <button class="text-blue-700 py-2 px-4 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="flex items-center space-x-3 sm:space-x-0">
                        <div class="relative">
                            <a href="<?= base_url('cart') ?>" class="text-white text-xl">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                            <?php if($this->session->userdata('username')) : ?>
                                <div id="alertCart" class="flex justify-center items-center bg-red-500 w-[19px] h-[19px] rounded-full z-10 text-white text-[10px] p-1 absolute -top-2 -right-2"><?= count($carts); ?></div>
                            <?php endif; ?>
                        </div>
                        <div id="userMenu" class="bg-white text-lg sm:hidden text-black w-6 h-6 rounded-full flex justify-center items-center relative">
                            <?php if($this->session->userdata('username')) : ?>
                                <i class="fa-solid fa-user text-[12px]"></i>
                                <div class="bg-white p-4 rounded absolute top-7 right-0 w-36 text-black shadow-lg text-[12px] invisible">
                                    <a href="<?= base_url('user/profile') ?>" class="hover:text-blue-500 block">Akun Saya</a>
                                    <a href="<?= base_url('user/orders') ?>" class="hover:text-blue-500 block">Pesanan Saya</a>
                                    <a href="<?= base_url('auth/logout') ?>" class="hover:text-blue-500 block">Logout</a>
                                </div>
                            <?php else : ?>
                                <i class="fa-solid fa-bars text-[12px]"></i>
                                <div class="bg-white p-4 rounded absolute top-7 right-0 w-32 text-black shadow-lg text-[12px] invisible">
                                    <a href="<?= base_url('auth/user_register') ?>" class="hover:text-blue-500 block">Daftar</a>
                                    <a href="<?= base_url('auth/user_login') ?>" class="hover:text-blue-500 block">Login</a>
                                </div>                            
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>