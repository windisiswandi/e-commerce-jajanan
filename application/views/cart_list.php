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
    <div id="cartItem" class="bg-white rounded p-6">
        <?php if(count($carts)) : ?>
            <header class="py-5 font-semibold text-xl">Keranjang Belanjaan</header>
            <div class="overflow-auto">
                <table class="table-auto w-full text-sm ">
                    <thead class="font-bold">
                        <tr class="">
                            <td>Nama Barang</td>
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
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <form action="<?= base_url('order/add') ?>" method="post">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-full sm:w-[400px]">
              <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-title">Methode Pembayaran</h3>
                    <div class="mt-2">
                      <input id="total_amount" type="hidden" name="total_amount">
                      <div class="flex items-center space-x-2">
                          <input class="scale-110" id="transfer" type="radio" name="payment_method" value="transfer">
                          <label class="text-lg" for="transfer">Transfer</label>
                      </div>
                      <div class="flex items-center space-x-2">
                          <input class="scale-110" id="cod" type="radio" name="payment_method" value="cod">
                          <label class="text-lg" for="cod">COD</label>
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
</div>