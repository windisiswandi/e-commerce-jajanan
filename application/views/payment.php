<style>
    #content table, #content th, #content td {
        border-bottom: 1px solid #cbd5e1;
        padding: 10px 15px;
        border-collapse: collapse;
    }
</style>
<div class="xl:container px-4 sm:px-8 py-5">
    <div class="flex items-start justify-center space-x-3">
        <div class="w-full lg:w-1/2">
            <div id="content" class="bg-white rounded-md w-full">
                <header class="bg-blue-500 p-3 text-white">No Rekening Toko</header>
                <div class="p-5">
                    <p class=" text-slate-400 text-sm">Silahkan transfer uang ke no rekening dibawah sebesar :</p>
                    <h1 class="text-3xl font-bold text-black"><?= "Rp".number_format($order->total_amount, 0, ".", "."); ?></h1>
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
                                <td>BRI</td>
                                <td>12345678987655</td>
                                <td>Kinta Astarida</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2">
        <div class="bg-white rounded-md w-full">
                <header class="bg-blue-500 p-3 text-white">Upload Bukti Pembayaran</header>
                <div class="p-5">
                    <form action="<?= base_url('order/payment/'.$order->id) ?>" method="post">
                        <div class="mb-3">
                            <label for="bank" class="font-bold text-sm">Atas Nama</label>
                            <input type="text" name="atas_nama" placeholder="Atas nama akun bank yang digunakan" class="text-sm w-full rounded focus:outline-none p-2 mt-2 border border-slate-300" required>
                        </div>
                        <div class="mb-3">
                            <label for="bank" class="font-bold text-sm">Nama Bank</label>
                            <input type="text" name="bank_name" placeholder="Masukan nama bank" class="text-sm w-full rounded focus:outline-none p-2 mt-2 border border-slate-300" required>
                        </div>
                        <div class="mb-3">
                            <label for="bank" class="font-bold text-sm">No Rekening</label>
                            <input type="text" name="no_rekening" placeholder="Masukan No rekening" class="text-sm w-full rounded focus:outline-none p-2 mt-2 border border-slate-300" required>
                        </div>
                        <div class="mb-3">
                            <label for="bank" class="font-bold text-sm">Bukti bayar</label>
                            <input type="file" name="no_rekening" placeholder="Masukan No rekening" class="text-sm w-full rounded focus:outline-none p-1 mt-2 border border-slate-300" accept="image/*" require>
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