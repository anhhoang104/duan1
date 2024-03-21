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
                <p>Thành lập ngày 07/08/1998, THỜI TRANG VIỆT là thương hiệu uy tín hàng đầu Việt Nam trong lĩnh vực
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