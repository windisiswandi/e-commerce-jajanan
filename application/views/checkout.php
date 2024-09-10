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
    <form class="p-4" action="<?= base_url('order/add') ?>" method="post">
        <div class="rounded-lg bg-white text-left shadow-xl transition-all w-full mx-auto">
            <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="mt-5 w-full lg:w-1/2">
                    <div class="text-sm space-y-3">
                        <div class="flex flex-col sm:flex-row justify-start space-y-1 sm:space-y-0">
                            <div class="font-bold w-full sm:w-1/3">Pembeli</div>
                            <div class="uppercase w-full sm:w-2/3"><?= $user->name; ?></div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-start space-y-1 sm:space-y-0">
                            <div class="font-bold w-full sm:w-1/3">Alamat Pembeli</div>
                            <div class="w-full sm:w-2/3"><span class="font-semibold capitalize"><?= $user->name; ?></span><span> (<?= $user->phone_number; ?>)</span> <br> <?= $user->address; ?>, <?= @$user->city_name; ?>, <?= @$user->province_name; ?></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mt-4">
                        <table class="table-auto w-full space-y-5 text-[12px] sm:text-sm overflow-x-auto">
                            <thead class="border-t-2 border-b-2 border-black">
                                <tr>
                                    <th class="py-2">INFO PRODUK</th>
                                    <th class="py-2">Berat (g)</th>
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
                                    <td>
                                        <?= $item->weight." gram"; ?>
                                    </td>
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
                                <div class="text-end" id="display_ongkir"><?= "Rp".number_format($ongkir,0,".","."); ?></div>
                                <div>Kode unik</div>
                                <div class="text-end text-blue-800"><?= "Rp".number_format($uniqcode,0,".","."); ?></div>
                                <div>Total Berat</div>
                                <div class="text-end"><?= $total_weight; ?> gram</div>
                                <div>Estimasi</div>
                                <div class="text-end" id="display_estimasi"><?= $kurir['cost'][0]['etd']; ?> Hari</div>
                                <div class="uppercase font-bold">Total Belanja</div>
                                <div class="font-bold text-end" id="display_total_amount"><?= "Rp".number_format($totals+$ongkir+$uniqcode,0,".","."); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex flex-col sm:flex-row justify-between py-5 space-y-3 sm:space-y-0 text-sm sm:text-base">
                    <div class="w-full sm:w-1/2">
                        <div>Kurir</div>
                        <div class="font-bold uppercase"><span id="display_service">JNE-<?= $kurir['service']; ?></span> <span onclick="changeKurir()" class="text-blue-800 capitalize text-sm cursor-pointer">Ubah <i class="fa-solid fa-pen"></i></span></div>
                        <div class="italic text-sm" id="display_description">(<?= $kurir['description']; ?>)</div>
                    </div>
                    <div class="w-full sm:w-1/2">
                        <div>Metode Pembayaran</div>
                        <input id="total_amount" type="hidden" name="total_amount" value="<?= $totals; ?>">
                        <input id="ongkir" type="hidden" name="ongkir" value="<?= $ongkir; ?>">
                        <input type="hidden" name="kode_unik" value="<?= $uniqcode; ?>">
                        <input id="total_weight" type="hidden" name="total_weight" value="<?= $total_weight; ?>">
                        <input id="etd" type="hidden" name="estimasi" value="<?= $kurir['cost'][0]['etd']; ?> Hari">
                        <input type="hidden" name="kurir" value="<?= $kurir['service'].",".$kurir['description']; ?>">
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
                <a href="<?= base_url('cart'); ?>" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Back</a>
            </div>
        </div>
    </form>
</div>

<div id="kurir" class="relative z-10 hidden">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <form class="p-4" action="<?= base_url('order/add') ?>" method="post">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full sm:w-[400px] mx-auto">
            <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <h3 class="text-lg md:text-xl font-bold capitalize leading-6 text-black" id="modal-title">Pilih layanan kurir</h3>
                <div class="mt-5 space-y-3">
                    <?php foreach($kurirs as $k) : ?>
                        <div 
                            data-ongkir="<?= $k['cost'][0]['value'] ?>" 
                            data-service="<?= $k['service'] ?>" 
                            data-description="<?= $k['description'] ?>" 
                            data-etd="<?= $k['cost'][0]['etd'] ?>" 
                            onclick="selectKurir(this, <?= $totals ?>, <?= $uniqcode ?>)" 
                            class="border text-[14px] text-black font-semibold border-slate-400 p-2 flex items-center cursor-pointer hover:bg-slate-200 rounded">
                            <div class="w-1/2">
                                <h1 class="">JNE-<?= $k['service']; ?></h1>
                                <p class="text-slate-800 font-normal text-[12px]">(<?= $k['description']; ?>)</p>
                            </div>
                            <div class="w-1/2 text-end">
                                <h1><?= "Rp".number_format($k['cost'][0]['value'],0,".","."); ?></h1>
                                <p class="text-slate-800 font-normal text-[12px]"><?= $k['cost'][0]['etd']; ?> Hari</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button onclick="changeKurir()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm sm:mt-0 sm:w-auto">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>