<!-- database conn shpuld be included in the header -->
<?php
//include('config/database.php');
include('inc/autoload.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $obj = new Product();
    $obj->getProducts();
    ?>
</body>

</html>