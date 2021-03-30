<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product quantity orderded</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container text-center">
        <h1 class="text-center my-5">Please enter the full product name</h1>
        <form method="GET" action="product-quantity-orderded.php" class="w-50 m-auto">
            <input type="text" placeholder="product_name" name="product" class="form-control mb-4">
            <input type="submit" value="submit" name="submit" class="btn btn-primary mb-5">
        </form>
    </div>

    <?php
    if (isset($_GET['submit'])) {
        $product = $_GET['product'];
        $connect = mysqli_connect('localhost', 'root', '', 'route31');
        $query =  "SELECT SUM(quantityOrdered) AS total FROM `orderdetails`
            WHERE productCode = (
            SELECT productCode FROM products
            WHERE productName = '$product'
            )";
        $result = mysqli_query($connect, $query);
        $quantity = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>

    <?php if (!empty($quantity) and !empty($product)){ ?>
        <?php foreach ($quantity as $value){ ?>
         <h3 class="text-center mb-5">the total number of pieces ordered of this product : <?= $value['total']; }?> piece</h3>
    <?php } else {
        echo null;
    } ?>

    <hr style="height:4px; width:50%; border-width:0; color:red; background-color:red">
    <div class="text-center">
        <a href="product-quantity-orderded.php" class="btn btn-success my-3">Reload</a>
    </div>
</body>

</html>