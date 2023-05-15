<?php
// require_once('./classes/dhb.php');

class Furniture extends Product
{
    public $length;
    public $width;
    public $height;
    public function __construct($id, $sku, $name, $price, $type_id, $length, $width, $height)
    {
        parent::__construct($id, $sku, $name, $price, $type_id);
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;

    }
    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }
    public function displayProduct()
    {
        parent::displayProduct();
        ?>
        <h6>Dimensions:
            <?= $this->getLength() ?>CM X
            <?= $this->getWidth() ?>CM X
            <?= $this->getHeight() ?>CM
        </h6>
        <?php
    }
    /*
        public function addProduct()
        {
            $pdo = $this->connect();
            $sql = "INSERT INTO product (sku,name,price,type_id) VALUES (:sku, :name, :price, :type_id)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                'sku' => $this->getSku(),
                'name' => $this->getName(),
                'price' => $this->getPrice(),
                'type_id' => $this->getTypeId()
            ]);
            if ($result) {
                // Get the id of the newly inserted row
                $sql = "SELECT LAST_INSERT_ID()";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $lastInsertId = $stmt->fetchColumn();
                $sql = "INSERT INTO furniture (product_id, height, width, length) VALUES (:product_id, :height, :width, :length)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([
                    'product_id' => $lastInsertId,
                    'height' => $this->getHeight(),
                    'width' => $this->getWidth(),
                    'length' => $this->getLength()
                ]);
                if ($result) {
                    return $lastInsertId;
                } else {
                    var_dump($stmt->errorInfo());
                }
            } else {
                var_dump($stmt->errorInfo());
            }
        }
        */

}