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
    <?php if($this->session->userdata('success')) : ?>
        <div id="alertku" class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded relative my-3" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline"><?= $this->session->userdata('success'); ?></span>
            <span onclick="closeAlert()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 010 1.414L11.414 10l2.934 2.934a1 1 0 01-1.414 1.414L10 11.414l-2.934 2.934a1 1 0 01-1.414-1.414L8.586 10 5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.934a1 1 0 011.414 0z"/></svg>
            </span>
        </div>
    <?php endif; ?>
    <?php $this->session->unset_userdata('success'); ?>
    <div class="p-6 bg-white">
        <header class="py-3 border-b border-b-blue-500">
            <ul class="flex items-center text-gray-400 text-sm lg:text-base overflow-auto text-nowrap" id="menu-order">
                <li onclick="orderStatus(this)" data-status="pending" class="select-none px-3 cursor-pointer text-blue-500 font-semibold">Belum Bayar</li>
                <li onclick="orderStatus(this)" data-status="packed" class="select-none px-3 cursor-pointer">Diproses</li>
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
                                <td>Pembayaran</td>
                                <td>Total Bayar</td>
                                <td>Feedback</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['pending'] as $order) : ?>
                                <tr>
                                    <td>
                                        <?= $order['order_number'] ?></td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><?= $order['payment_method'] ?></td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                    </td>
                                    <td>
                                        <p class="mb-1"><?= $order['catatan_pembatalan']; ?></p>
                                        <?php if($order['catatan_pembatalan']) : ?>
                                            <a href="<?= base_url('user/payment/'.$order['id']); ?>" class="bg-blue-300 font-bold text-blue-600 px-3 py-1 rounded inline-block">Upload ulang</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($order['catatan_pembatalan']) : ?>
                                            <a onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('order/cancel/'.$order['id']) ?>" class="bg-red-600 hover:bg-red-400 inline-block text-white px-3 py-1 rounded">Batal</a>
                                        <?php else: ?>
                                            <a onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('order/cancel/'.$order['id']) ?>" class="bg-red-600 hover:bg-red-400 inline-block text-white px-3 py-1 rounded">Batal</a>
                                            <a href="<?= base_url('user/payment/'.$order['id']); ?>" class="bg-blue-600 hover:bg-blue-400 text-white px-3 py-1 rounded inline-block">Bayar</a>
                                        <?php endif; ?>
                                        
                                        
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
                                <td>Pembayaran</td>
                                <td>Expedisi</td>
                                <td>Total Bayar</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['packed'] as $order) : ?>
                                <tr>
                                    <td>
                                        <a class="bg-yellow-300 text-yellow-800 font-semibold px-2 py-1 rounded text-[12px]">Sedang diproses</a>
                                        <?= $order['order_number'] ?></td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><?= $order['payment_method'] ?></td>
                                    <td><i class="fa-solid fa-truck-fast font-bold"></i> JNE</td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
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
                                <td>No. Resi</td>
                                <td>Jumlah Item</td>
                                <td>Tanggal Order</td>
                                <td>Tanggal Dikirim</td>
                                <td>Pembayaran</td>
                                <td>Expedisi</td>
                                <td>Total Bayar</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['shipped'] as $order) : ?>
                                <tr>
                                    <td>
                                        <p class="mt-1"><?= $order['no_resi'] ?></p>
                                    </td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><?= $order['date_shipped'] ?></td>
                                    <td><?= $order['payment_method'] ?></td>
                                    <td><i class="fa-solid fa-truck-fast font-bold"></i> JNE</td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                    </td>
                                    <td>
                                        <a href="https://jne.co.id/tracking-package" target="__blank" class="bg-blue-300 text-blue-800 font-semibold px-2 py-1 rounded text-[12px] lg:text-sm inline-block">Lacak</a>
                                        <a href="<?= base_url('order/invoice/'.$order['id']); ?>" class="bg-yellow-300 text-yellow-800 font-semibold px-2 py-1 rounded text-[12px] lg:text-sm inline-block"><i class="fa-solid fa-eye"></i></a>
                                        <br>
                                        <a href="<?= base_url('order/delivered/'.$order['id']); ?>" class="inline-block text-center py-1 mt-3 lg:py-2 px-2 lg:px-3 border border-blue-600 text-blue-800 hover:bg-blue-600 hover:text-white rounded-md text-[10px] lg:text-sm">Pesanan diterima</a>
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
                                <td>No. Resi</td>
                                <td>Jumlah Item</td>
                                <td>Tanggal Dikirim</td>
                                <td>Tanggal Diterima</td>
                                <td>Pembayaran</td>
                                <td>Total Bayar</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['delivered'] as $order) : ?>
                                <tr>
                                    <td>
                                        <a class="bg-green-200 text-green-800 font-semibold px-2 py-1 rounded text-[12px]">Delivered</a>
                                        <?= $order['no_resi'] ?> (JNE)</td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['date_shipped'] ?></td>
                                    <td><?= $order['date_delivered'] ?></td>
                                    <td><?= $order['payment_method'] ?></td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('order/invoice/'.$order['id']); ?>" class="bg-yellow-300 text-yellow-800 font-semibold px-2 py-1 rounded text-[12px] lg:text-sm inline-block"><i class="fa-solid fa-eye"></i></a>
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
                                <td>Pembayaran</td>
                                <td>Expedisi</td>
                                <td>Total Bayar</td>
                                <td>Keterangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders['cancelled'] as $order) : ?>
                                <tr>
                                    <td>
                                        <a class="bg-red-200 text-red-800 font-semibold px-2 py-1 rounded text-[12px]">Cancelled</a>
                                        <?= $order['order_number'] ?></td>
                                    <td><?= $order['total_item'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><?= $order['payment_method'] ?></td>
                                    <td><i class="fa-solid fa-truck-fast font-bold"></i> JNE</td>
                                    <td>
                                        <?= "Rp".number_format($order['total_amount'], 0, ".",".") ?>
                                    </td>
                                    <td>
                                        <?= $order['catatan_pembatalan']; ?>
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