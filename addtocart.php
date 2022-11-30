<?php 
    $conn=mysqli_connect("localhost","root","","ecommerce");

    if(isset($_GET['action']) && $_GET['action']!='')
    {
        $type=mysqli_real_escape_string($conn,$_GET['action']);

        if($type=='delete')
        {
            $id=mysqli_real_escape_string($conn,$_GET['id']);
            $delete_sql="delete from addcart where id='$id'";
            mysqli_query($conn,$delete_sql);
        }
    }

    if(isset($_POST['order']))
    {
        $query="SELECT * FROM addcart";
        $result=mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            $productname=$row['product_name'];
            $productprice=$row['price'];
            $productimage=$row['image'];
            mysqli_query($conn,"insert into orderlist(image,product_name,price) values('$productimage','$productname','$productprice')");
        }
        $sql="TRUNCATE TABLE addcart";
        mysqli_query($conn,$sql);
        echo '<script type="text/javascript">alert("Order Placed Successfully"); window.location="firstpage.php"; </script>';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add To Cart</title>
</head>

<style>
    .header {
        background-color: #00ffff;
        padding: 20px;
        text-align: center;
        font-size: 25px;
        color: #000;
    }

    .header a {
        float: right;
        color: #f00;
        text-decoration: none;
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

    .remove a {
        text-decoration: none;
        border: none;
        background-color: #f44336;
        text-align: center;
        font-size: 25px;
        color: #fff;
        padding: 5px 8px;
    }

    .order {
        text-decoration: none;
        border: none;
        background-color: #ffa500;
        text-align: center;
        font-size: 25px;
        color: #fff;
        padding: 5px 8px;
        border-radius: 1.5rem;
    }

    .order:hover {
        color: #ffa500;
        background-color: #f44336;
    }

</style>

<body>

<div class="header">
    My Cart
    <a href="firstpage.php">Back To Home</a>
</div>

<table>
    <tr>
        <th>Image</th>
        <th>Product_Name</th>
        <th>Price</th>
        <th></th>
    </tr>

    <?php 
        $query ="SELECT * FROM addcart";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
    ?>
        <tr>
            <td><img src="<?php echo $row['image']; ?>" width="100" height="100"></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td class="remove"><?php echo "<a href='?action=delete&id=".$row['id']."'> Remove </a>"; ?></td>
        </tr>
    <?php } ?>

    <tr>
        <form method="post">
            <td colspan="4"> <button type="submit" class="order" name="order">Make My Order</button></td>
        </form>
    </tr>

</table>
    
</body>
</html>