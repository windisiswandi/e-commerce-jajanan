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