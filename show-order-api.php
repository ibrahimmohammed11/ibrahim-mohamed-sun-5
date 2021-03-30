<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show order api</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container text-center">
        <h1 class="text-center my-5">Please Enter Order Number</h1>
        <form method="GET" action="show-order-api.php" class="w-50 m-auto">
            <input type="text" placeholder="Order Number" name="orderNumber" class="form-control mb-4">
            <input type="submit" value="submit" name="submit" class="btn btn-primary mb-5">
        </form>
    </div>

    <?php
    if (isset($_GET['submit'])) {
        $orderNumber = $_GET['orderNumber'];
        $connect = mysqli_connect('localhost', 'root', '', 'route31');
        $query = "SELECT orderDate, requiredDate, shippedDate, status, comments, customerNumber FROM `orders` 
                  WHERE orderNumber = '$orderNumber'";
        $result = mysqli_query($connect, $query);
        $details = mysqli_fetch_assoc($result);
    }
    ?>

    <?php if (!empty($details)) { ?>
        <h5 class="text-center"><?= json_encode($details); ?></h5>
    <?php } ?>
    <hr style="height:4px; width:50%; border-width:0; color:red; background-color:red">
    <div class="text-center">
        <a href="show-order-api.php" class="btn btn-success my-3">Reload</a>
    </div>
</body>

</html>