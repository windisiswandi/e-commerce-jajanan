<style>
    #orderItem table, 
    #orderItem th, 
    #orderItem td {
        border-bottom: 1px solid #cbd5e1;
        padding: 10px 15px;
        border-collapse: collapse;
    }
</style>
<div class="xl:container px-4 sm:px-8 py-5">
    <div class="p-6 bg-white">
        <header class="py-3 border-b border-b-blue-500">
            <ul class="flex items-center text-gray-400 text-sm lg:text-base overflow-auto text-nowrap" id="menu-order">
                <li onclick="orderStatus(this)" data-status="pending" class="select-none px-3 cursor-pointer text-blue-500 font-semibold">Belum Bayar</li>
                <li onclick="orderStatus(this)" data-status="packed" class="select-none px-3 cursor-pointer">Dikemas</li>
                <li onclick="orderStatus(this)" data-status="shipped" class="select-none px-3 cursor-pointer">Dikirim</li>
                <li onclick="orderStatus(this)" data-status="delivered" class="select-none px-3 cursor-pointer">Selesai</li>
                <li onclick="orderStatus(this)" data-status="cancel" class="select-none px-3 cursor-pointer">Dibatalkan</li>
            </ul>
        </header>
        <div id="orderItem">
            <div data-status="pending" class="status overflow-auto order-list">
                <?php if(isset($orders['pending'])) : ?>
                    <table class="table-auto w-full mb-8 text-[12px] sm:text-sm mt-8">
                        <thead class="font-semibold">
                            <tr>
                                <td>No. Order</td>
                                <td>Jumlah Item</td>
                                <td>Tanggal Order</td>
                                <td>Expedisi</td>
                                <td>Total Bayar</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['pending'] as $order) : ?>
                                <tr>
                                    <td><?= $order['order_number'] ?></td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><i class="fa-solid fa-truck-fast font-bold"></i> JNE</td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                        <span class="px-2 py-1 bg-yellow-500 text-black rounded-md text-[10px] sm:text-[12px] font-bold inline-block">Belum bayar</span>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('order/cancel/'.$order['id']) ?>" class="bg-red-600 hover:bg-red-400 text-white px-3 py-1 rounded">Batal</a>
                                        <a href="<?= base_url('order/payment'); ?>" class="bg-blue-600 hover:bg-blue-400 text-white px-3 py-1 rounded">Bayar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else:?>
                    <p class="py-16 text-center text-gray-400 font-semibold">Belum ada pesanan</p>
                <?php endif; ?>
            </div>
            <div data-status="packed" class="status overflow-auto order-list hidden">
                <?php if(isset($orders['packed'])) : ?>
                    <table class="table-auto w-full mb-8 text-[12px] sm:text-sm mt-8">
                        <thead class="font-semibold">
                            <tr>
                                <td>No. Order</td>
                                <td>Jumlah Item</td>
                                <td>Tanggal Order</td>
                                <td>Expedisi</td>
                                <td>Total Bayar</td>
                                <td>Keterangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['packed'] as $order) : ?>
                                <tr>
                                    <td><?= $order['order_number'] ?></td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><i class="fa-solid fa-truck-fast font-bold"></i> JNE</td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                    </td>
                                    <td>
                                        <a class="bg-yellow-300 text-yellow-800 font-semibold px-2 py-1 rounded text-[10px]">Diproses</a>
                                        <p class="mt-3">Paket sedang dikemas</p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else:?>
                    <p class="py-16 text-center text-gray-400 font-semibold">Belum ada pesanan</p>
                <?php endif; ?>
            </div>
            <div data-status="shipped" class="status overflow-auto order-list hidden">
                <?php if(isset($orders['shipped'])) : ?>
                    <table class="table-auto w-full mb-8 text-[12px] sm:text-sm mt-8">
                        <thead class="font-semibold">
                            <tr>
                                <td>No. Order</td>
                                <td>Jumlah Item</td>
                                <td>Tanggal Order</td>
                                <td>Expedisi</td>
                                <td>Total Bayar</td>
                                <td>Keterangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['shipped'] as $order) : ?>
                                <tr>
                                    <td><?= $order['order_number'] ?></td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><i class="fa-solid fa-truck-fast font-bold"></i> JNE</td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                    </td>
                                    <td>
                                        <a class="bg-blue-300 text-blue-800 font-semibold px-2 py-1 rounded text-[10px]">Dikirim</a>
                                        <p class="mt-3">Paket dalam perjalanan</p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else:?>
                    <p class="py-16 text-center text-gray-400 font-semibold">Belum ada pesanan</p>
                <?php endif; ?>
            </div>
            <div data-status="delivered" class="status overflow-auto order-list hidden">
                <?php if(isset($orders['delivered'])) : ?>
                    <table class="table-auto w-full mb-8 text-[12px] sm:text-sm mt-8">
                        <thead class="font-semibold">
                            <tr>
                                <td>No. Order</td>
                                <td>Jumlah Item</td>
                                <td>Tanggal Order</td>
                                <td>Expedisi</td>
                                <td>Total Bayar</td>
                                <td>Keterangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['delivered'] as $order) : ?>
                                <tr>
                                    <td><?= $order['order_number'] ?></td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><i class="fa-solid fa-truck-fast font-bold"></i> JNE</td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                    </td>
                                    <td>
                                        <a class="bg-green-200 text-green-800 font-semibold px-2 py-1 rounded text-[10px]">Delivered</a>
                                        <p class="mt-3">Paket diterima oleh yang bersangkutan</p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else:?>
                    <p class="py-16 text-center text-gray-400 font-semibold">Belum ada pesanan</p>
                <?php endif; ?>
            </div>
            <div data-status="cancel" class="status overflow-auto order-list hidden">
                <?php if(isset($orders['cancelled'])) : ?>
                    <table class="table-auto w-full mb-8 text-[12px] sm:text-sm mt-8">
                        <thead class="font-semibold">
                            <tr>
                                <td>No. Order</td>
                                <td>Jumlah Item</td>
                                <td>Tanggal Order</td>
                                <td>Expedisi</td>
                                <td>Total Bayar</td>
                                <td>Keterangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['cancelled'] as $order) : ?>
                                <tr>
                                    <td><?= $order['order_number'] ?></td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><i class="fa-solid fa-truck-fast font-bold"></i> JNE</td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                    </td>
                                    <td>
                                        <a class="bg-red-200 text-red-800 font-semibold px-2 py-1 rounded text-[10px]">Cancelled</a>
                                        <p class="mt-3">Paket dibatalkan</p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else:?>
                    <p class="py-16 text-center text-gray-400 font-semibold">Belum ada pesanan</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function orderStatus(data) {
        $('#menu-order li').each(function (i, li) {
            if($(li).data('status') == $(data).data('status')) $(li).addClass('text-blue-500 font-semibold')
            else $(li).removeClass('text-blue-500 font-semibold')
        })

        $('.order-list').each(function(i, div) {
            if($(div).data('status') == $(data).data('status')) $(div).removeClass('hidden')
            else $(div).addClass('hidden')
        })

    }
</script>