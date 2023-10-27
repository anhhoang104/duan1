<?php
// session_start();
include('function/userfunctions.php');
include('includes/header.php');

include('authenticate.php');



// include('function/handlecart.php') ?>


<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="function/placeorder.php" method="POST">
                    <div id="message"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Thông tin tài khoản</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="fw-bold">Tên </label>
                                    <div class="border p-1">
                                        <!-- <?= $data['name'] ?> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-bold">Email </label>
                                    <div class="border p-1">
                                        <!-- <?= $data['email'] ?> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-bold">Số điện thoại </label>
                                    <div class="border p-1">
                                        <!-- <?= $data['phone'] ?> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-bold">Ngày tạo tài khoản</label>
                                    <div class="border p-1">
                                     
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="">
                        <input type="hidden" value="Thanh toán khi nhận hàng" name="payment_mode">
                        <button type="submit" name="placeOrderBtn" class="btn btn-outline-info w-100 fw-bold">Thanh toán
                            khi nhận hàng</button>


                    </div>


            </div>

        </div>
        </form>
    </div>
</div>
</div>
</div>


<?php include('includes/footer.php'); ?>