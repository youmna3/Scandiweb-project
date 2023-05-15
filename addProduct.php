<?php
require_once('./layouts/header.php');
$products = new ProductRepository;

if (isset($_POST['submit'])) {
    // $dhb = new Dhb();
    // $book = new Book(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $dhb, $_POST['weight']);
    // $book->addProduct();


    if ($_POST['weight']) {
        $book = new Book(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['weight']);
        $book_id = $products->addBook($book);
        $type_id = $products->addType($book_id, null, null);
        $book->setTypeId($type_id);
        $products->addProduct($book);
    } elseif ($_POST['size']) {
        $dvd = new DVD(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['size']);
        $dvd_id = $products->addDVD($dvd);
        if ($dvd_id) {
            $type_id = $products->addType(null, $dvd_id, null);
            $dvd->setTypeId($type_id);
            $products->addProduct($dvd);
        }
    } else {
        $furniture = new Furniture(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['length'], $_POST['width'], $_POST['height']);
        $furniture_id = $products->addFurniture($furniture);
        $type_id = $products->addType(null, null, $furniture_id);
        $furniture->setTypeId($type_id);
        $products->addProduct($furniture);
    }

    /*
    if (isset($_POST['weight'])) {
    $book = new Book(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['weight']);
    $book_id = $products->addBook($book->getWeight());
    $type_id = $products->addType($book_id, null, null);
    var_dump($type_id);
    $products->addProduct($book->getSku(), $book->getName(), $book->getPrice(), $type_id);
    } elseif ($_POST['size']) {
    $dvd = new DVD(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['size']);
    $dvd_id = $products->addDVD($dvd->getSize());
    $type_id = $products->addType(null, $dvd_id, null);
    var_dump($type_id);
    $products->addProduct($dvd->getSku(), $dvd->getName(), $dvd->getPrice(), $type_id);
    } elseif ($_POST['length'] && $_POST['width'] && $_POST['height']) {
    $furniture = new Furniture(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['length'], $_POST['width'], $_POST['height']);
    $furniture_id = $products->addFurniture($furniture->getLength(), $furniture->getWidth(), $furniture->getHeight());
    $type_id = $products->addType(null, null, $furniture_id);
    $products->addProduct($furniture->getSku(), $furniture->getName(), $furniture->getPrice(), $type_id);
    }
    */
    // $book = new Book(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['weight']);
    // $book_id = $products->addBook($book);
    // $type_id = $products->addType($book_id, null, null);
    // var_dump($type_id);
    // $products->addProduct($book, $type_id);

    // $book = new Book();
    // $book->setSku($_POST['sku']);
    // $book->SetName($_POST['name']);
    // $book->setPrice($_POST['price']);
    // $book->setWeight($_POST['weight']);
    // $book_id = $products->addBook($book);
    // $type_id = $products->addType($book_id, null, null);
    // $book->setTypeId($type_id);
    // $products->addProduct($book);
}

//}


?>
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
            <div class="col-sm-3">
                <select name="productType" id="productType" onchange="typeOutput()">
                    <option value="dvd">DVD</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>
            </div>
        </div>
        <!-- Add a class to each form group to identify which product type it belongs to -->
        <div class="form-group row book">
            <label for="weight" class="col-sm-2 col-form-label">Weight (kg)</label>
            <div class="col-sm-3">
                <input name="weight" class="form-control" id="weight" placeholder="kg">
                <?= "Please, provide weight" ?>
            </div>
        </div>

        <div class="form-group row dvd">
            <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
            <div class="col-sm-3">
                <input name="size" class="form-control" id="size" placeholder="MB">
                <?= "Please, provide size" ?>
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
                <?= "Please, provide dimensions" ?>
            </div>
        </div>
    </form>
</div>
<?php require('./layouts/footer.php'); ?>