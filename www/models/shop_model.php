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
}
