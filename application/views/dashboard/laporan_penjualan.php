<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <form class="col-md-7">
                                <div class="row align-items-center mb-2">
                                    <label class="col-sm-4 col-form-label">Dari Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control form-control fw-bold" name="tgl_awal" value="<?= @$_GET['tgl_awal']; ?>" required>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <label class="col-sm-4 col-form-label">Sampai Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control form-control fw-bold" name="tgl_akhir" value="<?= @$_GET['tgl_akhir']; ?>" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary py-2 px-3">Terapkan</button>
                            </form>
                        </div>
                        <?php if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])): ?>
                            <ul id="navMenu" class="nav nav-tabs mb-4">
                                <li class="nav-item" style="cursor: pointer;">
                                    <a class="nav-link active" data-status="per_order" onclick="changeViewOrder(this)">Per Order</a>
                                </li>
                                <li class="nav-item" style="cursor: pointer;">
                                    <a class="nav-link" data-status="per_produk" onclick="changeViewOrder(this)">Per Produk</a>
                                </li>
                            </ul>
                            <div data-status="per_order" class="table-responsive order">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Nama Penerima</th>
                                            <th>Jumlah Item</th>
                                            <th>Tanggal Order</th>
                                            <th>Pembayaran</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($orders)) : ?>
                                            <?php 
                                            $totals = 0;
                                                foreach($orders as $order) : ?>
                                            <tr>
                                                <td><?= $order['order_number']; ?></td>
                                                <td class="text-uppercase"><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td><?= $order['payment_method']; ?></td>
                                                <td>
                                                    <?php
                                                    $totals += $order['total_amount']; 
                                                    echo "Rp ".number_format($order['total_amount'], 0, ".", "."); ?>
                                                </td>
                                                <td class="text-capitalize">
                                                    <?php if($order['order_status'] == "shipped") : ?>
                                                        <span class="badge badge-primary">Dikirim</span>
                                                    <?php elseif($order['order_status'] == "delivered"): ?>
                                                        <span class="badge badge-success">Selesai</span>
                                                    <?php endif; ?>
                                                    
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div data-status="per_produk" class="table-responsive order d-none">
                                <table id="basic-datatables2" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Nama Produk</th>
                                            <th>QTY</th>
                                            <th>Harga</th>
                                            <th>Sub total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($orders)) : ?>
                                            <?php 
                                            $totals = 0;
                                            foreach($orders as $order) : ?>
                                                <?php foreach($order['products'] as $prod): ?>
                                                <tr>
                                                    <td><?= $order['order_number']; ?></td>
                                                    <td>
                                                        <?php if($prod['foto']): ?>
                                                            <img src="<?= base_url('assets/img/products/'.$prod['foto']) ?>" width="40">
                                                        <?php else: ?>
                                                            <img src="<?= base_url('assets/img/no_image.jpg') ?>" width="40">
                                                        <?php endif; ?>
                                                        <?= $prod['product_name']; ?></td>
                                                    <td><?= $prod['qty']; ?></td>
                                                    <td><?= "Rp ".number_format($prod['product_price'], 0, ".", "."); ?></td>
                                                    <td>
                                                        <?php 
                                                            $sub_total = $prod['qty'] * $prod['product_price'];
                                                            echo "Rp ".number_format($sub_total, 0, ".", ".");
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeViewOrder(data) 
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