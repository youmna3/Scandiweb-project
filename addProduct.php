<?php
require_once('./layouts/header.php');
$products = new ProductRepository;
//$products->addBook('TTT123456', 'TEST', 5, 4);
// if (isset($_POST['submit'])) {
//     foreach ($products as $product) {
//         $product = new Book($product['id'], $product['sku'], $product['name'], $product['price'], $product['weight']);
//         $product->setSku($_POST['name']);
//         $product->SetName($_POST['description']);
//         $product->setPrice(($_POST['price']));
//         $product->setWeight(($_POST['weight']));
//     }
//     $product->save();
// }

if (isset($_POST['submit'])) {
    $products->addProduct($_POST['sku'], $_POST['name'], $_POST['price']);
}
?>
<!-- <form action="" method="POST"> -->

<div class="d-flex flex-column min-vh-100">
    <div class="d-flex bd-highlight">
        <h1 class="p-2 flex-grow-1 bd-highlight">Add Product</h1>
        <div class="d-grid gap-2 d-md-block">
            <button class="p-2 bd-highlight btn btn-success" name='submit' id="submit" type="submit"
                form='product_form'>Save</button>
            <a href="productList.php" class="p-2 bd-highlight btn btn-secondary" type="button">Cancel</a>
        </div>
    </div>
    <hr>
    <form action="" id='product_form' method='POST'>
        <div class="form-group row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-3">
                <input name="sku" id="sku" class="form-control" placeholder="GGY1234456">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-3">
                <input name="name" id="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-3">
                <input type="text" name="price" id="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class=" form-group row">
            <label class="col-sm-2 col-form-label">TypeSwitcher</label>
            <select name="productType" id="productType" onchange="typeOutput()">
                <option value="dvd">DVD</option>
                <option value="book">Book</option>
                <option value="furniture">Furniture</option>
            </select>
        </div>
        <!-- Add a class to each form group to identify which product type it belongs to -->
        <div class="form-group row book">
            <label for="weight" class="col-sm-2 col-form-label">Weight (kg)</label>
            <div class="col-sm-3">
                <input name="weight" class="form-control" id="weight" placeholder="kg">
            </div>
        </div>

        <div class="form-group row dvd">
            <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
            <div class="col-sm-3">
                <input name="size" class="form-control" id="size" placeholder="MB">
            </div>
        </div>

        <div class="form-group row furniture">
            <label for="length" class="col-sm-2 col-form-label">Length (cm)</label>
            <div class="col-sm-3">
                <input name="length" class="form-control" id="length" placeholder="CM">
            </div>
        </div>

        <div class="form-group row furniture">
            <label for="width" class="col-sm-2 col-form-label">Width (cm)</label>
            <div class="col-sm-3">
                <input name="width" class="form-control" id="width" placeholder="CM">
            </div>
        </div>

        <div class="form-group row furniture">
            <label for="height" class="col-sm-2 col-form-label">Height (cm)</label>
            <div class="col-sm-3">
                <input name="height" class="form-control" id="height" placeholder="CM">
            </div>
        </div>


    </form>
</div>
<?php require('./layouts/footer.php'); ?>