<?php if(count($carts)) : ?>
            <header class="py-5 font-semibold text-xl">Keranjang Belanjaan</header>
            <div class="overflow-auto">
                <table class="table-auto w-full text-sm ">
                    <thead class="font-bold">
                        <tr class="">
                            <td>Nama Barang</td>
                            <td>Stock</td>
                            <td>Kuantitas</td>
                            <td>Harga</td>
                            <td>Sub Total</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totals = 0;
                        foreach($carts as $i => $item) : ?>
                        <tr>
                            <td class="font-semibold text-slate-600 ">
                                <div class="flex items-center space-x-3">
                                    <?php if($item->foto) : ?>
                                    <img class="w-8 h-8 rounded-md" src="<?= base_url('assets/img/products/'.$item->foto) ?>" alt="">
                                    <?php else: ?>
                                    <img class="w-8 h-8 rounded-md" src="<?= base_url('assets/img/no_image.jpg') ?>" alt="">
                                    <?php endif; ?>
                                    <div class="truncate"><?= $item->product_name; ?></div>
                                </div>
                            </td>
                            <td><?= $item->stock; ?></td>
                            <td>
                                <input class="border w-16 text-center border-slate-300 p-2 rounded-md focus:outline-none" type="number" min="1" value="<?= $item->qty; ?>" onkeydown="add_qty(event, this)" onchange="add_qty(event, this)" data-product="<?= $item->product_id; ?>">
                            </td>
                            <td><?= "Rp".number_format($item->product_price,0,".","."); ?></td>
                            <td>
                                <?php
                                    $total = $item->qty*$item->product_price;
                                    $totals += $total;
                                    echo "Rp".number_format($total,0,".",".")
                                ?>
                            </td>
                            <td>
                                <button data-id="<?= $item->cart_id ?>" onclick="remItemCart(this)" class="text-white bg-red-600 p-1 text-[12px] rounded-md"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="py-6 text-right">
                <h1 class="text-xl font-semibold">Total : <?= "Rp".number_format($totals,0,".","."); ?></h1>
                <div class="mt-5 space-x-2">
                    <a href="<?= base_url('cart/remove') ?>" class="text-white px-4 py-2 rounded-md text-sm bg-red-600"><i class="fa-solid fa-trash"></i> Clear Cart </a>
                    <button onclick="paymentConfirm(<?= $totals; ?>)" class="text-white px-4 py-2 rounded-md text-sm bg-green-800"><i class="fa-solid fa-check"></i> Checkout</button>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center space-y-4 py-8">
                <p class="text-gray-400 text-xl">Keranjang belanja anda kosong</p>
                <a href="<?= base_url('/'); ?>" class="px-3 py-2 bg-blue-500 text-white inline-block">Belanja Sekarang</a>
            </div>
        <?php endif; ?>