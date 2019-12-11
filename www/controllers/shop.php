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

    public function editProduct($product_id)
    { }
}
