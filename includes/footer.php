<div class="py-5" style="background-color: #E5E5E5;">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h4 class="text-danger fw-bold">NoiThatViet</h4>
                <div class="underline mb-2"></div>

                <a href="index.php" class="text-dark"><i class="fa fa-angle-right"> Trang chủ</i></a><br>
                <a href="category.php" class="text-dark"><i class="fa fa-angle-right"> Danh mục</i></a><br>
                <a href="regiser.php" class="text-dark"><i class="fa fa-angle-right"> Đăng ký</i></a><br>
                <a href="login.php" class="text-dark"><i class="fa fa-angle-right"> Đăng nhập</i></a>

            </div>
            <div class="col-md-2 text-white">
                <h4 class="text-danger fw-bold">Địa chỉ</h4>
                <div class="underline mb-2"></div>
                <p class="text-dark"> To 9 - Ap 4 - Tan Thanh - Cai Be - Tien Giang - Viet Nam</p>
                <a href="+84 372432119"><i class="fa fa-phone"></i> +84 372432119</a><br>
                <a href="noithatviet@hotro.com"><i class="fa fa-envelope"></i> noithatviet@hotro.com</a>
            </div>
            <div class="col-md-4">
                <h4 class="text-danger fw-bold">Địa chỉ</h4>
                <div class="underline mb-2"></div>
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
            </div>
            <div class="col-md-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.144156203481!2d105.95923487484932!3d10.2499553898686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a82ce95555555%3A0x451cc8d95d6039f8!2sVinh%20Long%20University%20Of%20Technology%20Education!5e0!3m2!1sen!2s!4v1698165527214!5m2!1sen!2s"
                    class="w-100 " height="250" style="border:0; " allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


<script>

    <?php
    if (isset($_SESSION['message'])) {
        ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?= $_SESSION['message'] ?>');
        <?php
        unset($_SESSION['message']);
    } ?>
</script>


</body>

</html>