<div class="container">
    <div class="page-inner">
        <?= $this->session->userdata("success"); ?>
        <?php $this->session->unset_userdata("success"); ?>
        <div class="page-header">
            <h3 class="fw-bold mb-3">Kategori Produk</h3>
        </div>
        <div class="row">
            <div class="col col-lg-10 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <button data-bs-toggle="modal" data-bs-target="#kategoriForm" class="btn btn-success text-white"><i class="fas fa-plus"></i> Kategori</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($categories as $key => $category): ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $category->category_name; ?></td>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#kategoriFormEdit_<?= $category->id ?>" class="btn btn-primary text-white"><i class="fas fa-edit"></i></button>
                                                <a href="<?= base_url("dashboard/kategori_delete/$category->id"); ?>" class="btn btn-danger text-white" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></a>
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

<!-- modal form tambah -->
<div class="modal fade" id="kategoriForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" placeholder="Masukan Nama Kategori" required>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-black" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
    </form>
  </div>
</div>

<!-- modal edit -->
<?php foreach($categories as $key => $category): ?>
<div class="modal fade" id="kategoriFormEdit_<?= $category->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('dashboard/kategori_update/'.$category->id) ?>" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" name="category_name" value="<?= $category->category_name ?>" id="exampleInputEmail1" placeholder="Masukan Nama Kategori" required>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-black" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
    </form>
  </div>
</div>
<?php endforeach; ?>