<?php
require_once('./layouts/header.php');
// $product = new Product();
// print_r($product->getProducts());
// $product->getProducts();
?>

<body>
    <div class="d-grid gap-2 d-md-block">
        <h1>Product List</h1>
        <a class="btn btn-primary" type="button" href="addProduct.php">ADD</a>
        <button class="btn btn-primary" type="button">MASS DELETE</button>
    </div>

    <hr>
    <div class="container">
        <div class="row row-cols-3">
            <?php
            $product = new Product();
            //$product->getProducts();
            foreach ($product->getProducts() as $product) {
                ?>
                <div class='border'>
                    <h6>SKU:
                        <?=
                            $product['sku'] ?>
                    </h6>
                    <h6>Name:
                        <?= $product['name'] ?>
                    </h6>
                    <h6>Price:
                        <?= $product['price'] ?>
                    </h6>
                    <h6>size/weight/dimensions
                        <?= $product['type_id'] ?>
                    </h6>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php require('./layouts/footer.php'); ?>