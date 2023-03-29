<?php
class DVD extends Product
{
    public $size;
    public function __construct($id, $sku, $name, $price, $size)
    {
        parent::__construct($id, $sku, $name, $price);
        $this->size = $size;
    }
    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        return $this->size = $size;
    }
    public function displayProduct()
    {
        parent::displayProduct();
        ?>
        <h6>Weight:
            <?= $this->getSize() ?>MB
        </h6>
        <?php
    }
}