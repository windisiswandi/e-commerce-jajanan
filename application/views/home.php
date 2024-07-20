
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
                <h1 class="text-white text-6xl px-28 text-center font-open-sans">Kuliner Lombok dengan jajanan khas yang menggoda selera.</h1>
                <p class="text-slate-300 my-6 text-lg">Pesan online dan nikmati di mana saja!</p>
                <a href="#" class="px-5 py-3 rounded-full bg-teal-600 text-white">Belanja Sekarang</a>
            </div>
        </div>
        <button id="prev" class="md:hidden group-hover:inline-block absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-60 text-lg py-3 px-2 text-white"><i class="fa-solid fa-chevron-left"></i></button>
        <button id="next" class="md:hidden group-hover:inline-block absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-60 text-lg py-3 px-2 text-white"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <span data-index="0" class="dot w-2 h-2 rounded-full cursor-pointer border border-white dot-active"></span>
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
      <div class="py-8">
        <div data-aos="fade-up" data-aos-duration="1000">
            <p class="text-green-700 font-semibold italic text-center text-lg">Produk Kami</p>
            <h1 class="text-center font-bold text-5xl py-8">Jajanan Khas Lombok</h1>
            <p class="text-slate-400 text-center">Belanja Jajanan Khas Lombok</p>
        </div>
        <h2 class="text-2xl font-bold text-slate-600 bg-white px-4 py-2 border-b-2 border-blue-600 mt-3">Rekomendasi</h2>
        <div class="grid grid-cols-5 gap-2 mt-3">
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden shadow hover:shadow-lg bg-white">
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
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden shadow hover:shadow-lg bg-white">
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
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden shadow hover:shadow-lg bg-white">
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
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden shadow hover:shadow-lg bg-white">
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
            <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden shadow hover:shadow-lg bg-white">
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



