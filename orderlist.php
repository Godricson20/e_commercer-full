<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderlist</title>

    <style>
        .header {
            background-color: #00ffff;
            padding: 20px;
            text-align: center;
            font-size: 35px;
            color: #000;
        }

        .header a {
            float: right;
            color: #ff0000;
            text-decoration: none;
            font-size: 20px;
        }

        .header a:hover {
            color: #fff;
        }

        table {
            width: 100%;
        }

        th {
            padding: 25px;
            text-align: center;
            background-color: #4caf50;
            color: #fff;
            font-size: 25px;
        }

        td {
            padding: 25px;
            text-align: center;
            font-size: 20px;
        }
    </style>

</head>

<body>

    <div class="header">
        ORDER LIST
        <a href="product_manage.php">Product Manager</a>
    </div>

    <table>
        <tr>
            <th>Image</th>
            <th>Product_Name</th>
            <th>Price</th>
        </tr>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "ecommerce");
        $query = "SELECT * FROM orderlist";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><img src="<?php echo $row['image']; ?>" width="100" height="100"></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['price']; ?></td>
            </tr>

        <?php } ?>

    </table>

</body>

</html>