<style>
    #cartItem table, 
    #cartItem th, 
    #cartItem td {
        border-bottom: 1px solid #cbd5e1;
        padding: 10px 15px;
        border-collapse: collapse;
    }
</style>
<div class="xl:container px-4 sm:px-8 py-8">
    <?php if($this->session->userdata('error')) : ?>
        <div id="alertku" class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded relative my-3" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline"><?= $this->session->userdata('error'); ?></span>
            <span onclick="closeAlert()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 010 1.414L11.414 10l2.934 2.934a1 1 0 01-1.414 1.414L10 11.414l-2.934 2.934a1 1 0 01-1.414-1.414L8.586 10 5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.934a1 1 0 011.414 0z"/></svg>
            </span>
        </div>
    <?php endif; ?>
    <?php $this->session->unset_userdata('error'); ?>
    <div id="cartItem" class="bg-white rounded p-6">
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
                                <input class="border w-16 text-center border-slate-300 p-2 rounded-md focus:outline-none" type="number" min="1" value="<?= $item->qty; ?>" onkeydown="add_qty(event, this)" data-product="<?= $item->product_id; ?>">
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
                <a href="<?= base_url('/#products'); ?>" class="px-3 py-2 bg-blue-500 text-white inline-block">Belanja Sekarang</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<div id="popup" class="relative z-10 hidden">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <form class="p-4" action="<?= base_url('order/add') ?>" method="post">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full xl:w-[1200px] mx-auto">
            <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <h3 class="text-lg md:text-3xl font-bold uppercase leading-6 text-blue-600" id="modal-title">toko jajanan lombok</h3>
                <div class="mt-5 w-full lg:w-1/2">
                    <div class="text-sm space-y-3">
                        <div class="flex flex-col sm:flex-row justify-start space-y-1 sm:space-y-0">
                            <div class="font-bold w-full sm:w-1/3">Pembeli</div>
                            <div class="uppercase w-full sm:w-2/3"><?= $user->name; ?></div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-start space-y-1 sm:space-y-0">
                            <div class="font-bold w-full sm:w-1/3">Alamat Pembeli</div>
                            <div class="w-full sm:w-2/3"><span class="font-semibold capitalize"><?= $user->name; ?></span><span> (<?= $user->phone_number; ?>)</span> <br> <?= $user->address; ?></div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table-auto w-full space-y-5 text-[12px] sm:text-sm overflow-x-auto">
                        <thead class="border-t-2 border-b-2 border-black">
                            <tr>
                                <th class="py-2">INFO PRODUK</th>
                                <th class="py-2">QTY</th>
                                <th class="py-2">HARGA SATUAN</th>
                                <th class="py-2">TOTAL HARGA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $totals = 0;
                            foreach($carts as $i => $item) : ?>
                            <tr>
                                <td class="text-blue-500 font-bold sm:text-base uppercase"><?= $item->product_name; ?></td>
                                <td><?= $item->qty; ?></td>
                                <td><?= "Rp".number_format($item->product_price,0,".","."); ?></td>
                                <td>
                                    <?php
                                        $total = $item->qty*$item->product_price;
                                        $totals += $total;
                                        echo "Rp".number_format($total,0,".",".")
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col sm:flex-row justify-end my-5">
                    <div class="w-full sm:w-1/2">
                        <div class="grid grid-cols-2 gap-1 text-[12px] sm:text-sm">
                            <div class="uppercase font-bold">Total Harga (<?= count($carts); ?> Barang)</div>
                            <div class="font-bold text-end"><?= "Rp".number_format($totals,0,".","."); ?></div>
                            <div>Ongkos Kirim</div>
                            <div class="text-end">Rp40.000</div>
                            <div>Kode unik</div>
                            <div class="text-end text-blue-800"><?= "Rp".number_format($uniqcode,0,".","."); ?></div>
                            <div class="uppercase font-bold">Total Belanja</div>
                            <div class="font-bold text-end"><?= "Rp".number_format($totals+40000+$uniqcode,0,".","."); ?></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex flex-col sm:flex-row justify-between py-5 space-y-3 sm:space-y-0 text-sm sm:text-base">
                    <div class="w-full sm:w-1/2">
                        <div>Kurir</div>
                        <div class="font-bold uppercase">JNE-Reguler</div>
                    </div>
                    <div class="w-full sm:w-1/2">
                        <div>Metode Pembayaran</div>
                        <input id="total_amount" type="hidden" name="total_amount" value="<?= $totals+40000+$uniqcode; ?>">
                        <div class="flex items-center space-x-2">
                            <input class="scale-110" id="transfer" type="radio" name="payment_method" value="transfer" required>
                            <label for="transfer">Transfer</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input class="scale-110" id="cod" type="radio" name="payment_method" value="cod" required>
                            <label for="cod">COD</label>
                        </div>
                    </div>
                </div>
            </div>

        
            <!-- footer -->
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-green-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 sm:ml-3 sm:w-auto">Checkout</button>
                <button onclick="paymentConfirm()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>