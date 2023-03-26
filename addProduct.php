<?php
require_once('./layouts/header.php');
?>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex bd-highlight">
        <h1 class="p-2 flex-grow-1 bd-highlight">Add Product</h1>
        <div class="d-grid gap-2 d-md-block">
            <a class="p-2 bd-highlight btn btn-success" type="button" href="addProduct.php">SAVE</a>
            <button class="p-2 bd-highlight btn btn-secondary" type="button">Cancel</button>
        </div>
        <hr>
    </div>
    <hr>
</body>
<?php require('./layouts/footer.php'); ?>