<?php
// session_start();
include('function/userfunctions.php');
include('includes/header.php');

include('authenticate.php');

// include('function/handlecart.php') ?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white ">
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="cart.php">
                Thanh Toán
            </a>
        </h6>
    </div>
</div>



<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="function/placeorder.php" method="POST">
                    <div id="message"></div>
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Vận chuyển</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Họ và tên</label>
                                    <input type="text" name="name" required placeholder="Nhập tên..."
                                        class="form-control">
                                </div>
                                <div class="col-md-7 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" required placeholder="Nhập email..."
                                        class="form-control">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label class="fw-bold">Số điện thoại</label>
                                    <input type="number" name="phone" required placeholder="Nhập SĐT..."
                                        class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Địa chỉ</label>
                                    <textarea type="text" name="address" rows="6" required placeholder="Nhập địa chỉ..."
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Sản phẩm mua</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <label style="font-weight: bold;">Ảnh</label>
                                </div>
                                <div class="col-md-5">
                                    <label style="font-weight: bold;">Tên</label>
                                </div>
                                <div class="col-md-2">
                                    <label style="font-weight: bold;">SL</label>
                                </div>
                                <div class="col-md-3">
                                    <label style="font-weight: bold;">Giá</label>
                                </div>
                            </div>
                            <?php
                            $items = getCartItems();
                            $totalPrice = 0;
                            foreach ($items as $citem) {
                                ?>
                                <div class="card product_data shadow mb-2">
                                    <div class="row align-items-center mt-3">
                                        <div class="col-md-2">
                                            <img class="mb-3 " src="uploads/<?= $citem['image'] ?>" alt="image" width="40px"
                                                height="50px" style="margin-left : 1rem;">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="">
                                                <?= $citem['productName'] ?>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">X
                                                <?= $citem['prod_qty'] ?>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">
                                                <?= $citem['price'] ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <?php
                                $totalPrice += $citem['price'] * $citem['prod_qty'];
                            }
                            ?>
                            <h5 style="font-weight: bold;"> Tổng giá: <span class="float-end">
                                    <?= $totalPrice ?> VNĐ
                                </span>
                            </h5>
                            <div class="">
                                <input type="hidden" value="Thanh toán khi nhận hàng" name="payment_mode">
                                <button type="submit" name="placeOrderBtn"
                                    class="btn btn-outline-info w-100 fw-bold">Thanh toán khi nhận hàng</button>
                            </div>


                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>