<?php
require_once('./layouts/header.php');
$products = new ProductRepository;

$errors = [
    'sku' => '',
    'name' => '',
    'price' => '',
    'weight' => '',
    'size' => '',
    'length' => '',
    'width' => '',
    'height' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    // Validate SKU
    if (empty($sku)) {
        $errors['sku'] = 'SKU is required';
    }

    // Validate Name
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }

    // Validate Price
    if (empty($price)) {
        $errors['price'] = 'Price is required';
    } elseif (!is_numeric($price)) {
        $errors['price'] = 'Price must be a valid number';
    }

    if (empty(array_filter($errors))) {
        // No errors, proceed with adding the product

        if (!empty($_POST['weight'])) {
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
        header("Location: productList.php");
    }
}
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id='product_form' method='POST'>
        <div class="form-group row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-3">
                <input name="sku" id="sku" class="form-control" placeholder="GGY1234456">
                <span class="text-danger">
                    <?= $errors['sku']; ?>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-3">
                <input name="name" id="name" class="form-control" placeholder="Name">

                <span class="text-danger">
                    <?= $errors['name']; ?>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-3">
                <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                <span class="text-danger">
                    <?= $errors['price']; ?>
                </span>
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
                <span class="text-danger">
                    Please provide weight in kg

                </span>
            </div>
        </div>

        <div class="form-group row dvd">
            <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
            <div class="col-sm-3">
                <input name="size" class="form-control" id="size" placeholder="MB">
                <span class="text-danger">
                    Please provide SIZE in MB

                </span>
            </div>
        </div>

        <div class="form-group row furniture">
            <label for="length" class="col-sm-2 col-form-label">Length (cm)</label>
            <div class="col-sm-3">
                <input name="length" class="form-control" id="length" placeholder="CM">
                <span class="text-danger">
                    Please provide Length weight in CM
                </span>
            </div>
        </div>

        <div class="form-group row furniture">
            <label for="width" class="col-sm-2 col-form-label">Width (cm)</label>
            <div class="col-sm-3">
                <input name="width" class="form-control" id="width" placeholder="CM">
                <span class="text-danger">
                    Please provide Width weight in CM
                </span>
            </div>
        </div>

        <div class="form-group row furniture">
            <label for="height" class="col-sm-2 col-form-label">Height (cm)</label>
            <div class="col-sm-3">
                <input name="height" class="form-control" id="height" placeholder="CM">
                <span class="text-danger">
                    Please provide Height weight in CM
                </span>
            </div>
        </div>
    </form>
</div>
<?php require('./layouts/footer.php'); ?>