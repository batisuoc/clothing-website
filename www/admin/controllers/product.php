<?php
class Product extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('product/index');
    }

    function addProductPage()
    {
        $this->view->render('product/addProductPage');
    }

    function insertProduct()
    {
        echo $_POST['product_name'] . "<br />";
        echo $_POST['calc_unit'] . "<br />";
        echo $_POST['product_type'] . "<br />";
        echo $_POST['product_prize'] . "<br />";
        echo $_POST['product_amount'] . "<br />";
        echo $_POST['product_descript'] . "<br />";
        echo $_POST['product_image_link'] . "<br />";

        $product_sizes = $_POST['product_size'];
        foreach ($product_sizes as $product_size) {
            echo $product_size . "<br />";
        }

        die();
    }
}
