
<div class="xl:container">
<?php if(isset($_GET['search'])) : ?>
    <div class="py-4 sm:py-8 px-2 sm:px-8">
        <p class="font-semibold text-center text-lg py-5"><i class="fa-solid fa-magnifying-glass"></i> Hasil pencarian untuk "<span class="text-blue-500"><?= $_GET['search']; ?></span>"</p>
        <h2 class="text-lg lg:text-2xl font-bold text-slate-600 bg-white px-4 py-2 border-b-2 border-blue-600 mt-3">Produk Terkait</h2>
        <?php if(count($products)) : ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2 mt-3">
            <?php foreach($products as $product) : ?>
                <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden shadow hover:shadow-lg bg-white">
                    <?php if($product->foto) : ?>
                        <img class="w-full max-h-[320px]" src="<?= base_url('assets/img/products/'.$product->foto); ?>" alt="" srcset="">
                    <?php else: ?>
                        <img class="w-full max-h-[320px]" src="<?= base_url('assets/img/no_image.jpg'); ?>">
                    <?php endif; ?>
                    <div class="p-3">
                        <a href="<?= base_url('product/detail/'.$product->id) ?>"><h2 class="font-semibold text-[12px] sm:text-sm lg:text-[16px] truncate"><?= $product->product_name; ?></h2></a>
                        <h3 class="text-red-600 lg:text-lg"><?= "Rp". number_format($product->product_price, 0, '.', '.'); ?></h3>
                        <div class="flex justify-between mt-3 items-center text-sm">
                            <p class="text-[12px] md:text-base"><?= $product->sell; ?> Terjual</p>
                            <button data-id="<?= $product->id; ?>" onclick="addToCart(this)" class="text-white rounded-full bg-blue-700 px-3 py-2 text-[12px] md:text-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <h1 class="text-center font-semibold py-8 text-lg">Tidak produk yang terkait dengan pencarian anda</h1>
        <?php endif; ?>
    </div>
<?php else: ?>
<!-- Hero section -->
    <div class="sm:px-8 sm:py-4">
        <div class="h-[250px] sm:h-[500px] sm:rounded-md relative overflow-hidden group">
            <div id="slider" class="flex w-[200%] h-full transition-all">
                <div class="slide w-full h-full bg-hero2 bg-cover flex justify-center items-center flex-col">
                    <h1 class="text-white text-xl sm:text-3xl lg:text-6xl px-8 sm:px-16 xl:px-28 text-center font-open-sans animate-fadeUp">Kami Menjual Segala Jenis Jajanan Khas Lombok</h1>
                    <p class="text-slate-300 my-3 md:my-6 text-[12px] md:text-lg">Rasakan Cita Rasa Lombok</p>
                    <a href="#" class="px-4 py-2 text-[12px] md:text-base md:px-5 md:py-3 rounded-full bg-teal-600 text-white">Belanja Sekarang</a>
                </div>
                <div class="slide w-full h-full bg-hero1 bg-cover flex justify-center items-center flex-col">
                    <h1 class="text-white text-xl sm:text-3xl lg:text-6xl px-8 sm:px-16 xl:px-28 text-center font-open-sans">Kuliner Lombok dengan jajanan khas yang menggoda selera.</h1>
                    <p class="text-slate-300 my-3 md:my-6 text-[12px] md:text-lg">Pesan online dan nikmati di mana saja!</p>
                    <a href="#" class="px-4 py-2 text-[12px] md:text-base md:px-5 md:py-3 rounded-full bg-teal-600 text-white">Belanja Sekarang</a>
                </div>
            </div>
            <button id="prev" class="md:hidden group-hover:inline-block absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-60 text-lg py-3 px-2 text-white"><i class="fa-solid fa-chevron-left"></i></button>
            <button id="next" class="md:hidden group-hover:inline-block absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-60 text-lg py-3 px-2 text-white"><i class="fa-solid fa-chevron-right"></i></button>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                <span data-index="0" class="dot w-2 h-2 rounded-full cursor-pointer border border-white dot-active"></span>
                <span data-index="1" class="dot w-2 h-2 rounded-full cursor-pointer border border-white"></span>
            </div>
        </div>
    </div>
<!-- end hero -->
<!-- Key feature -->
    <div class="flex justify-center flex-col sm:flex-row sm:space-x-3 py-8 sm:py-16 px-4 sm:px-8">
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
<!-- end feature -->
<!-- Product -->
    <div class="py-4 sm:py-8 px-2 sm:px-8">
        <div data-aos="fade-up" data-aos-duration="1000">
            <p class="text-green-700 font-semibold italic text-center text-lg">Produk Kami</p>
            <h1 class="text-center font-bold text-2xl md:text-5xl py-2 lg:py-8">Jajanan Khas Lombok</h1>
            <p class="text-slate-400 text-center">Belanja Jajanan Khas Lombok</p>
        </div>
        <h2 class="text-lg lg:text-2xl font-bold text-slate-600 bg-white px-4 py-2 border-b-2 border-blue-600 mt-3">Rekomendasi</h2>
        <?php if(count($products)) : ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2 mt-3">
            <?php foreach($products as $product) : ?>
                <div class="rounded border border-blue-950 border-opacity-30 block overflow-hidden shadow hover:shadow-lg bg-white">
                    <?php if($product->foto) : ?>
                        <img class="w-full max-h-[320px]" src="<?= base_url('assets/img/products/'.$product->foto); ?>" alt="" srcset="">
                    <?php else: ?>
                        <img class="w-full max-h-[320px]" src="<?= base_url('assets/img/no_image.jpg'); ?>">
                    <?php endif; ?>
                    <div class="p-3">
                        <a href="<?= base_url('product/detail/'.$product->id) ?>"><h2 class="font-semibold text-[12px] sm:text-sm lg:text-[16px] truncate"><?= $product->product_name; ?></h2></a>
                        <h3 class="text-red-600 lg:text-lg"><?= "Rp". number_format($product->product_price, 0, '.', '.'); ?></h3>
                        <div class="flex justify-between mt-3 items-center text-sm">
                            <p class="text-[12px] md:text-base"><?= $product->sell; ?> Terjual</p>
                            <button data-id="<?= $product->id; ?>" onclick="addToCart(this)" class="text-white rounded-full bg-blue-700 px-3 py-2 text-[12px] md:text-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <h1 class="text-center font-semibold py-5">Produk Kosong</h1>
        <?php endif; ?>
    </div>
<!-- end products -->
<?php endif; ?>
</div>

