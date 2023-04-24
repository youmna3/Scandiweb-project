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
}