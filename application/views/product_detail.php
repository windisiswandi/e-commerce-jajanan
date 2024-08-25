<div class="xl:container p-4 sm:px-8 md:py-16">
    <div class="flex justify-center items-start bg-white sm:p-8 rounded-md flex-wrap">
        <div class="w-full sm:w-[40%] lg:w-1/3">
            <div>
                <?php if($product->foto) : ?>
                    <img src="<?= base_url('assets/img/products/'.$product->foto) ?>" class="w-full max-h-[350px]">
                <?php else: ?>
                    <img src="<?= base_url('assets/img/no_image.jpg') ?>" class="w-full max-h-[350px]">
                <?php endif; ?>
            </div>
            <div></div>
        </div>
        <div class="w-full sm:w-[60%] lg:w-2/3 p-4 sm:px-8 sm:py-0 lg:px-16">
            <h1 class="font-bold text-xl sm:text-2xl pb-2"><?= $product->product_name; ?></h1>
            <h2 class="text-base text-black">Terjual <?= $product->sell; ?></h2>
            <h2 class="text-red-500 text-xl sm:text-3xl font-semibold py-2"><?= "Rp". number_format($product->product_price, 0, '.', '.'); ?></h2>
            <div class="mt-5 flex items-center space-x-4">
                <div class="text-base sm:text-lg py-3">Stock: <span class="font-bold"><?= $product->stock; ?></span></div>
                <?php if($product->stock > 0) : ?>
                <button data-id="<?= $product->id; ?>" onclick="addToCart(this)" class="text-white rounded-full bg-blue-700 px-3 py-2 text-[12px] md:text-sm">Add to Cart</button>
                <?php else: ?>
                <button class="text-white rounded-full bg-blue-300 px-3 py-2 text-[12px] md:text-sm cursor-not-allowed" disabled>Add to Cart</button>
                <?php endif; ?>
            </div>
            <div class="mt-5">
                <h2 class="font-bold text-lg">Deskripsi</h2>
                <p>
                    <?= $product->description; ?>
                </p>
            </div>
        </div>
    </div>
</div>