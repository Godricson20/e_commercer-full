<?php 
session_start();
$conn=mysqli_connect("localhost","root","","ecommerce");
    if(isset($_SESSION['login']) && ($_SESSION['login']!=""))
    {

    }
    else
    {
        header('location:login.php');
        die();
    }

    if(isset($_GET['action'])&& $_GET['action']!='') {

        $type=mysqli_real_escape_string($conn,$_GET['action']);

    if($type=='delete') {
        $id=mysqli_real_escape_string($conn,$_GET['id']);
        $delete_query="delete from product where id='$id'";
        mysqli_query($conn,$delete_query);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manager</title>

<style>
    /* Head styling */

.head {
    background-color: #00bfff;
    padding: 20px;
    text-align: center;
    font-size: 40px;
    color: #fff;
}

.logout {
    float: right;
    color: #f00;
    font-size: 25px;
    text-decoration: none;
}

.logout:hover {
    color: #fff;
}

.category {
    background-color: #d3d3d3;
    padding: 20px;
    text-align: center;
    font-size: 30px;
    color: #000;
}

.add {
    float: right;
    text-decoration: none;
    color: #fff;
    background-color: #f00;
    border-radius: 30px;
    text-align: center;
    font-size: 30px;
    border: none;
    padding: 5px 8px;
}

.add:hover {
    color: #f00;
    background-color: #000;
}

table {
    width: 100%;
}

th {
    background-color: #4caf4c;
    color: #fff;
    font-size: 25px;
    padding: 25px;
    text-align: center;
}

td {
    padding: 25px;
    text-align: center;
    font-size: 20px;
}

.delete {
    background-color: #f44336;
    text-decoration: none;
    text-align: center;
    font-size: 25px;
    color: #fff;
    border: none;
    padding: 5px 8px;
}

.orderlist {
    float: left;
    color: #ffff00;
    text-decoration: none;
    font-size: 25px;
}

.orderlist:hover {
    color: #fff;
}

</style>
    
</head>

<body>
    
    <div class="head"> Product Manager
        <a href="logout.php" class="logout">Logout</a>
        <a href="orderlist.php" class="orderlist">Orderlist</a>
    </div>

    <!-- fashion -->
    <div class="category"> FASHION 
        <a href="add_fashion.php" class="add"> Add Product </a>
    </div>

    <table>
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th></th>
        </tr>

        <?php 
            $query="SELECT * FROM product WHERE category_name='fashion'";

            $result=mysqli_query($conn,$query);

            while($row=mysqli_fetch_array($result))
            {
            ?>
                <tr>
                    <td> <img src=" <?php echo $row['image'];?> " width="100" height="100"> </td>
                    <td> <?php echo $row['product_name']; ?> </td>
                    <td> <?php echo $row['price']; ?> </td>
                    
                    <td> <?php echo ' <a href=" ?action=delete&id='.$row["id"].' " class="delete">Delete</a> '; ?> </td>
                </tr>
            <?php 
            }
            ?>

    </table>

    <!-- toys -->
    <div class="category"> Toys
        <a href="add_toys.php" class="add"> Add Product </a>
    </div>

    <table>
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th></th>
        </tr>

        <?php
        $query="SELECT * FROM product WHERE category_name='toys'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
        ?>
            <tr>
                <td><img src="<?php echo $row['image'];?> " width="100" height="100"> </td>
                <td> <?php echo $row['product_name']; ?> </td>
                <td> <?php echo $row['price']; ?> </td>
                <td> <?php echo ' <a href=" ?action=delete&id='.$row["id"].' " class="delete">Delete</a> '; ?> </td
                >
            </tr>
        <?php
        }
        ?>

    </table>

    <!-- electronics -->
    <div class="category"> Electronics
        <a href="add_electronics.php" class="add"> Add Product </a>
    </div>

    <table>
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th></th>
        </tr>

        <?php
        $query="SELECT * FROM product WHERE category_name='electronics'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
        ?>
            <tr>
                <td><img src="<?php echo $row['image'];?> " width="100" height="100"> </td>
                <td> <?php echo $row['product_name']; ?> </td>
                <td> <?php echo $row['price']; ?> </td>
                <td> <?php echo ' <a href=" ?action=delete&id='.$row["id"].' " class="delete">Delete</a> '; ?> </td
                >
            </tr>
        <?php
        }
        ?>

    </table>

</body>
</html>