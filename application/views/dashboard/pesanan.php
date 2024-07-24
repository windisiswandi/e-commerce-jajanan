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
                    <div class="card-header">
                        <ul id="navMenu" class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-status="pending" onclick="orderStatus(this)">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-status="packed" onclick="orderStatus(this)" href="#">Dikemas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-status="shipped" onclick="orderStatus(this)" href="#">Dikirim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-status="delivered" onclick="orderStatus(this)" href="#">Selesai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-status="cancelled" onclick="orderStatus(this)" href="#">Cancelled</a>
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
                                                <td><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td>JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount'], 0, ".", "."); ?></td>
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
                                                <td><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td>JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount'], 0, ".", "."); ?></td>
                                                <td>
                                                    <a href="#" class="badge badge-info">Konfirmasi</a>
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
                                            <th>No Order</th>
                                            <th>Nama Penerima</th>
                                            <th>Jumlah Item</th>
                                            <th>Tanggal Order</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($orders['shipped'])) : ?>
                                            <?php foreach($orders['shipped'] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-warning">Belum Bayar</span>
                                                    <?= $order['order_number']; ?></td>
                                                <td><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td>JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount'], 0, ".", "."); ?></td>
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
                                            <th>No Order</th>
                                            <th>Nama Penerima</th>
                                            <th>Jumlah Item</th>
                                            <th>Tanggal Order</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($orders['delivered'])) : ?>
                                            <?php foreach($orders['delivered'] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-warning">Belum Bayar</span>
                                                    <?= $order['order_number']; ?></td>
                                                <td><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td>JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount'], 0, ".", "."); ?></td>
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
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($orders['cancelled'])) : ?>
                                            <?php foreach($orders['cancelled'] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-warning">Belum Bayar</span>
                                                    <?= $order['order_number']; ?></td>
                                                <td><?= $order['name']; ?></td>
                                                <td><?= $order['total_item']; ?></td>
                                                <td><?= $order['order_date']; ?></td>
                                                <td>JNE</td>
                                                <td><?= "Rp ".number_format($order['total_amount'], 0, ".", "."); ?></td>
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
