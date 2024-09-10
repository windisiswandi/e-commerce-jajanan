<div class="container">
    <div class="page-inner">
        <?= $this->session->userdata("success"); ?>
        <?php $this->session->unset_userdata("success"); ?>
        <div class="page-header">
            <h3 class="fw-bold mb-3">Pengaturan</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="p-3">
                        <ul id="navMenu" class="nav nav-tabs">
                            <li class="nav-item" style="cursor: pointer;">
                                <a class="nav-link active" data-status="akun_bank" onclick="pengaturan(this)">Akun Bank</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer;">
                                <a class="nav-link" data-status="kontak" onclick="pengaturan(this)">Kontak</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form id="formPengaturan" method="post" action="<?= base_url('dashboard/simpan_pengaturan/'.$data_pengaturan->id); ?>">
                            <div data-status="akun_bank" class="box-pengaturan">
                                <div class="row align-items-center mb-2">
                                    <label class="col-sm-4 col-form-label">Nama Bank</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control" name="nama_bank" value="<?= $data_pengaturan->nama_bank; ?>" required>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control" name="no_rek" value="<?= $data_pengaturan->no_rek; ?>" required>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <label class="col-sm-4 col-form-label">Atas Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control" name="atas_nama" value="<?= $data_pengaturan->atas_nama; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div data-status="kontak" class="box-pengaturan d-none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fas fa-phone"></i> Nomor Telp</label>
                                            <input type="number" class="form-control" value="<?= $data_pengaturan->nomor_telp; ?>" name="nomor_telp" placeholder="Masukan nomor telepone" required>
                                            <?= form_error("product_name", '<small class="text-danger ml-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fab fa-facebook"></i> Facebook link</label>
                                            <input type="text" class="form-control" value="<?= $data_pengaturan->facebook; ?>" name="facebook" placeholder="Tambahkan Link" required>
                                            <?= form_error("product_name", '<small class="text-danger ml-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fab fa-whatsapp"></i> Whatsapp</label>
                                            <input type="text" class="form-control" value="<?= $data_pengaturan->wa; ?>" name="wa" placeholder="Nomor Whatsapp" required>
                                            <?= form_error("product_name", '<small class="text-danger ml-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fab fa-instagram"></i> Instagram link</label>
                                            <input type="text" class="form-control" value="<?= $data_pengaturan->instagram; ?>" name="instagram" placeholder="Tambahkan Link" required>
                                            <?= form_error("product_name", '<small class="text-danger ml-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fab fa-twitter"></i> Twitter link</label>
                                            <input type="text" class="form-control" value="<?= $data_pengaturan->twitter; ?>" name="twitter" placeholder="Tambahkan Link" required>
                                            <?= form_error("product_name", '<small class="text-danger ml-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fas fa-envelope"></i> Email link</label>
                                            <input type="text" class="form-control" value="<?= $data_pengaturan->email; ?>" name="email" placeholder="Tambahkan Link" required>
                                            <?= form_error("product_name", '<small class="text-danger ml-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary py-2 px-3 mt-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function pengaturan(data) 
    {
        $('#navMenu li a').each(function (i, li) {
            if($(li).data('status') == $(data).data('status')) $(li).addClass('active')
            else $(li).removeClass('active')
        })

        $('.box-pengaturan').each(function(i, div) {
            if($(div).data('status') == $(data).data('status')) $(div).removeClass('d-none')
            else $(div).addClass('d-none')
        })

    }
</script>
