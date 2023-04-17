<?php
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
    public function getTypeId()
    {
        parent::getTypeId();
        // return $this->type_id;
    }
}