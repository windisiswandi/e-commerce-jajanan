<div class="container">
    <div class="page-inner">
        <?= $this->session->userdata("success"); ?>
        <?php $this->session->unset_userdata("success"); ?>
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Pesanan</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="p-3">
                        <ul id="navMenu" class="nav nav-tabs">
                            <li class="nav-item" style="cursor: pointer;">
                                <a class="nav-link active" data-status="pending" onclick="orderStatus(this)">Pending</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer;">
                                <a class="nav-link" data-status="packed" onclick="orderStatus(this)">Dikemas</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer;">
                                <a class="nav-link" data-status="shipped" onclick="orderStatus(this)">Dikirim</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer;">
                                <a class="nav-link" data-status="delivered" onclick="orderStatus(this)">Selesai</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer;">
                                <a class="nav-link" data-status="cancelled" onclick="orderStatus(this)">Cancelled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div data-status="pending" class="order">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Nama Penerima</th>
                                            <th>Jumlah Item</th>
                                            <th>Tanggal Order</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($orders['pending'])) : ?>
                                            <?php foreach($orders['pending'] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-warning">Belum Bayar</span>
                                                    <?= $order['order_number']; ?></td>
                                                <td class="text-uppercase"><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td><i class="fas fa-truck"></i> JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount']+$order['kode_unik']+$order['ongkir'], 0, ".", "."); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div data-status="packed" class="order d-none">
                            <div class="table-responsive">
                                <table id="basic-datatables2" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Nama Penerima</th>
                                            <th>Jumlah Item</th>
                                            <th>Tanggal Order</th>
                                            <th>Pembayaran</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($orders['packed'])) : ?>
                                            <?php foreach($orders['packed'] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <?= $order['order_number']; ?></td>
                                                <td class="text-uppercase"><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td class="text-uppercase"><?= $order['payment_method']; ?></td>
                                                <td><i class="fas fa-truck"></i> JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount']+$order['kode_unik']+$order['ongkir'], 0, ".", "."); ?></td>
                                                <td>
                                                    <a href="<?= base_url('dashboard/confirm_pesanan/'.$order['order_id']); ?>" class="badge badge-info">Proses</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div data-status="shipped" class="order d-none">
                            <div class="table-responsive">
                                <table id="basic-datatables3" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Resi</th>
                                            <th>Nama Penerima</th>
                                            <th>Jumlah Item</th>
                                            <th>Tanggal Order</th>
                                            <th>Tanggal Dikirim</th>
                                            <th>Pembayaran</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($orders['shipped'])) : ?>
                                            <?php foreach($orders['shipped'] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <?= $order['no_resi']; ?></td>
                                                <td class="text-uppercase"><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td><?= $order['date_shipped']; ?></td>
                                                <td class="text-uppercase"><?= $order['payment_method']; ?></td>
                                                <td><i class="fas fa-truck"></i> JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount']+$order['kode_unik']+$order['ongkir'], 0, ".", "."); ?></td>
                                                <td>
                                                    <a href="https://jne.co.id/tracking-package" target="__blank" class="badge badge-primary text-white">Lacak</a>
                                                    
                                                    <a href="<?= base_url('dashboard/detail_pesanan/'.$order['order_id']); ?>" class="badge badge-warning"><i class="fas fa-eye"></i></a>
                                                    <br>
                                                    <a href="<?= base_url('dashboard/order_delivered/'. $order['order_id']); ?>" class="badge badge-success text-white">Packet diterima</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div data-status="delivered" class="order d-none">
                            <div class="table-responsive">
                                <table id="basic-datatables4" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No resi</th>
                                            <th>Nama Penerima</th>
                                            <th>Jumlah Item</th>
                                            <th>Tanggal dikirim</th>
                                            <th>Tanggal diterima</th>
                                            <th>Pembayaran</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($orders['delivered'])) : ?>
                                            <?php foreach($orders['delivered'] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-success">Delivered</span>
                                                    <a href="<?= base_url('dashboard/detail_pesanan/'.$order['order_id']); ?>" class="badge badge-warning"><i class="fas fa-eye"></i></a>
                                                    <br>
                                                    <?= $order['no_resi']; ?> (JNE)</td>
                                                <td class="text-uppercase"><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['date_shipped']; ?></td>
                                                <td><?= $order['date_delivered']; ?></td>
                                                <td class="text-uppercase"><?= $order['payment_method']; ?></td>
                                                <td><i class="fas fa-truck"></i> JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount']+$order['kode_unik']+$order['ongkir'], 0, ".", "."); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div data-status="cancelled" class="order d-none">
                            <div class="table-responsive">
                                <table id="basic-datatables5" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Nama Penerima</th>
                                            <th>Jumlah Item</th>
                                            <th>Tanggal Order</th>
                                            <th>Total Bayar</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($orders['cancelled'])) : ?>
                                            <?php foreach($orders['cancelled'] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-danger">Cancelled</span>
                                                    <?= $order['order_number']; ?></td>
                                                <td class="text-uppercase"><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td><?= "Rp ".number_format($order['total_amount']+$order['kode_unik']+$order['ongkir'], 0, ".", "."); ?></td>
                                                <td><?= $order['catatan_pembatalan']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function orderStatus(data) 
    {
        $('#navMenu li a').each(function (i, li) {
            if($(li).data('status') == $(data).data('status')) $(li).addClass('active')
            else $(li).removeClass('active')
        })

        $('.order').each(function(i, div) {
            if($(div).data('status') == $(data).data('status')) $(div).removeClass('d-none')
            else $(div).addClass('d-none')
        })

    }
</script>
