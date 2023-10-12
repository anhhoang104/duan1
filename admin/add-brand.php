<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thêm thương hiệu sản phẩm</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Tên thương hiệu</label>
                                <input type="text" class="form-control mb-2" name="name"
                                    placeholder="Nhập vào tên danh mục...">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_brand_btn"> Lưu</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>