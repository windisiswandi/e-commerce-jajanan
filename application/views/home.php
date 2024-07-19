
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

<div class="xl:container px-4 sm:px-8 py-4">
    <!-- Hero section -->
    <div class="h-[200px] sm:h-[500px] rounded-md relative overflow-hidden group">
        <div id="slider" class="flex w-[200%] h-full transition-all">
            <div class="slide w-full h-full bg-hero2 bg-cover flex justify-center items-center flex-col">
                <h1 class="text-white text-6xl px-28 text-center font-open-sans">Kami Menjual Segala Jenis Jajanan Khas Lombok</h1>
                <p class="text-slate-300 my-6 text-lg">Rasakan Cita Rasa Lombok</p>
                <a href="#" class="px-5 py-3 rounded-full bg-teal-600 text-white">Belanja Sekarang</a>
            </div>
            <div class="slide w-full h-full bg-hero1 bg-cover flex justify-center items-center flex-col">
                <h1 class="text-white text-6xl px-28 text-center font-open-sans ">Kuliner Lombok dengan jajanan khas yang menggoda selera.</h1>
                <p class="text-slate-300 my-6 text-lg">Pesan online dan nikmati di mana saja!</p>
                <a href="#" class="px-5 py-3 rounded-full bg-teal-600 text-white">Belanja Sekarang</a>
            </div>
        </div>
        <button id="prev" class="md:hidden group-hover:inline-block absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-60 text-lg py-3 px-2 text-white"><i class="fa-solid fa-chevron-left"></i></button>
        <button id="next" class="md:hidden group-hover:inline-block absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-60 text-lg py-3 px-2 text-white"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <span data-index="0" class="dot w-2 h-2 rounded-full cursor-pointer border border-white"></span>
            <span data-index="1" class="dot w-2 h-2 rounded-full cursor-pointer border border-white"></span>
        </div>
    </div>

    <!-- Key feature -->
     <div class="flex justify-center space-x-3 py-16">
        <div class="text-center p-5 flex flex-col items-center" data-aos="fade-up" data-aos-duration="250">
            <div class="w-20 h-20 rounded-full flex items-center bg-orange-400 justify-center text-white text-3xl"><i class="fa-solid fa-truck"></i></div>
            <h2 class="font-semibold text-slate-600 mt-3 text-xl">Gratis Ongkir</h2>
            <p class="text-sm text-slate-400">Minimal Belanja Rp20.000</p>
        </div>
        <div class="text-center p-5 flex flex-col items-center" data-aos="fade-up" data-aos-duration="750">
            <div class="w-20 h-20 rounded-full flex items-center bg-blue-400 justify-center text-white text-3xl"><i class="fa-solid fa-award"></i></div>
            <h2 class="font-semibold text-slate-600 mt-3 text-xl">Kualitas Terbaik</h2>
            <p class="text-sm text-slate-400">Dibuat Dengan Bahan Berkualitas Tinggi</p>
        </div>
        <div class="text-center p-5 flex flex-col items-center" data-aos="fade-up" data-aos-duration="1000">
            <div class="w-20 h-20 rounded-full flex items-center bg-pink-400 justify-center text-white text-3xl"><i class="fa-solid fa-headset"></i></div>
            <h2 class="font-semibold text-slate-600 mt-3 text-xl">Bantuan 24 jam</h2>
            <p class="text-sm text-slate-400">Selalu online 24 jam</p>
        </div>
     </div>
     <!-- Product -->
      <div class="py-10">
        <div data-aos="fade-up" data-aos-duration="1000">
            <p class="text-green-700 font-semibold italic text-center text-lg">Produk Kami</p>
            <h1 class="text-center font-bold text-5xl py-8">Jajanan Khas Lombok</h1>
            <p class="text-slate-400 text-center">Belanja Jajanan Khas Lombok</p>
        </div>
        <h2 class="text-2xl font-bold text-slate-600 py-6">Rekomendasi</h2>
        <div class="grid grid-cols-5 gap-2">
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden">
                <a href="#">
                    <img class="w-full" src="<?= base_url('assets/img/products/clorot.jpeg'); ?>" alt="" srcset="">
                    <div class="p-3">
                        <h2 class="font-semibold text-lg">Kue Clorot</h2>
                        <h3 class="text-red-600">Rp13.000</h3>
                        <div class="flex justify-between mt-3 items-center text-sm">
                            <p>100 Terjual</p>
                            <a href="#" class="text-white rounded-full bg-blue-700 px-3 py-2">Add to Cart</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden">
                <a href="#">
                    <img class="w-full" src="<?= base_url('assets/img/products/kacang-telor.jpeg'); ?>" alt="" srcset="">
                    <div class="p-3">
                        <h2 class="font-semibold text-lg">Kue Kacang Telor</h2>
                        <h3 class="text-red-600">Rp15.000</h3>
                        <div class="flex justify-between mt-3 items-center text-sm">
                            <p>10 Terjual</p>
                            <a href="#" class="text-white rounded-full bg-blue-700 px-3 py-2">Add to Cart</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden">
                <a href="#">
                    <img class="w-full" src="<?= base_url('assets/img/products/lumpia.jpe'); ?>" alt="" srcset="">
                    <div class="p-3">
                        <h2 class="font-semibold text-lg">Kue Lumpia</h2>
                        <h3 class="text-red-600">Rp25.000</h3>
                        <div class="flex justify-between mt-3 items-center text-sm">
                            <p>200 Terjual</p>
                            <a href="#" class="text-white rounded-full bg-blue-700 px-3 py-2">Add to Cart</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden">
                <a href="#">
                    <img class="w-full" src="<?= base_url('assets/img/products/nastar.webp'); ?>" alt="" srcset="">
                    <div class="p-3">
                        <h2 class="font-semibold text-lg">Kue Nastar</h2>
                        <h3 class="text-red-600">Rp30.000</h3>
                        <div class="flex justify-between mt-3 items-center text-sm">
                            <p>300 Terjual</p>
                            <a href="#" class="text-white rounded-full bg-blue-700 px-3 py-2">Add to Cart</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden">
                <a href="#">
                    <img class="w-full" src="<?= base_url('assets/img/products/peyek.jpeg'); ?>" alt="" srcset="">
                    <div class="p-3">
                        <h2 class="font-semibold text-lg">Kue Peyek</h2>
                        <h3 class="text-red-600">Rp10.000</h3>
                        <div class="flex justify-between mt-3 items-center text-sm">
                            <p>30 Terjual</p>
                            <a href="#" class="text-white rounded-full bg-blue-700 px-3 py-2">Add to Cart</a>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
      </div>
</div>



