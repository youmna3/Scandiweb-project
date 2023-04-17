<?php
class Book extends Product
{
    public $weight;
    function __construct($id = null, $sku = null, $name = null, $price = null, $type_id = null, $weight = null)
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
    public function getTypeId()
    {
        parent::getTypeId();
        return $this->type_id;
    }
}