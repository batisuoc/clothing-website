<?php
class Product extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->productList = $this->model->getAllProducts();
        echo $this->view->productList;
        die();
        $this->view->render('product/index');
    }

    public function addProductPage()
    {
        $this->view->render('product/addProductPage');
    }

    public function editProduct($id)
    { }

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

    public function insertProduct()
    {
        $product_array_values = array(
            'product_name' => $_POST['product_name'],
            'product_calc_unit' => $_POST['calc_unit'],
            'product_type' => $_POST['product_type'],
            'product_prize' => $_POST['product_prize'],
            'product_amount' => $_POST['product_amount'],
            'product_description' => $_POST['product_descript'],
            'product_pic' => $this->uploadImage()
        );
        $this->model->insertProduct($product_array_values);

        $result = $this->model->getProductID($_POST['product_name']);

        if ($result != false) {
            $product_sizes = $_POST['product_size'];
            if (count($product_sizes) > 0) {
                $this->model->insertProductSize($result['product_id'], $product_sizes);
                header('Location: ../product');
            }
            // echo '<script>';
            // echo 'alert("Thêm sản phẩm thành công !!!");';
            // echo '</script>';
        }
    }
}
