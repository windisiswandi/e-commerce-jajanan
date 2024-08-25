<div class="xl:container px-4 sm:px-8 py-8">
    <div class="overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full xl:w-[1200px] mx-auto">
            <div class="p-5 sm:p-8">
                <h3 class="text-lg md:text-3xl font-bold uppercase leading-6 text-blue-600" id="modal-title">invoice</h3>
                <div class="mt-5 w-full lg:w-1/2">
                    <div class="text-sm space-y-3">
                        <div class="flex flex-col sm:flex-row justify-start space-y-1 sm:space-y-0">
                            <div class="font-bold w-full sm:w-1/3">No Order / Resi</div>
                            <div class="uppercase w-full sm:w-2/3"><?= $orders['order_number']." / ".$orders['no_resi']; ?></div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-start space-y-1 sm:space-y-0">
                            <div class="font-bold w-full sm:w-1/3">Pembeli</div>
                            <div class="uppercase w-full sm:w-2/3"><?= $user->name; ?></div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-start space-y-1 sm:space-y-0">
                            <div class="font-bold w-full sm:w-1/3">Alamat Pembeli</div>
                            <div class="w-full sm:w-2/3"><span class="font-semibold capitalize"><?= $user->name; ?></span><span> (<?= $user->phone_number; ?>)</span> <br> <?= $user->address; ?></div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-start space-y-1 sm:space-y-0">
                            <div class="font-bold w-full sm:w-1/3">Status</div>
                            <div class="capitalize w-full sm:w-2/3">
                                <?php if($orders['order_status'] == "pending") : ?>
                                    <span>Menunggu pembayaran</span></td>
                                <?php elseif($orders['order_status'] == "packed") : ?>
                                    <span>Sedang diproses</span></td>
                                <?php elseif($orders['order_status'] == "shipped") : ?>
                                    <span>Dalam perjalanan</span></td>
                                <?php elseif($orders['order_status'] == "delivered") : ?>
                                    <span>Paket telah diterima</span></td>
                                <?php else : ?>
                                    <span>Dibatalkan</span></td>
                                <?php endif; ?>
                            </div>
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
                            foreach($orders['items'] as $i => $item) : ?>
                            <tr>
                                <td class="text-blue-500 font-bold sm:text-base uppercase"><?= $item['product_name']; ?></td>
                                <td><?= $item['qty']; ?></td>
                                <td><?= "Rp".number_format($item['product_price'],0,".","."); ?></td>
                                <td>
                                    <?php
                                        $total = $item['qty']*$item['product_price'];
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
                            <div class="uppercase font-bold">Total Harga (<?= count($orders['items']); ?> Barang)</div>
                            <div class="font-bold text-end"><?= "Rp".number_format($totals,0,".","."); ?></div>
                            <div>Ongkos Kirim</div>
                            <div class="text-end">Rp40.000</div>
                            <div class="uppercase font-bold">Total Belanja</div>
                            <div class="font-bold text-end">
                                <?= "Rp".number_format($orders['total_amount'],0,".",".")."*"; ?>
                                <br>
                                <p class="italic text-[12px] text-slate-500 font-normal">*sudah termasuk dengan kode unik pembayaran</p>
                            </div>
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
                        <div class="font-bold uppercase"><?= $orders['payment_method']; ?></div>
                    </div>
                </div>
            </div>

        
            <!-- footer -->
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <a href="<?= base_url("user/orders"); ?>" class="mt-3 inline-flex w-full justify-center rounded-md bg-slate-900 px-3 py-2 text-sm font-semibold text-white shadow-sm sm:mt-0 sm:w-auto">back</a>
            </div>
        </div>
</div>