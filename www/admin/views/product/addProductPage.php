<div class="container" id="add-product-form">
    <form action="insertProduct" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="product_name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="product_name" placeholder="Tên sản phẩm" name="product_name">
        </div>
        <div class="form-group">
            <label for="product_type">Loại sản phẩm</label>
            <select class="form-control" id="product_type" name="product_type">
                <option value="0">Hãy chọn loại quần áo</option>
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
            <div class="form-inline">
                <!-- Default inline 1-->
                <div class="form-group form-inline">
                    <label for="s-amount" style="margin-right: 5px; margin-left: 30px;">S: </label>
                    <input type="number" class="form-control" id="s-amount" name="size-amount[1]" style="width: 100px;" value="0">
                </div>
                <!-- Default inline 2-->
                <div class="form-group form-inline">
                    <label for="m-amount" style="margin-right: 5px; margin-left: 30px;">M: </label>
                    <input type="number" class="form-control" id="m-amount" name="size-amount[2]" style="width: 100px;" value="0">
                </div>
                <!-- Default inline 3-->
                <div class="form-group form-inline">
                    <label for="l-amount" style="margin-right: 5px; margin-left: 30px;">L: </label>
                    <input type="number" class="form-control" id="l-amount" name="size-amount[3]" style="width: 100px;" value="0">
                </div>
                <!-- Default inline 3-->
                <div class="form-group form-inline">
                    <label for="xl-amount" style="margin-right: 5px; margin-left: 30px;">XL: </label>
                    <input type="number" class="form-control" id="xl-amount" name="size-amount[4]" style="width: 100px;" value="0">
                </div>
                <!-- Default inline 3-->
                <div class="form-group form-inline">
                    <label for="xxl-amount" style="margin-right: 5px; margin-left: 30px;">XXL: </label>
                    <input type="number" class="form-control" id="xxl-amount" name="size-amount[5]" style="width: 100px;" value="0">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="product_prize">Giá / Một đơn vị tính</label>
            <input type="number" class="form-control" id="product_prize" placeholder="Giá / Một đơn vị tính" name="product_prize">
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