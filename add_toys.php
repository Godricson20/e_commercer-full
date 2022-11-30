<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Toys</title>

<style>
.addproduct {
    background-color: #e8e8e8;
    border-radius: 1.5rem;
}

.addproduct h1 {
    text-align: center;
}

.addproduct label {
    margin-left: 20px;
    font-size: 20px;
    color: #f00;
}

.addproduct input {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
}

.addproduct button {
    width: 50%;
    margin: 0 25%;
    font-size: 25px;
    padding: 12px 20px;
    color: #fff;
    border: none;
    background-color: #4caf50;
    border-radius: 1.5rem;
}

.addproduct button:hover {
    color: #4caf50;
    background-color: #dc143c;
}
</style>

</head>
<body>
    <div class="addproduct">
        <h1>Add Toys Product</h1>

        <form method="post">
            <label><b>Product Name</b></label>
            <input type="text" placeholder="Enter Product Name" name="pname" required>

            <label><b>Product Image</b></label>
            <input type="file" name="pimage" required>

            <label><b>Product Price</b></label>
            <input type="text" placeholder="Enter Price" name="pprice" required>

            <button type="submit" name="submit">Insert</button>
        </form>

    </div>
</body>
</html>

<?php
session_start();
$conn=mysqli_connect("localhost","root","","ecommerce");

if(isset($_SESSION['login']) && ($_SESSION['login']!="")) {

    if(isset($_POST['submit'])) {
        $catname="toys";
        $ppname=mysqli_real_escape_string($conn,$_POST['pname']);
        $pimage=mysqli_real_escape_string($conn,$_POST['pimage']);
        $pprice=mysqli_real_escape_string($conn,$_POST['pprice']);

        mysqli_query($conn,"insert into product(category_name,image,product_name,price) values('$catname','$pimage','$ppname','$pprice')");

        echo'<script type="text/JavaScript"> alert("Product Added Successfully"); window.location= "product_manage.php" ; </script>';
        die();
    }
}
else
{
    header('location:login.php');
    die();
}

?>