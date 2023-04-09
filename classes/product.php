<?php

abstract class Product
{
    public $id;
    public $sku;
    public $name;
    public $price;
    public $type_id;

    public function __construct($id, $sku, $name, $price, $type_id)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type_id = $type_id;
    }

    public function getSku()
    {
        return $this->sku;
    }
    public function setSku($sku)
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }
    public function SetName($name)
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        return $this->price;
    }

    public function displayProduct()
    {

        ?>

        <h6>SKU:
            <?= $this->getSku() ?>
        </h6>
        <h6>Name:
            <?= $this->getName() ?>
        </h6>
        <h6>Price: $
            <?= $this->getPrice() ?>
        </h6>
        <?php
        //return array();
    }
    public function getTypeId()
    {
        return $this->type_id;
    }
}
?>