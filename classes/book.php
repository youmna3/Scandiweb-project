<?php

class Book extends Product
{
    public $weight;
    function __construct($id, $sku, $name, $price, $type_id, $weight)
    {
        parent::__construct($id, $sku, $name, $price, $type_id);
        $this->weight = $weight;
    }
    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function displayProduct()
    {
        parent::displayProduct();
        ?>
        <h6>Weight:
            <?= $this->getWeight() ?>KG
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
                $sql = "INSERT INTO book ( weight) VALUES ( :weight)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute(['weight' => $this->getWeight()]);
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