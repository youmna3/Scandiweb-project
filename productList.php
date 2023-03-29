<?php
include('./layouts/header.php');

$productRepository = new ProductRepository();
$products = $productRepository->getProducts();

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
        <div class="row row-cols-4 justify-content-center">
            <?php
            foreach ($products as $product) {
                if (isset($product['weight'])) {
                    $productObject = new Book($product['id'], $product['sku'], $product['name'], $product['price'], $product['weight']);
                } elseif (isset($product['size'])) {
                    $productObject = new DVD($product['id'], $product['sku'], $product['name'], $product['price'], $product['size']);
                } elseif (isset($product['length'])) {
                    $productObject = new Furniture($product['id'], $product['sku'], $product['name'], $product['price'], $product['length'], $product['width'], $product['height']);
                }
                ?>
                <div class="product">
                    <div class="form-check">
                        <input class="delete-checkbox form-check-input position-static" type="checkbox"
                            value="<?= $productObject->id ?>" aria-label="...">
                    </div>
                    <?php echo $productObject->displayProduct() ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <?php require('./layouts/footer.php'); ?>