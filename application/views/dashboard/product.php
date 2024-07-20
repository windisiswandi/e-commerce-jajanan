<div class="container">
    <div class="page-inner">
        <?= $this->session->userdata("success"); ?>
        <?php $this->session->unset_userdata("success"); ?>
        <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Produk</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('dashboard/product_create') ?>" class="card-title btn btn-success text-white"><i class="fas fa-plus"></i> Produk</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Modal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($products as $key => $product): ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td>
                                                <?php if($product->foto): ?>
                                                <img src="<?= base_url('assets/img/products/'.$product->foto) ?>" width="50">
                                                <?php else: ?>
                                                <img src="<?= base_url('assets/img/no_image.jpg') ?>" width="50">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $product->product_name; ?></td>
                                            <td><?= $product->stock; ?></td>
                                            <td><?= "Rp ".number_format($product->product_price, 0, ',', '.') ?></td>
                                            <td><?= "Rp ".number_format($product->product_modal, 0, ',', '.') ?></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/product_edit/'.$product->id) ?>" class="btn btn-primary text-white"><i class="fas fa-edit"></i></button>
                                                <a href="<?= base_url("dashboard/product_delete/$product->id"); ?>" class="btn btn-danger text-white" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
