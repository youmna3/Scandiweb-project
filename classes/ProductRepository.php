<?php
class ProductRepository extends Dhb
{
    public function getProducts()
    {
        $sql = "SELECT product.*, book.weight, DVD.size, furniture.height, furniture.length, furniture.width
                 FROM product
                 LEFT JOIN type_product ON product.type_id = type_product.id
                 LEFT JOIN book ON type_product.book_id = book.id
                 LEFT JOIN DVD ON type_product.dvd_id = DVD.id
                 LEFT JOIN furniture ON type_product.furniture_id = furniture.id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

}