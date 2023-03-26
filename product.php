<?php
require_once('./layouts/header.php');

?>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex bd-highlight">
        <h1 class="p-2 flex-grow-1 bd-highlight">Product List</h1>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-primary" type="button" href="addProduct.php">ADD</a>
            <button class="btn btn-danger" type="button">MASS DELETE</button>
        </div>
    </div>

    <hr>
    <div class="container">
        <div class="row row-cols-4">
            <?php
            $product = new Product();
            //$product->getProducts();
            foreach ($product->getProducts() as $product) {
                ?>
                <div class="product">
                    <div class="form-check">
                        <input class="delete-checkbox form-check-input position-static" type="checkbox"
                            value="<?= $product['id'] ?>" aria-label="...">
                    </div>
                    <h6>SKU:
                        <?=
                            $product['sku'] ?>
                    </h6>
                    <h6>Name:
                        <?= $product['name'] ?>
                    </h6>
                    <h6>Price: $
                        <?= $product['price'] ?>
                    </h6>
                    <?php if (isset($product['weight'])): ?>
                        <h6>Weight:
                            <?= $product['weight'] ?>KG
                        </h6>
                    <?php endif; ?>
                    <?php if (isset($product['size'])): ?>
                        <h6>Size:
                            <?= $product['size'] ?>MB
                        </h6>
                    <?php endif; ?>
                    <?php if (isset($product['length'])): ?>
                        <h6>Size:
                            Length
                            <?= $product['length'] ?>cm X
                            Width
                            <?= $product['width'] ?>cm X
                            Height
                            <?= $product['height'] ?>cm
                        </h6>
                    <?php endif; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <?php require('./layouts/footer.php'); ?>