<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $brand = getByID("brand", $id);

                if (mysqli_num_rows($brand) > 0) {
                  
                        $data = mysqli_fetch_array($brand);
                        ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Sửa thương hiệu</h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="brand_id" value="<?= $data['id'] ?>">
                                        <label for="">Tên thương hiệu</label>
                                        <input type="text" value="<?= $data['name'] ?>" class="form-control mb-2" name="name"
                                            placeholder="Nhập vào tên danh mục...">
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="edit_brand_btn"> Lưu</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                }


            } else {
                echo "id không tồn tại!";
            }
            ?>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>