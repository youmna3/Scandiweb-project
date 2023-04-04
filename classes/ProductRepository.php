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

    public function addProduct($sku, $name, $price, )
    {
        $sql = "INSERT INTO product (sku, name, price)
                VALUES (:sku, :name, :price)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute(['sku' => $sku, 'name' => $name, 'price' => $price]);
        echo $result;
        return $result;
    }

    public function delete($id)
    {
        echo "delete function called with id: $id<br>";
        $sql = "DELETE FROM product WHERE id = :id"; //named parameter
        $stmt = $this->connect()->prepare($sql);
        //$stmt->bindParam(':id', $id);
        $result = $stmt->execute([':id' => $id]);
        if (!$result) {
            print_r($stmt->errorInfo());
        }
        return $result;
    }

}