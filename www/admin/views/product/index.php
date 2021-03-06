<?php
// Ham kiem tra xem no co phai mang da chieu khong 
function is_multi($a)
{
    $rv = array_filter($a, 'is_array');
    if (count($rv) > 0) return true;
    return false;
}

?>

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <div class="container">
            <h3 class="float-left" style="vertical-align: middle;">QUẢN LÝ SẢN PHẨM</h3>
            <a href="product/addProductPage" class="btn btn-primary float-right" style="color: white;">Thêm sản phẩm</a>
        </div>
        <!-- ./ container -->
    </ol>
    <!-- ./ Breadcrumbs-->
    <table class="table" id="list-product">
        <thead>
            <tr>
                <th style="font-size: 20px; vertical-align: middle; text-align: center" scope="col">ID</th>
                <th style="font-size: 20px; vertical-align: middle; text-align: center" scope="col">Picture</th>
                <th style="font-size: 20px; vertical-align: middle; text-align: center" scope="col">Name</th>
                <th style="font-size: 20px; vertical-align: middle; text-align: center" scope="col">Amount</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            <?php if ($this->productList == null) { ?>
                <div>Hiện chưa có sản phẩm nào được thêm vào</div>
            <?php } elseif (!is_multi($this->productList)) { ?>
                <tr>
                    <th style="font-size: 20px; vertical-align: middle; text-align: center" scope="row"><?= $this->productList["product_id"] ?></th>
                    <td><img style="max-height:200px; max-width:200px; overflow: hidden; vertical-align: middle; text-align: center" src="../../public/<?= $this->productList["product_pic"] ?>" /></td>
                    <td style="font-size: 20px; vertical-align: middle; text-align: center"><?= $this->productList["product_name"] ?></td>
                    <td style="font-size: 20px; vertical-align: middle; text-align: center"></td>
                    <td style="vertical-align: middle; text-align: center">
                        <a class="btn btn-primary" href="product/editProductPage/<?= $this->productList["product_id"] ?>">Chỉnh sửa</a>
                        <!-- <button><a href="product/deleteProduct/<?= $this->productList["product_id"] ?>"><img src="<?= PUBLIC_RESOURCES ?>/images/icons/trash-icon.png" width="40px" height="40px" /></a></button> -->
                    </td>
                </tr>
                <?php } else {
                    foreach ($this->productList as $key => $value) { ?>
                    <tr>
                        <th style="font-size: 20px; vertical-align: middle; text-align: center" scope="row"><?= $value["product_id"] ?></th>
                        <td><img style="max-height:200px; max-width:200px; overflow: hidden; vertical-align: middle; text-align: center" src="../../public/<?= $value["product_pic"] ?>" /></td>
                        <td style="font-size: 20px; vertical-align: middle; text-align: center"><?= $value["product_name"] ?></td>
                        <td style="font-size: 20px; vertical-align: middle; text-align: center"><?= $value["product_amount"] ?></td>
                        <td style="vertical-align: middle; text-align: center">
                            <a class="btn btn-primary" href="product/editProductPage/<?= $value["product_id"] ?>">Chỉnh sửa</a>
                            <!-- <button><a href="product/deleteProduct/<?= $value["product_id"] ?>"><img src="<?= PUBLIC_RESOURCES ?>/images/icons/trash-icon.png" width="40px" height="40px" /></a></button> -->
                        </td>
                    </tr>
            <?php }
            }
            ?>



        </tbody>
    </table>
</div>