
<div class="container">
    <div class="page-inner">
        <!-- <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Produk</h3>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Detail Pesanan</h1>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">

                        <div class="col-md-7">
                                <div class="row align-items-center mb-1">
                                    <label class="col-sm-4 col-form-label">No. Order</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= $order['order_number']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-1">
                                    <label class="col-sm-4 col-form-label">Metode pembayaran</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= $order['payment_method']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-1">
                                    <label class="col-sm-4 col-form-label">Nama Penerima</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= $order['name']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-1">
                                    <label class="col-sm-4 col-form-label">Jumlah Barang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= count($order['items']); ?>" disabled>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-1">
                                    <label class="col-sm-4 col-form-label">Tanggal Order</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= $order['order_date']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-1">
                                    <label class="col-sm-4 col-form-label">Total Bayar</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= "Rp ".number_format($order['total_amount']+$order['kode_unik']+$order['ongkir'], 0, ".", "."); ?>" disabled>
                                    </div>
                                </div>
                                <div class="row align-items-start mb-3">
                                    <label class="col-sm-4 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="5" disabled><?= $order['address']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php if($order['payment_method'] == "transfer" && isset($order['foto'])): ?>
                                <div class="col-md-5 text-center">
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-bold mt-2">Bukti Transfer</h6>
                                        <button class="p-2 badge badge-primary fs-6" data-bs-toggle="modal" data-bs-target="#buktiPembayaran">Lihat</button>
                                    </div>
                                    
                                    <div class="row align-items-center text-start mt-4">
                                        <label class="col-sm-4 col-form-label">Atas Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= $order['atas_nama']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row align-items-center text-start">
                                        <label class="col-sm-4 col-form-label">Bank</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= $order['bank_name']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row align-items-center text-start">
                                        <label class="col-sm-4 col-form-label">No Rekening</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm fw-bold text-uppercase" value="<?= $order['no_rekening']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="text-end">
                                <!-- <button class="p-2 badge badge-black mb-4 fs-6"><i class="fas fa-print"></i> Cetak Invoice</button> -->
                            </div>
                        </div>
                        <hr>
                        <h6 class="fw-bold mt-4">Rincian Barang</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama Barang</th>
                                        <th>Sisa Stock</th>
                                        <th>Kuantitas</th>
                                        <th>Harga</th>
                                        <th>sub total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $totals = 0;
                                    foreach($order['items'] as $item): ?>
                                        <tr>
                                            <td>
                                                <?php if($item['foto']): ?>
                                                    <img src="<?= base_url('assets/img/products/').$item['foto']; ?>" alt="" width="50">
                                                <?php else: ?>
                                                    <img src="<?= base_url('assets/img/no_image.jpg'); ?>" alt="" width="50">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $item['product_name']; ?></td>
                                            <td><?= $item['stock']; ?></td>
                                            <td><?= $item['qty']; ?></td>
                                            <td><?= 'Rp '.number_format($item['product_price'], 0, ".", "."); ?></td>
                                            <td>
                                                <?php 
                                                    $total = $item['product_price']*$item['qty'];
                                                    $totals += $total;
                                                    echo 'Rp '.number_format($total, 0, ".", ".");
                                                ?>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php if($order['payment_method'] == "transfer" && isset($order['foto'])): ?>
    <div class="modal fade" id="buktiPembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Bukti pembayaran</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <img src="<?= base_url('assets/img/bukti_transfer/'.$order['foto']) ?>" alt="" srcset="" class="w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-black" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>
