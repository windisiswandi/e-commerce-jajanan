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
    
    <script src="<?= base_url('assets/vendor/slick/slick.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/iziToast/js/iziToast.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/carousel-custome.js') ?>"></script>
    <script>
        AOS.init()

        $("#userMenu").on('click', function() {
            var childDivs = $(this).find('div');
            childDivs.toggleClass('invisible');
        })

        $('#formProfile').on('submit', function(e) {
            e.preventDefault();
            const submit = $("#formProfile button[type='submit']")
            submit.html("Processing...")
            try {   
                $.ajax({
                    url: `<?= base_url('user/update') ?>`, // Replace with your server upload URL
                    type: 'POST',
                    data: new FormData(this),
                    processData: false, // Prevent jQuery from automatically transforming the data into a query string
                    contentType: false,  // Tell jQuery not to set the content type
                    success: function (response) {
                        response = JSON.parse(response)
                        if (response.status) {
                            iziToast.success({
                                title: 'OK',
                                message: response.msg,
                                position: "topRight",
                                timeout: 1000,
                                onClosed: function () {
                                    window.location.reload();
                                }
                            });

                        }else {
                            iziToast.error({
                                title: 'Error!',
                                message: response.msg,
                                position: "topRight"
                            });
                        }
                        submit.html("Submit")

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        iziToast.error({
                            title: 'Error!',
                            position: "topRight"
                        });
                        console.log(textStatus, errorThrown);
                        submit.html("Submit")
                    }
                });
            } catch (error) {
                iziToast.error({
                    title: 'Error!',
                    position: "topRight"
                });
                console.log(error)
                submit.html("Submit")
            }

        })

        function addToCart(data) {
            <?php if($this->session->userdata('username')) : ?>
                <?php if($this->session->userdata('role') == "user"): ?>
                const id_product = $(data).data('id')
                $.ajax({
                    url: `<?= base_url('cart/add') ?>`,
                    type: 'POST',
                    data: {id_product},
                    success: (response) => {
                        iziToast.success({
                            title: 'OK',
                            message: "Product berhasil ditambahkan!",
                            timeout: 2000,
                            position: "topRight",
                        });
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        iziToast.error({
                            title: 'Error!',
                            position: "topRight"
                        });
                        console.log(textStatus, errorThrown);
                    }
                })
                <?php endif; ?>
            <?php else: ?>
                window.location.href = "<?= base_url('auth/user_login') ?>"
            <?php endif; ?>
        }

        function add_qty(e, data) 
        {
            if(e.keyCode == 13) {
                const qty = $(data).val() == 0 ? 1 : $(data).val();
                const id_product = $(data).data('product');
                console.log({id_product, qty})
                $.ajax({
                    url: `<?= base_url('cart/api_add/') ?>`, // Replace with your server upload URL
                    type: 'POST',
                    data: {id_product, qty},
                    success: function (response) {
                        $("#cartItem").html(response)
                        iziToast.success({
                            title: 'OK',
                            position: "topRight",
                            timeout: 1000,
                        });

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        iziToast.error({
                            title: 'Error!',
                            position: "topRight"
                        });
                        console.log(textStatus, errorThrown);
                    }
                });
            } 
        }

        function remItemCart(data)
        {
            const cart_id = $(data).data('id')
            $.ajax({
                url: `<?= base_url('cart/remove_item_cart/') ?>${cart_id}`, // Replace with your server upload URL
                type: 'POST',
                success: function (response) {
                    $("#cartItem").html(response)

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    iziToast.error({
                        title: 'Error!',
                        position: "topRight"
                    });
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function paymentConfirm(total_amount = '') {
            $('#popup').toggleClass('hidden')
            $('#total_amount').val(total_amount)
        }

<?php if($this->session->userdata('username')) : ?>
        setInterval(() => {
            fetch("<?= base_url('cart/api_get') ?>")
                .then(res => res.json())
                .then(res => $("#alertCart").html(res))
                .catch(err => console.log(err))
        }, 1000);
<?php endif; ?>
    </script>
</body>
</html>