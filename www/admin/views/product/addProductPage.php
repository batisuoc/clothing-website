<div class="container" id="add-product-form">
    <form action="insertProduct" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="product_name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="product_name" placeholder="Tên sản phẩm" name="product_name">
        </div>
        <div class="form-group">
            <label for="product_type">Loại sản phẩm</label>
            <select class="form-control" id="product_type" name="product_type">
                <option value="1">Áo</option>
                <option value="2">Quần</option>
                <option value="3">Váy / Đầm</option>
            </select>
        </div>
        <div class="form-group">
            <label for="calc_unit">Đơn vị tính</label>
            <input type="text" class="form-control" id="calc_unit" placeholder="Đơn vị tính" name="calc_unit">
        </div>
        <div class="form-group">
            <label>Size ( Kích cỡ ) : </label>
            <!-- Default inline 1-->
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="product_size[]" id="size-s" value="1">
                <label class="custom-control-label" for="size-s">S</label>
            </div>
            <!-- Default inline 2-->
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="product_size[]" id="size-m" value="2">
                <label class="custom-control-label" for="size-m">M</label>
            </div>
            <!-- Default inline 3-->
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="product_size[]" id="size-l" value="3">
                <label class="custom-control-label" for="size-l">L</label>
            </div>
            <!-- Default inline 3-->
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="product_size[]" id="size-xl" value="4">
                <label class="custom-control-label" for="size-xl">XL</label>
            </div>
            <!-- Default inline 3-->
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="product_size[]" id="size-xxl" value="5">
                <label class="custom-control-label" for="size-xxl">XXL</label>
            </div>
        </div>
        <div class="form-group">
            <label for="product_prize">Giá / Một đơn vị tính</label>
            <input type="number" class="form-control" id="product_prize" placeholder="Giá / Một đơn vị tính" name="product_prize">
        </div>
        <div class="form-group">
            <label for="product_amount">Số lượng</label>
            <input type="number" class="form-control" id="product_amount" placeholder="Số lượng" name="product_amount">
        </div>
        <div class="form-group">
            <label for="product_descript">Mô tả</label>
            <textarea class="form-control" id="product_descript" name="product_descript" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="product_image_link">Hình ảnh</label>
            <input type="file" class="form-control-file" id="product_image_link" name="product_image_link">
        </div>
        <div style="text-align: center;">
            <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </div>

    </form>
</div>