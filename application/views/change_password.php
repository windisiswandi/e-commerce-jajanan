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
                <li class=" text-sm lg:text-base"><a href="<?= base_url('user/profile') ?>">Profil</a></li>
                <li class="text-blue-500 text-sm lg:text-base"><a href="<?= base_url('user/change_password') ?>">Ubah Password</a></li>
            </ul>
        </div>
        <div class="w-full lg:w-4/5 mt-5 lg:mt-0">
            <div class="p-6 bg-white">
                <header class="pb-6 border-b border-b-gray-300">
                    <h1 class="text-lg lg:text-xl font-bold">Ubah Password</h1>
                </header>
                <?php if($this->session->userdata("success")) : ?>
                    <div class="text-green-800 px-5 py-2 rounded-lg bg-green-300 font-semibold mt-3"><?= $this->session->userdata("success"); ?></div>
                <?php endif; ?>
                <?php $this->session->unset_userdata("success"); ?>
                <form id="formUbahPassword" class="mt-5" method="post">
                    <?= form_error("pasconf", '<small class="text-red-600">', '</small>'); ?>
                    <table class="w-full md:w-3/4 mb-8 text-[12px] md:text-base mt-10 sm:mt-0">
                        <tr>
                            <td class="py-4">Password Baru</td>
                            <td>
                                <input type="password" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" name="password"  placeholder="Masukan Password Baru" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-5">Konfirmasi Password</td>
                            <td>
                                <input type="password" class="focus:border-blue-300 focus:outline-none w-full p-2 border-2 border-gray-300 rounded mt-1" name="pasconf"  placeholder="Konfirmasi Password" required>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class=" inline-block px-4 py-2 bg-blue-500 text-white rounded">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>