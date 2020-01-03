<?php
class Shop_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts()
    {
        return $this->db->select("SELECT product_id, product_pic, product_name, product_prize, product_description FROM product");
    }

    public function getSingleProductInfo($product_id)
    {
        return $this->db->select("SELECT product_id, product_pic, product_name, product_type, product_description, product_prize FROM product WHERE product_id = " . $product_id);
    }

    public function getCartProductInfo($product_id)
    {
        return $this->db->select("SELECT product_pic, product_name, product_prize FROM product WHERE product_id = " . $product_id);
    }

    public function getProductSizesAmount($product_id, $size_id)
    {
        return $this->db->select("SELECT amount FROM product_size WHERE product_id = " . $product_id . " AND size_id = " . $size_id);
    }
}
