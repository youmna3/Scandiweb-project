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

    public function addProduct($sku, $name, $price)
    {
        $sql = "INSERT INTO product (sku, name, price)
                VALUES (:sku, :name, :price)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute(['sku' => $sku, 'name' => $name, 'price' => $price]);
        echo $result;
        return $result;
    }
    public function addBook($weight)
    {
        $sql = "INSERT INTO book (weight) VALUES (:weight)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute(['weight' => $weight]);
        if ($result) {
            $lastInsertId = $this->connect()->lastInsertId();
            return $lastInsertId;
        }

    }
    public function addDVD($size)
    {
        $sql = "INSERT INTO dvd (size) VALUES (:size)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute(['size' => $size]);
        if ($result) {
            $lastInsertId = $this->connect()->lastInsertId();
            return $lastInsertId;
        }

    }
    public function addF($length, $width, $height)
    {
        $sql = "INSERT INTO furniture (length,width,height) VALUES (:length,:width,:height)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute(['length' => $length, 'width' => $width, 'height' => $height]);
        if ($result) {
            $lastInsertId = $this->connect()->lastInsertId();
            return $lastInsertId;
        }

    }
    // public function type($bookId, $dvdId, $furnitureId)
    // {
    //     $sql = "INSERT INTO type_product(book_id,dvd_id, furniture_id) VALUES (:book_id,:dvd_id, :furniture_id)";
    //     $stmt = $this->connect()->prepare($sql);
    //     $result = $stmt->execute(['book_id' => $bookId, 'dvd_id' => $dvdId, 'furniture_id' => $furnitureId]);
    //     if ($result) {
    //         $lastInsertId = $this->connect()->lastInsertId();
    //         return $lastInsertId;
    //     }
    // }

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