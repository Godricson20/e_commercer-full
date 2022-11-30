<?php
$conn = mysqli_connect("localhost","root","","ecommerce");
if(isset($_GET['action']) && $_GET['action']!='')
{
    $type=mysqli_real_escape_string($conn,$_GET['action']);
    
    if($type==='addtocart')
    {
        $id=mysqli_real_escape_string($conn,$_GET['id']);
        $query="SELECT * FROM product WHERE id='$id'";
        $result=mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            $productname=$row['product_name'];
            $productprice=$row['price'];
            $productimage=$row['image'];
        }
        mysqli_query($conn,"insert into addcart(image,product_name,price) values('$productimage','$productname','$productprice')");
        echo '<script type="text/javascript"> alert("product '.$productname.' added successfully"); </script>';
    }
}

if($a=mysqli_query($conn,"SELECT * FROM addcart"))
{
    $b=mysqli_num_rows($a);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ateu mart</title>

    <style>
        /* header styling */
        .header {
            background-color: #00bfff;
        }

        .logo {
            vertical-align: middle;
            width: 60px;
            height: 60px;
        }

        .header a {
            font-size: 20px;
            color: #f1f1f1;
            padding: 10px;
            text-decoration: none;
        }

        /* navigation bar */
        .nav ul {
            list-style-type: none;
            background-color: #696969;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .nav .categories {
            float: left;
            padding: 14px 16px;
        }

        .nav .addtocart {
            float: right;
        }

        .nav .categories a {
            color: #fff;
            text-decoration: none;
        }

        .nav .addtocart a {
            color: #f00;
            display: block;
            background-color: #fff;
            padding: 14px 16px;
            margin-right: 20px;
            text-decoration: none;
            font-size: 20px;
        }

        /* slideshow styling */
        .slideshow .image {
            width: 100%;
            height: auto;
        }

        /* categories */
        .items .categoryheading {
            background-color: #00bfff;
            padding: 0;
            margin: 0;
            font-size: 30px;
            text-align: center;
            color: #fff;
        }

        .gridcontents {
            display: grid;
            grid-template-columns: auto auto auto auto;
        }

        .griditem {
            text-align: center;
            margin: 10px;
        }

        .griditem a {
            text-decoration: none;
            background-color: #ffa500;
            font-size: 25px;
            padding: 5px 8px;
        }

        .griditem a:hover {
            color: #f00;
        }

        div .image:hover {
            background: #00bfff;
            transform: scale(1.02);
            transform: translateY(-10px);
            border-radius: 30px;
        }
    </style>

</head>

<body>

    <!-- header -->
    <div class="header">
        <a href=""><img src="logo.png" class="logo"> ATEU MART</a>
    </div>

    <!-- navigation bar -->
    <div class="nav">
        <ul>
            <li class="categories"><a href="add_fashion.php">Fashion</a></li>
            <li class="categories"><a href="add_toys.php">Toys</a></li>
            <li class="categories"><a href="add_electronics.php">Electronics</a></li>
            <li class="addtocart"><a href="addtocart.php"> <label> <?php echo $b; ?> </label> &nbsp; Cart </a></li>
        </ul>
    </div>

    <!-- slideshow -->
    <div class="slideshow">
        <img src="slidephoto1.png" alt="slidephoto" class="image-header">
    </div>

    <!-- categories -->
    <div class="items">
        <h1 class="categoryheading">Fashion</h1>
        <div class="gridcontents">

            <?php
            $query = "SELECT * FROM product WHERE category_name='fashion'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="griditem">
                <img src="<?php echo $row['image']; ?>" width="100" height="100">
                <h2><?php echo $row['product_name']; ?> </h2>
                <h3> $<?php echo $row['price']; ?> </h3>
                <?php echo "<a href='?action=addtocart&id=" . $row['id'] . "'>Add To Cart</a>"; ?>
            </div>

            <?php } ?>
        </div>
    </div>

    <!-- toys -->
    <div class="items">
        <h1 class="categoryheading">Toys</h1>
        <div class="gridcontents">

            <?php
            $query = "SELECT * FROM product WHERE category_name='toys'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="griditem">
                <img src="<?php echo $row['image']; ?>" width="100" height="100">
                <h2><?php echo $row['product_name']; ?> </h2>
                <h3> $<?php echo $row['price']; ?> </h3>
                <?php echo "<a href='?action=addtocart&id=" . $row['id'] . "'>Add To Cart</a>"; ?>
            </div>

            <?php } ?>

        </div>
    </div>

    <!-- Electronics -->
    <div class="items">
        <h1 class="categoryheading">Electronics</h1>
        <div class="gridcontents">
           
         <?php
            $query = "SELECT * FROM product WHERE category_name='electronics'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="griditem">
                <img src="<?php echo $row['image']; ?>" width="100" height="100">
                <h2><?php echo $row['product_name']; ?> </h2>
                <h3> $<?php echo $row['price']; ?> </h3>
                <?php echo "<a href='?action=addtocart&id=" . $row['id'] . "'>Add To Cart</a>"; ?>
            </div>

            <?php } ?>

        </div>
    </div>

</body>

</html>