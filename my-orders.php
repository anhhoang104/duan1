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
            </a class="text-white" href="cart.php">
            Check out
        </h6>
    </div>
</div>



<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div id="message"></div>
            <div class="row">
                <div class="col-md-12">


                </div>

            </div>

        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>