<?php

abstract class Product
{
    public $id;
    public $sku;
    public $name;
    public $price;


    public function __construct($id, $sku, $name, $price)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }


    public function getPrice()
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
    }
}
?>