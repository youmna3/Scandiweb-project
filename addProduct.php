<?php
require_once('./layouts/header.php');
?>
<form>

    <div class="d-flex flex-column min-vh-100">
        <div class="d-flex bd-highlight">
            <h1 class="p-2 flex-grow-1 bd-highlight">Add Product</h1>
            <div class="d-grid gap-2 d-md-block">
                <a class="p-2 bd-highlight btn btn-success" type="button" href="addProduct.php">SAVE</a>
                <button class="p-2 bd-highlight btn btn-secondary" type="button">Cancel</button>
            </div>
        </div>
        <hr>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="inputEmail3" placeholder="GGY1234456">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Price">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Type</label>
            <select class="col-sm-3">
                <option selected>Select Product Type</option>
                <option value="1">BOOK</option>
                <option value="2">DVD</option>
                <option value="3">FURITURE</option>
            </select>
        </div>
</form>
</div>
<?php require('./layouts/footer.php'); ?>