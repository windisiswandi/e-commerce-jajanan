<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Produk</div>
                    </div>
                    <div class="card-body">
                        <?php if($this->session->userdata('errorFile')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong><?= $this->session->userdata('errorFile'); ?></strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                        <?php endif; ?>
                        <?php $this->session->unset_userdata('errorFile') ?>
                        <form method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?= set_value("product_name") ?>" name="product_name" placeholder="Masukan nama produk" required>
                                        <?= form_error("product_name", '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Kategori Produk</label>
                                        <select class="form-select" aria-label="Default select example" name="category_id" required>
                                            <?php foreach($categories as $key => $category): ?>
                                                <option value="<?= $category->id; ?>"><?= $category->category_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">stock</label>
                                        <input type="number" class="form-control" value="<?= set_value("stock") ?>" id="stock" name="stock" placeholder="Masukan stock produk" required>
                                        <?= form_error("stock", '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="harga_modal" class="form-label">Harga Modal</label>
                                        <input type="text" class="form-control" onkeyup="changeToIDR(this)" id="product_modal" placeholder="Masukan harga modal" required>
                                        <input type="hidden" name="product_modal">
                                        <?= form_error("product_modal", '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_jual" class="form-label">Harga Jual</label>
                                        <input type="text" class="form-control" onkeyup="changeToIDR(this)" id="product_price" placeholder="Masukan harga jual" required>
                                        <input type="hidden" name="product_price">
                                        <?= form_error("product_price", '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="berat" class="form-label">Berat (g)</label>
                                        <input class="form-control" type="number" id="berat" name="weight" placeholder="Berat produk (gram)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control" type="file" id="formFile" name="foto">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="description" rows="5" placeholder="Masukan deskripsi tentang produk ini" required><?= set_value("description") ?></textarea>
                                <?= form_error("description", '<small class="text-danger ml-3">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('dashboard/products') ?>" class="btn btn-black">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>