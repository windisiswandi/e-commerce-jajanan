<div class="container">
    <div class="page-inner">
        <!-- <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Produk</h3>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Data Pelanggan</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>email</th>
                                        <th>Nomor HP</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pelanggans as $key => $pel): ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td>
                                                <?= $pel->name; ?>
                                            </td>
                                            <td><?= $pel->username; ?></td>
                                            <td><?= $pel->email; ?></td>
                                            <td><?= $pel->phone_number; ?></td>
                                            <td><?= $pel->address; ?></td>
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
