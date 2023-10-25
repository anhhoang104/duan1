<?php
// session_start();
include('function/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-danger fw-bold">Sản phẩm nổi bật</h4>
                <div class="underline mb-3"></div>
                <div class="owl-carousel">
                    <?php
                    $trendingProduct = getAllTrending();
                    if (mysqli_num_rows($trendingProduct) > 0) {
                        foreach ($trendingProduct as $item) {
                            ?>
                            <div class="item">
                                <a href="product-view.php?productid=<?= $item['id'] ?>">

                                    <div class="card shadow category-card">
                                        <div class="card-body">

                                            <img src="uploads/<?= $item['image'] ?>" alt="" class="w-100"
                                                style='height: 160px;'>
                                            <h5>
                                                <?= $item['productName']; ?>

                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-danger fw-bold">Thông tin </h4>
                <div class="underline mb-2"></div>
                <p>Thành lập ngày 07/08/1998, Nội thất Việt là thương hiệu uy tín hàng đầu Việt Nam trong lĩnh vực
                    kinh doanh các sản phẩm nội thất chất lượng cao, nhập khẩu chính hãng từ Châu Âu, Châu Á và các sản
                    phẩm sản xuất tại Nhà máy quy mô 15.000m2 của Hoàn Mỹ.</p>

                <p>Xuyên suốt chặng đường hình thành và phát triển, Nội thất Hoàn Mỹ đã góp phần kiến tạo hàng triệu tổ
                    ấm gia đình. Với chúng tôi, nhà không đơn thuần chỉ là nơi để ở, mà quan trọng hơn, đó là nơi tận
                    hưởng cuộc sống, thể hiện cái “TÔI” của mỗi con người. <br>
                    Nội thất Hoàn Mỹ đề cao tính thẩm mĩ cũng như giá trị sử dụng trong từng sản phẩm, chinh phục khách
                    hàng bằng chất lượng hoàn hảo, giá cả cạnh tranh cùng dịch vụ chuyên nghiệp.</p>



            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-danger fw-bold">NoiThatViet</h4>
                <div class="underline mb-2"></div>

                <a href="index.php" class="text-white"><i class="fa fa-angle-right"> Trang chủ</i></a><br>
                <a href="category.php" class="text-white"><i class="fa fa-angle-right"> Danh mục</i></a><br>
                <a href="regiser.php" class="text-white"><i class="fa fa-angle-right"> Đăng ký</i></a><br>
                <a href="login.php" class="text-white"><i class="fa fa-angle-right"> Đăng nhập</i></a>

            </div>
            <div class="col-md-3 text-white">
                <h4 class="text-danger fw-bold">Địa chỉ</h4>
                <div class="underline mb-2"></div>
                <p> To 9 - Ap 4 - Tan Thanh - Cai Be - Tien Giang - Viet Nam</p>
                <a href="+84 372432119"><i class="fa fa-phone"></i> +84 372432119</a><br>
                <a href="noithatviet@hotro.com"><i class="fa fa-envelope"></i> noithatviet@hotro.com</a>
            </div>
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.144156203481!2d105.95923487484932!3d10.2499553898686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a82ce95555555%3A0x451cc8d95d6039f8!2sVinh%20Long%20University%20Of%20Technology%20Education!5e0!3m2!1sen!2s!4v1698165527214!5m2!1sen!2s"
                    class="w-100 " height="250" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>