<?php
class Product_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertProduct($array_values)
    {
        return $this->db->insert("product", $array_values);
    }

    public function getProductID($product_name)
    {
        $sql = "SELECT product_id FROM product WHERE product_name = :product_name";
        return $this->db->select($sql, array('product_name' => $product_name));
    }

    public function insertProductSize($product_id, $listProductSizesAmount)
    {
        $size_id = 1;
        foreach ($listProductSizesAmount as $value) {
            $this->db->insert(
                "product_size",
                array(
                    'product_id' => $product_id,
                    'size_id' => $size_id,
                    'amount' => $value
                )
            );
            $size_id++;
        }
    }

    public function getAllProducts()
    {
        return $this->db->select("SELECT product_id, product_pic, product_name FROM product");
    }
}
