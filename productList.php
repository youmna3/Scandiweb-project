<?php
include('./layouts/header.php');

$productRepository = new ProductRepository();
$products = $productRepository->getProducts();

echo '<pre>';
print_r($products);
echo '</pre>';
?>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex bd-highlight">
        <h1 class="p-2 flex-grow-1 bd-highlight">Product List</h1>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-primary" type="button" href="addProduct.php">ADD</a>
            <button class="btn btn-danger" form="product_list" type="submit" name='delete'>MASS DELETE
                <?php if (isset($_POST['delete']))
                    if (!empty($_POST['deleteId'])) {
                        foreach ($_POST['deleteId'] as $selectedId) {
                            $productRepository->delete($selectedId);
                        }
                    }
                ?>
            </button>
        </div>
    </div>

    <hr>
    <div class="container">
        <form class="row row-cols-4 justify-content-center" action="" id='product_list' method='POST'>
            <?php
            //maps the keys of the product data array to the corresponding product class names and properties
            $productClasses = [
                'weight' => ['Book', ['weight']],
                'size' => ['DVD', ['size']],
                'width' => ['Furniture', ['length', 'width', 'height']]
            ];

            foreach ($products as $product) {
                $productClassKey = key(array_filter(array_intersect_key($product, $productClasses), fn($value) => !is_null($value)));
                [$productClass, $productProperties] = $productClasses[$productClassKey];
                $productArgs = array_merge([$product['id'], $product['sku'], $product['name'], $product['price']], array_map(fn($prop) => $product[$prop], $productProperties));
                $productObject = new $productClass(...$productArgs);
                //var_dump($productObject);
            
                ?>

                <div class="product">
                    <div class="form-check">
                        <input class="delete-checkbox form-check-input position-static" type="checkbox" name="deleteId[]"
                            value="<?= $productObject->id ?>" aria-label="...">

                    </div>
                    <?php echo $productObject->displayProduct() ?>
                </div>
                <?php
            }
            ?>
        </form>
    </div>

    <?php require('./layouts/footer.php'); ?>