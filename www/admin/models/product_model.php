<?php
class Product_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insertProduct($array_values)
    {
        return $this->db->insert("product", $array_values);
    }

    function getProductID($product_name)
    {
        $sql = "SELECT product_id FROM product WHERE product_name = :product_name";
        return $this->db->select($sql, array('product_name' => $product_name));
    }

    function insertProductSize($product_id, $listProductSizes)
    {
        foreach ($listProductSizes as $value) {
            $this->db->insert(
                "product_size",
                array(
                    'product_id' => $product_id,
                    'size_id' => $value
                )
            );
        }
    }
}
