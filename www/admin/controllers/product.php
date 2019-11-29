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
        $product_array_values = array(
            'product_name' => $_POST['product_name'],
            'product_calc_unit' => $_POST['calc_unit'],
            'product_type' => $_POST['product_type'],
            'product_prize' => $_POST['product_prize'],
            'product_amount' => $_POST['product_amount'],
            'product_description' => $_POST['product_descript'],
            'product_pic' => "images/product/" . $_POST['product_image_link']
        );
        $this->model->insertProduct($product_array_values);

        $result = $this->model->getProductID($_POST['product_name']);

        if ($result != false) {
            $product_sizes = $_POST['product_size'];
            if (count($product_sizes) > 0) {
                $this->model->insertProductSize($result['product_id'], $product_sizes);
            }
        }
        header('location: ../product');
    }
}
