<?php
class Book extends Product
{
    public $weight;
    function __construct($id, $sku, $name, $price, $weight)
    {
        parent::__construct($id, $sku, $name, $price);
        $this->weight = $weight;
    }
    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        return $this->weight = $weight;
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
}