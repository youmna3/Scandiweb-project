<?php
class Product extends Dhb
{
    public function getProducts()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //     echo $row . '<br>';

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

}