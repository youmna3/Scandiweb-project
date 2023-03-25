<!-- database conn shpuld be included in the header -->
<?php
//include('config/database.php');
include('layouts/header.php');
?>



<body>
    <?php
    $obj = new Product();
    $obj->getProducts();
    ?>
</body>

</html>