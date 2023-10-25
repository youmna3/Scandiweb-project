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
             LEFT JOIN furniture ON type_product.furniture_id = furniture.id
             ORDER BY product.sku";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function addProduct(Product $product)
    {
        $pdo = $this->connect();
        $existingSkuCheck = $pdo->prepare("SELECT COUNT(*) FROM product WHERE sku = :sku");
        $existingSkuCheck->execute(['sku' => $product->getSku()]);
        $count = $existingSkuCheck->fetchColumn();

        if ($count > 0) {
            // SKU already exists, return false or handle the error as needed
            return false;
        } else {
            $sql = "INSERT INTO product (sku,name,price,type_id) VALUES (:sku, :name, :price, :type_id)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                'sku' => $product->getSku(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                // 'type_id' => $type_id
                'type_id' => $product->getTypeId()
            ]);
            return $result;
        }
    }
    public function addBook(Book $book)
    {
        $pdo = $this->connect();
        $sql = "INSERT INTO book (weight) Values (:weight)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute(['weight' => $book->getWeight()]);
        if ($result) {
            // Get the id of the newly inserted row
            $sql = "SELECT LAST_INSERT_ID()";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $lastInsertId = $stmt->fetchColumn();
            return $lastInsertId;
        } else {
            var_dump($stmt->errorInfo());
        }
    }
    public function addDVD(DVD $dvd)
    {
        $pdo = $this->connect();
        $sql = "INSERT INTO dvd (size) VALUES (:size)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute(['size' => $dvd->getSize()]);
        if ($result) {
            // Get the id of the newly inserted row
            $sql = "SELECT LAST_INSERT_ID()";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $lastInsertId = $stmt->fetchColumn();
            return $lastInsertId;
        } else {
            // Handle error here
            var_dump($stmt->errorInfo());
        }
    }
    public function addFurniture(Furniture $furniture)
    {
        $pdo = $this->connect();
        $sql = "INSERT INTO furniture (length,width,height) VALUES (:length,:width,:height)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            'length' => $furniture->getLength(),
            'width' => $furniture->getWidth(),
            'height' => $furniture->getHeight()
        ]);
        if ($result) {
            // Get the id of the newly inserted row
            $sql = "SELECT LAST_INSERT_ID()";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $lastInsertId = $stmt->fetchColumn();
            return $lastInsertId;
        } else {
            // Handle error here
            var_dump($stmt->errorInfo());
        }
    }

    public function addType($book_id, $dvd_id, $furniture_id)
    {
        $pdo = $this->connect();
        $sql = "INSERT INTO type_product (book_id, dvd_id, furniture_id) VALUES (:book_id, :dvd_id, :furniture_id)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute(['book_id' => $book_id, 'dvd_id' => $dvd_id, 'furniture_id' => $furniture_id]);
        if ($result) {
            // Get the id of the newly inserted row
            $sql = "SELECT LAST_INSERT_ID()";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $lastInsertId = $stmt->fetchColumn();
            return $lastInsertId;
        } else {
            // Handle error here
            var_dump($stmt->errorInfo());
        }
    }

    public function delete($id)
    {
        // echo "delete function called with id: $id<br>";
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