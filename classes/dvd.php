<?php
class DVD extends Product
{
    public $size;
    public function __construct($id, $sku, $name, $price, $type_id, $size)
    {
        parent::__construct($id, $sku, $name, $price, $type_id);
        $this->size = $size;
    }
    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }
    public function displayProduct()
    {
        parent::displayProduct();
        ?>
        <h6>size:
            <?= $this->getSize() ?>MB
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
                $sql = "INSERT INTO dvd (product_id, size) VALUES (:product_id, :size)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute(['product_id' => $lastInsertId, 'size' => $this->getSize()]);
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