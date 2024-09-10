<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- tailwindcss -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- fontawesome -->
    <link href="<?= base_url('assets/vendor/fontawesome6/css/all.min.css'); ?>" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body class="bg-slate-100">
    <header class="bg-white sticky top-0 z-10">
        <nav class="px-4 sm:px-8 py-5 xl:container">
            <div class="flex items-baseline">
                <a href="<?= base_url('/') ?>" class="text-lg font-bold sm:text-2xl sm:block text-blue-500">
                    <i class="fa-solid fa-bag-shopping text-4xl"></i> TOKO JAJANAN LOMBOK
                </a>
                <span class="ml-3 text-lg sm:text-2xl">Daftar</span>
            </div>
        </nav>
    </header>

    <div class="py-8 sm:py-16 bg-blue-500">
        <div class="xl:container px-4 sm:px-8 flex items-center justify-center">
            <div class="w-1/2 px-16 hidden md:block">
                <div class="text-white text-center">
                    <i class="fa-solid fa-bag-shopping text-[150px]"></i>
                </div>
                <p class="text-white text-2xl mt-5 text-center px-5">Tempat Belanja Jajanan Khas Lombok Termurah Di Indonesia</p>
            </div>
            <div class="w-full lg:w-1/2 md:px-16">
                <form class="bg-white rounded p-8 w-full" action="<?= base_url('Auth/user_register') ?>" method="post">
                    <h1 class="text-lg sm:text-xl">Daftar</h1>
                    <ul>
                        <li><?= form_error("email", '<small class="text-red-600">', '</small>'); ?></li>
                        <li><?= form_error("password", '<small class="text-red-600">', '</small>'); ?></li>
                        <li><?= form_error("pasconf", '<small class="text-red-600">', '</small>'); ?></li>
                    </ul>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-3 mb-3">
                        <div>
                            <input type="text" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" value="<?= set_value("first_name") ?>" name="first_name" placeholder="Masukan Nama Depan" required> 
                        </div>
                        <div>
                            <input type="text" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" value="<?= set_value("second_name") ?>" name="second_name" placeholder="Masukan Nama Belakang" required> 
                        </div>
                        <div class="flex border-2 border-gray-300 rounded mt-1">
                            <span class="px-3 py-2 bg-slate-300"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="focus:border-blue-300 focus:outline-none w-full p-2" name="username" value="<?= set_value("username") ?>" placeholder="Masukan Username" required> 
                        </div>
                        <div>
                            <div class="flex border-2 border-gray-300 rounded mt-1">
                                <span class="px-3 py-2 bg-slate-300">@</span>
                                <input type="email" class="focus:border-blue-300 focus:outline-none w-full p-2" name="email" value="<?= set_value("email") ?>" placeholder="Masukan Email" required> 
                            </div>
                            
                        </div>
                        <div class="flex border-2 border-gray-300 rounded mt-1">
                            <span class="px-3 py-2 bg-slate-300"><i class="fa-solid fa-key"></i></span>
                            <input type="password" class="focus:border-blue-300 focus:outline-none w-full p-2" name="password" placeholder="Masukan Password" required> 
                        </div>
                        <div>
                            <div class="flex border-2 border-gray-300 rounded mt-1">
                                <span class="px-3 py-2 bg-slate-300"><i class="fa-solid fa-key"></i></span>
                                <input type="password" class="focus:border-blue-300 focus:outline-none w-full p-2" name="pasconf" placeholder="Ulangi Password" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="mb-3 flex border-2 border-gray-300 rounded mt-1">
                        <span class="px-3 py-2 bg-slate-300"><i class="fa-solid fa-phone"></i></span>
                        <input type="number" class="focus:border-blue-300 focus:outline-none w-full p-2" name="phone_number" value="<?= set_value("phone_number") ?>" placeholder="Cth: +6287334313238" required> 
                    </div>
                    <div class="mb-3">
                        <select name="provinsi" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" onchange="changeProvince(this)" required>
                            <option value="">Pilih Provinsi</option>
                            <?php foreach($provinces as $province) : ?>
                                <option value="<?= $province['province_id'].",".$province['province'] ?>"><?= $province['province']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="kota" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1 disabled:cursor-not-allowed disabled:bg-slate-300" required>
                            <option value="">Pilih Kota / Kabupaten</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Masukan Alamat Lengkap</label>
                        <textarea name="address" id="alamat" class="text-sm focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" rows="4" placeholder="Nama Jalan, Gedung, No.Rumah
(Detail Lainnya, cth: Blok / Unit No., Patokan)
Kecamatan, Kota, Provinsi, Kode Pos" required><?= set_value("address") ?></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-5 py-2 text-white rounded-full text-lg mt-5">Register</button>
                        <p class="text-gray-400 mt-4">Sudah punya akun? <a href="<?= base_url("auth/user_login") ?>" class="text-blue-500">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-white">
        <div class="xl:container px-4 sm:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 py-8 sm:py-16">
                <div>
                    <h1 class="font-semibold text-2xl">Toko Jajanan Lombok</h1>
                    <p class="text-gray-500 text-sm mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <div class="space-x-3 text-black font-bold text-xl mt-5">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
                <div>
                    <h1 class="font-semibold text-base">Pembayaran</h1>
                    <div class="text-gray-600 text-sm mt-3 grid grid-cols-5 gap-2">
                        <img src="https://down-id.img.susercontent.com/file/59185c096964e1892e9122ceaae2609d">
                        <img src="https://down-id.img.susercontent.com/file/9a08d3abab3dd059fff945c72ca372d9">
                        <img src="https://down-id.img.susercontent.com/file/0cf8caa250763eefc3d79bb1f8c08e73">
                        <img src="https://down-id.img.susercontent.com/file/id-50009109-8d834dd660b129d1d3c72d22c1cb8867">
                    </div>
                    <h1 class="font-semibold text-base mt-6">Pengiriman</h1>
                    <div class="text-gray-600 text-sm mt-3 grid grid-cols-5 gap-2">
                        <img src="https://down-id.img.susercontent.com/file/5c07836b22c5689d56cb217c88171785">
                    </div>
                </div>
                <div>
                    <h1 class="font-semibold text-base">Menu</h1>
                    <a href="#" class="text-gray-500 mt-3 text-sm block">Tentang Kami</a>
                    <a href="#" class="text-gray-500 mt-3 text-sm block">Hubungi Kami</a>
                </div>
                <div>
                    <h1 class="font-semibold text-base">Punya Pertanyaan?</h1>
                    <table class="mt-3 space-y-4">
                        <tr>
                            <td class="pr-4"><i class="fa-solid fa-location-dot" class="font-bold"></i></td>
                            <td><a href="#" class="block text-[12px] text-gray-500">Jl. Melati, Khusus Kota Selong, Kec. Selong, Kabupaten Lombok Timur, Nusa Tenggara Bar. 83618</a></td>
                        </tr>
                        <tr>
                            <td class="pr-4"><i class="fa-brands fa-whatsapp" class="font-bold"></i></td>
                            <td><a href="#" class="block text-[12px] text-gray-500">+62811213456678</a></td>
                        </tr>
                        <tr>
                            <td class="pr-4"><i class="fa-solid fa-envelope" class="font-bold"></i></td>
                            <td><a href="#" class="block text-[12px] text-gray-500">tokojajanan.lombok@gmail.com</a></td>
                        </tr>
                    </table>
                    <!-- <iframe class="w-full mt-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8976.370175897235!2d116.53855345649421!3d-8.659116886004599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcc4f002f414ca9%3A0xf3d932b590e2061f!2sBermis%201%20Selong!5e0!3m2!1sid!2sid!4v1721428911806!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                </div>
            </div>
            <div class="py-5 border-t border-t-gray-300 text-sm sm:text-base text-center">
                Copyright &copy;<script>document.write(new Date().getFullYear())</script> Toko Jajanan Lombok | All right reserve
            </div>
        </div>
    </footer>

    <script>
        function changeProvince(data) {
            const value = $(data).val()
            let id_province = value.split(",");
            $("select[name='kota']").prop("disabled", true)
            $.ajax({
                url: `<?= base_url('auth/get_kota/'); ?>${id_province[0]}`,
                type: "POST",
                success: response => {
                    response = JSON.parse(response);
                    if (response.status) {
                        $("select[name='kota']").html(response.option)
                    }

                    $("select[name='kota']").prop("disabled", false)
                },
                error: err => {
                    console.log(err);
                }
            })
        }
    </script>
</body>
</html>