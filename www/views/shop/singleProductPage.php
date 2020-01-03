<?php

$prodInfos = $this->productInfos;

?>
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>Chi tiết sản phẩm</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="../../shop">Trang chủ</a></li>
            <li class="active">Chi tiết sản phẩm</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!--single-protfolio-area are start-->
<div class="single-protfolio-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="portfolio-thumbnil-area">
                    <div class="tab-content active-portfolio-area pos-rltv">
                        <div role="tabpanel" class="tab-pane active" id="view11">
                            <div class="product-img">
                                <a class="fancybox" data-fancybox-group="group" href="<?= PUBLIC_RESOURCES . $prodInfos['product_pic'] ?>">
                                    <img src="<?= PUBLIC_RESOURCES . $prodInfos['product_pic'] ?>" alt="Single portfolio" style="width: 422px; height: 540px; margin-left: 150px" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="single-product-description">
                    <div class="sp-top-des">
                        <h3><?= $prodInfos['product_name'] ?></h3>
                        <div class="prodcut-ratting-price">
                            <div class="prodcut-price">
                                <div class="new-price"><?= number_format($prodInfos['product_prize']) ?> đ</div>
                                <!-- <div class="old-price"> <del>$250</del> </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="sp-des">
                        <p><?= $prodInfos['product_description'] ?></p>
                    </div>
                    <div class="sp-bottom-des">
                        <div class="single-product-option">
                            <div class="sort product-type">
                                <label>Kích cỡ: </label>
                                <select id="input-sort-size">
                                    <option value="1">S</option>
                                    <option value="2">M</option>
                                    <option value="3">L</option>
                                    <option value="4">XL</option>
                                    <option value="5">XXL</option>
                                    <option value="0" selected="">Hãy chọn kích cỡ</option>
                                </select>
                                <span id="size-qty"></span>
                            </div>
                        </div>
                        <div class="quantity-area">
                            <label>Số lượng :</label>
                            <div class="cart-quantity">
                                <form action="#" method="POST" id="myform">
                                    <div class="product-qty">
                                        <div class="cart-quantity">
                                            <div class="cart-plus-minus">
                                                <div class="dec qtybutton">-</div>
                                                <input type="text" value="0" name="qtybutton" class="cart-plus-minus-box">
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="social-icon socile-icon-style-1">
                            <ul>
                                <li>
                                    <div class="btn btn-primary btn-small add-to-cart add-cart-text" data-placement="left" id="<?= $prodInfos['product_id'] ?>">Thêm vào giỏ hàng<i class="fa fa-cart-plus"></i></div>
                                </li>
                                <!-- <li><a href="#" data-tooltip="Wishlist" class="w-list" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                <li><a href="#" data-tooltip="Compare" class="cpare" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal" tabindex="0"><i class="fa fa-eye"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--single-protfolio-area are start-->

<!--new arrival area start-->
<div class="new-arrival-area ptb-70"></div>
<!--new arrival area end-->