<?php

/**
 * 
 */
class Shop extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // Get all products from database first, then render the html
        $this->view->products = $this->model->getAllProducts();
        $this->view->render('shop/index');
    }

    public function singleProductPage($product_id)
    {
        $this->view->productInfos = $this->model->getSingleProductInfo($product_id);

        $this->view->render('shop/singleProductPage');
    }

    public function getSingleProductInfo($product_id)
    {
        return $this->model->getCartProductInfo($product_id);
    }
}
