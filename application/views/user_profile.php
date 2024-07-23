<div class="xl:container px-4 sm:px-8 py-5">
    <div class="flex justify-between items-start flex-col lg:flex-row">
        <div class="w-full lg:w-1/5 px-4 flex items-center lg:block">
            <div class="flex items-center space-x-2 pr-6 lg:p-6 border-r border-b-0 lg:border-b lg:border-r-0 border-gray-300">
                <?php if($user->foto) : ?>
                    <img src="<?= base_url('assets/img/users/'.$user->foto) ?>" class="w-7 h-7 sm:w-10 sm:h-10 rounded-full">
                <?php else: ?>
                    <i class="fa-regular fa-circle-user text-lg sm:text-3xl text-gray-400"></i>
                <?php endif; ?>
                <span class="font-bold text-sm lg:text-lg"><?= $user->username; ?></span>
            </div>
            <ul class="mt-0 lg:mt-5 flex space-x-4 lg:space-x-0 px-4 lg:px-0 lg:block">
                <li class="text-blue-500 text-sm lg:text-base"><a href="<?= base_url('user/profile') ?>">Profil</a></li>
                <li class="text-sm lg:text-base"><a href="<?= base_url('user/change_password') ?>">Ubah Password</a></li>
            </ul>
        </div>
        <div class="w-full lg:w-4/5 mt-5 lg:mt-0">
            <div class="p-6 bg-white">
                <header class="pb-3 lg:pb-6 border-b border-b-gray-300">
                    <h1 class="text-lg lg:text-xl font-bold">Profile Saya</h1>
                </header>
                <form id="formProfile" class="mt-5 sm:flex items-start sm:space-x-5" enctype="multipart/form-data"> 
                    <input type="hidden" name="old_foto" value="<?= $user->foto; ?>">
                    <input type="file" class="hidden" id="fileInput" name="foto" accept="image/*">
                    <div class="text-center flex sm:hidden items-center flex-col space-x-3">
                        <?php if($user->foto) : ?>
                            <img src="<?= base_url('assets/img/users/'.$user->foto) ?>" class="w-[150px] h-[150px] rounded-full">
                        <?php else: ?>
                            <img src="<?= base_url('assets/img/no_image.jpg') ?>" class="w-[200px] h-[200px] rounded-full">
                        <?php endif; ?>
                        <label for="fileInput" class="inline-block px-4 py-2 border mt-3 border-slate-400 text-sm uppercase rounded cursor-pointer">
                            Pilih Gambar
                        </label>
                    </div>
                    <table class="w-full sm:w-3/4 text-[12px] md:text-base mt-10 sm:mt-0">
                        <tr>
                            <td class="py-4">Nama</td>
                            <td>
                                <input type="text" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" name="name" value="<?= $user->name; ?>" placeholder="Masukan Nama" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">Email</td>
                            <td>
                                <input type="email" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" name="email" value="<?= $user->email; ?>" placeholder="Ubah email" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">Nomor HP / WA</td>
                            <td>
                                <input type="number" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" name="phone_number" placeholder="Ubah email" value="<?= $user->phone_number; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">Jenis Kelamin</td>
                            <td>
                                <div class="mt-2 flex space-x-4">
                                    <div class="flex items-center">
                                        <input <?= $user->jk == 'L' ? 'checked':''; ?> type="radio" name="jk" id="male" value="L" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="male" class="ml-2 block text-sm text-gray-900">Laki-laki</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input <?= $user->jk == 'P' ? 'checked':''; ?> type="radio" name="jk" id="female" value="P" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="female" class="ml-2 block text-sm text-gray-900">Perempuan</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">Alamat</td>
                            <td>
                                <textarea name="address" id="alamat" class="text-sm focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" rows="4" placeholder="Nama Jalan, Gedung, No.Rumah
(Detail Lainnya, cth: Blok / Unit No., Patokan)
Kecamatan, Kota, Provinsi, Kode Pos" required><?= $user->address; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4"></td>
                            <td>
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                                    Submit
                                </button>
                            </td>
                        </tr>
                        
                    </table>
                    <div class="text-center hidden sm:flex flex-col items-center">
                        <?php if($user->foto) : ?>
                            <img src="<?= base_url('assets/img/users/'.$user->foto) ?>" class="max-w-[200px] max-h-[200px]">
                        <?php else: ?>
                            <img src="<?= base_url('assets/img/no_image.jpg') ?>" class=" max-w-[200px] max-h-[200px]">
                        <?php endif; ?>
                        <label for="fileInput" class="inline-block px-4 py-2 border mt-3 border-slate-400 text-sm uppercase rounded cursor-pointer">
                            Pilih Gambar
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>