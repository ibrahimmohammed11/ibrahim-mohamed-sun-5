<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latest-orders</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container text-center">
        <h1 class="text-center my-5">Add Number of Orders</h1>
        <form method="GET" action="latest-orders.php" class="w-50 m-auto">
            <input type="number" placeholder="number of orders" name="order" class="form-control mb-4">
            <input type="submit" value="submit" name="submit" class="btn btn-primary mb-5">
        </form>
    </div>

    <?php
    if (isset($_GET['submit'])) {
        $num = $_GET['order'];
        $connect = mysqli_connect('localhost', 'root', '', 'route31');
        $query = "SELECT orderNumber,orderDate,status,customerNumber FROM orders ORDER BY orderDate DESC LIMIT $num";
        $result = mysqli_query($connect, $query);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    ?>
    <?php if (!empty($orders) and !empty($num)) { ?>

        <table class="table table-striped w-75 m-auto">
            <thead>
                <tr>
                    <th>orderNumber</th>
                    <th>orderDate</th>
                    <th>status</th>
                    <th>customerNumber</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $value) { ?>
                    <tr>
                        <td><?= $value['orderNumber'] ?></td>
                        <td><?= $value['orderDate'] ?></td>
                        <td><?= $value['status'] ?></td>
                        <td><?= $value['customerNumber'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>

    <hr style="height:4px; width:50%; border-width:0; color:red; background-color:red">
    <div class="text-center">
        <a href="latest-orders.php" class="btn btn-success my-3">Reload</a>
    </div>
</body>

</html>