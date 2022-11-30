<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Form</title>

    <style>
        /* Login styling */

        .login {
            background-color: #e8e8e8;
            border-radius: 2rem;
        }

        .login h1 {
            text-align: center;
        }

        .login label {
            margin-left: 20px;
            font-size: 20px;
            color: #f00;
        }

        .login input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .login button {
            width: 50%;
            margin: 0 25%;
            font-size: 25px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 1.5rem;
        }

        .login button:hover {
            color: #4caf50;
            background-color: #dc143c;
        }

        p {
            margin-left: 20px;
            text-decoration: none;
        }

        a {
            color: #f00;
            font-size: 25px;
            text-decoration: none;
        }
    </style>

</head>

<body>

    <div class="login">
        <h1>Login Form</h1>
        <form method="post">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username.." name="name" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password.." name="password" required>

            <button type="submit" name="submit">Login</button>

        </form>
        <p>New here? <a href="register.php">Register Here</a></p>

    </div>
</body>

</html>

<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "ecommerce");
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "select * from adminlogin where username='$username' and password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        $_SESSION['login'] = 'yes';
        $_SESSION['username'] = $username;
        header('location:product_manage.php');
        die();
    } else {
        echo '<script type="text/JavaScript">alert ("please enter the correct username or password";</script>';
    }
}
?>