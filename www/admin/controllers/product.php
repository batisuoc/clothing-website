<?php
class Product extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Get all product first then render
        $this->view->productList = $this->model->getAllProducts();
        $this->view->render('product/index');
    }

    public function addProductPage()
    {
        $this->view->render('product/addProductPage');
    }

    public function insertProduct()
    {
        // Insert product basic infos
        $product_array_values = array(
            'product_name' => $_POST['product_name'],
            'product_calc_unit' => $_POST['calc_unit'],
            'product_type' => $_POST['product_type'],
            'product_prize' => $_POST['product_prize'],
            'product_description' => $_POST['product_descript'],
            'product_pic' => $this->uploadImage()
        );
        $this->model->insertProduct($product_array_values);
        // Get Product ID
        $result = $this->model->getProductID($_POST['product_name']);
        // Insert product sizes infos
        if ($result != false) {
            $product_size_values = $_POST["size-amount"];
            if (count($product_size_values) > 0) {
                $this->model->insertProductSize($result['product_id'], $product_size_values);
                header('Location: ../product');
            }
        }
    }

    public function editProductPage($id)
    {
        $this->view->singleProductInfos = $this->model->getProductByID($id);
        $this->view->singleProductSizes = $this->model->getProductSize($id);
        $this->view->productID = $id;
        $this->view->render('product/editProductPage');
    }

    public function updateProductInfo($id)
    {
        $product_array_values = array(
            'product_name' => $_POST['product_name'],
            'product_calc_unit' => $_POST['calc_unit'],
            'product_type' => $_POST['product_type'],
            'product_prize' => $_POST['product_prize'],
            'product_description' => $_POST['product_descript']
        );
        $this->model->updateProductInfo($product_array_values, $id);

        $product_sizes = $_POST["size-amount"];
        foreach ($product_sizes as $key => $value) {
            $this->model->updateProductSize($key, $id, array('amount' => $value));
        }

        header('Location: ../../product');
    }

    // public function deleteProduct($id) {}

    public function uploadImage()
    {
        // Link dan toi folder chua anh tren server
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/public/images/product/";
        // Link de file co the upload duoc len server
        $target_file = $target_dir . basename($_FILES["product_image_link"]["name"]);
        // Link de luu tru tren database
        $database_storage_link = "images/product/" . basename($_FILES["product_image_link"]["name"]);
        // Dung de check xem hinh anh co thoa man du dieu kien de dua len server khong
        $uploadOk = 1;
        // Lay loai file cua anh (VD : PNG, JPG, GIF, ... )
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["product_image_link"]["tmp_name"]);
            if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
                die();
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            die();
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            die();
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            die();
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["product_image_link"]["tmp_name"], $target_file)) {
                // echo "The file " . basename($_FILES["product_image_link"]["name"]) . " has been uploaded.";
                return $database_storage_link;
            } else {
                echo "Sorry, there was an error uploading your file.";
                die();
            }
        }
    }
}
