<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search customers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container text-center">
        <h1 class="text-center my-5">Please Enter Customer Name</h1>
        <form method="GET" action="search-customers.php" class="w-50 m-auto">
            <input type="text" placeholder="search_keyword" name="name" class="form-control mb-4">
            <input type="submit" value="submit" name="submit" class="btn btn-primary mb-5">
        </form>
    </div>

    <?php
    if (isset($_GET['submit'])) {
        $name = $_GET['name'];
        $connect = mysqli_connect('localhost', 'root', '', 'route31');
        $query = "SELECT customerName FROM `customers` WHERE customerName LIKE '%$name%'";
        $result = mysqli_query($connect, $query);
        $CustomerName = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>

    <?php if (!empty($CustomerName) and !empty($name)) { ?>
        <ul class="bg-dark text-white py-3">
            <?php foreach ($CustomerName as $value) { ?>
                <li><strong>CustomerName :</strong> <?= $value['customerName'];} ?></li>
    <?php } else {
        echo null;
    } ?>
        </ul>
        <hr style="height:4px; width:50%; border-width:0; color:red; background-color:red">
        <div class="text-center">
            <a href="search-customers.php" class="btn btn-success my-3">Reload</a>
        </div>
</body>

</html>