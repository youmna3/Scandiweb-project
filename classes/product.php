<?php
class Product extends Dhb
{
    public function getProducts()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo $row['sku'] . '<br>';
        }
    }
}