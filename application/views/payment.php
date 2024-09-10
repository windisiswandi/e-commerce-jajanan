<style>
    #content table, #content th, #content td {
        border-bottom: 1px solid #cbd5e1;
        padding: 10px 15px;
        border-collapse: collapse;
    }
</style>
<div class="xl:container px-4 sm:px-8 py-5">
    <?php if($this->session->userdata('errorFile')) : ?>
        <div id="alertku" class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded relative my-3" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline"><?= $this->session->userdata('errorFile'); ?></span>
            <span onclick="closeAlert()" id="close" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 010 1.414L11.414 10l2.934 2.934a1 1 0 01-1.414 1.414L10 11.414l-2.934 2.934a1 1 0 01-1.414-1.414L8.586 10 5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.934a1 1 0 011.414 0z"/></svg>
            </span>
        </div>
    <?php endif; ?>
    <?php $this->session->unset_userdata('errorFile'); ?>
    <div class="flex flex-col md:flex-row items-start justify-center space-y-4 md:space-y-0 md:space-x-3">
        <div class="w-full md:w-1/2">
            <div id="content" class="bg-white rounded-md w-full">
                <header class="bg-blue-500 p-3 text-white">No Rekening Toko</header>
                <div class="p-5">
                    <p class=" text-slate-400 text-sm">Silahkan transfer uang ke no rekening dibawah sebesar :</p>
                    <h1 class="text-3xl font-bold text-black"><?= "Rp".number_format($order->total_amount+$order->ongkir+$order->kode_unik, 0, ".", "."); ?></h1>
                    <table class="table-auto w-full text-sm p-4 mt-5">
                        <thead class="font-bold">
                            <tr>
                                <td>Bank</td>
                                <td>No Rekening</td>
                                <td>Atas Nama</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $data_pengaturan->nama_bank; ?></td>
                                <td><?= $data_pengaturan->no_rek; ?></td>
                                <td><?= $data_pengaturan->atas_nama; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2">
        <div class="bg-white rounded-md w-full">
                <header class="bg-blue-500 p-3 text-white">Upload Bukti Pembayaran</header>
                <div class="p-5">
                    <form action="<?= base_url('order/payment/'.$order->id) ?>" method="post" enctype="multipart/form-data">
                        <?php if(@$dataPayment) : ?>
                            <input type="hidden" name="data_payment" value="true">
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="bank" class="font-bold text-sm">Atas Nama</label>
                            <input type="text" name="atas_nama" value="<?= @$dataPayment ? $dataPayment->atas_nama : '' ?>" placeholder="Atas nama akun bank yang digunakan" class="text-sm w-full rounded focus:outline-none p-2 mt-2 border border-slate-300" required>
                        </div>
                        <div class="mb-3">
                            <label for="bank" class="font-bold text-sm">Nama Bank</label>
                            <input type="text" name="bank_name" value="<?= @$dataPayment ? $dataPayment->bank_name : '' ?>" placeholder="Masukan nama bank" class="text-sm w-full rounded focus:outline-none p-2 mt-2 border border-slate-300" required>
                        </div>
                        <div class="mb-3">
                            <label for="bank" class="font-bold text-sm">No Rekening</label>
                            <input type="text" name="no_rekening" value="<?= @$dataPayment ? $dataPayment->no_rekening : '' ?>" placeholder="Masukan No rekening" class="text-sm w-full rounded focus:outline-none p-2 mt-2 border border-slate-300" required>
                        </div>
                        <div class="mb-3">
                            <label for="bank" class="font-bold text-sm">Bukti bayar</label>
                            <input type="file" name="bukti_transfer" placeholder="Masukan No rekening" class="text-sm w-full rounded focus:outline-none p-1 mt-2 border border-slate-300" accept="image/*" require>
                        </div>

                        <a href="<?= base_url('user/orders') ?>" class="bg-gray-500 text-white px-4 py-2 text-sm rounded">back</a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 text-sm rounded">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function orderStatus(data) {
        $('#menu-order li').each(function (i, li) {
            if($(li).data('status') == $(data).data('status')) $(li).addClass('text-blue-500 font-semibold')
            else $(li).removeClass('text-blue-500 font-semibold')
        })

        $('.order-list').each(function(i, div) {
            if($(div).data('status') == $(data).data('status')) $(div).removeClass('hidden')
            else $(div).addClass('hidden')
        })

    }
</script>