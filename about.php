<?php

session_start();

if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Bạn đã đăng nhập rồi!";
    header('Location: index.php');
    exit();
}

include('includes/header.php');
?>
<main role="main" class="mb-2">


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="image-overlay">
                    <img src="https://nhaxinh.com/wp-content/uploads/2021/11/nha-xinh-gioi-thieu-chat-luong-251121.jpg"
                        alt="Background Image">
                    <div class="overlay-text">
                        <h1>Welcome to Nội thất Việt</h1>
                        <p>Chào bạn đã đến với chúng tôi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Block content -->
    <div class="container mt-2">
        <h1 class="text-center">Giá trị và sự khác biệt</h1>
        <hr>
        <div class="row">
            <div class="col col-md-12">
                <h5 class="text-center">Ra đời từ ý tưởng tạo nên sự khác biệt, Nội Thất Việt đã giữ vững và phát triển
                    trở thành vị trí hàng đầu trong thị trường nội thất Việt Nam. Đến nay, Nội thất việt đã có nhiều cửa
                    hàng quy mô và chuyên nghiệp tại các thành phố lớn là Hà Nội và TP.HCM, Bình Dương.</h5>
                <p class="text-center">Với mong muốn phát triển thương hiệu Việt bằng nội lực, Nhà Xinh đã chú trọng vào
                    thiết kế và sản xuất nội thất trong nước. Danh mục sản phẩm của Nội thất việt thường xuyên được đổi
                    mới và cập nhật, liên tục cung cấp cho khách hàng các dòng sản phẩm theo xu hướng mới nhất. Do chính
                    người Việt thiết kế và sản xuất, nội thất thương hiệu Nội thất việt luôn phù hợp với cuộc sống Á
                    Đông, đem đến sự tiện nghi hoàn hảo trong mọi không gian sống.</p>
                <div class="text-center">
                    <a href="index.php" class="btn btn-primary btn-lg">Ghé thăm Bán Nội Thất <i class="fa fa-forward"
                            aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-md-12">
                <h1 class="tieu-de">Chúng tôi ở đây!</h1>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-md-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.144156203481!2d105.95923487484932!3d10.2499553898686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a82ce95555555%3A0x451cc8d95d6039f8!2sVinh%20Long%20University%20Of%20Technology%20Education!5e0!3m2!1sen!2s!4v1698165527214!5m2!1sen!2s"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End block content -->
</main>
<?php include('includes/footer.php'); ?>