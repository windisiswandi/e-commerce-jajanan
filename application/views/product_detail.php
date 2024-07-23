<div class="xl:container px-4 sm:px-8 py-16">
    <div class="flex justify-center items-start bg-white p-8 rounded-md">
        <div class="w-1/3">
            <?php if($product->foto) : ?>
                <img src="<?= base_url('assets/img/products/'.$product->foto) ?>" class="w-full">
            <?php else: ?>
                <img src="<?= base_url('assets/img/no_image.jpg') ?>" class="w-full">
            <?php endif; ?>
        </div>
        <div class="w-2/3 px-16 py-5">
            <h1 class="font-bold text-2xl"><?= $product->product_name; ?></h1>
            <h2 class="text-sm text-gray-400"><?= $product->sell; ?> Terjual</h2>
            <h3 class="text-red-500 text-lg"><?= "Rp". number_format($product->product_price, 0, '.', '.'); ?></h3>
            <div class="w-44 flex items-center justify-between">
                <div class="flex p-2 space-x-4 justify-between items-center text-lg">
                    <button class="text-teal-800">-</button>
                    <span>1</span>
                    <button class="text-teal-800">+</button>
                </div>
                <div class="font-bold text-lg">Stock: <?= $product->stock; ?></div>
            </div>
            <button class="text-white px-5 py-2 bg-blue-500 rounded-full">Add to cart</button>
        </div>
    </div>
</div>