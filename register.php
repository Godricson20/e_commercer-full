<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

<style>
    .register {
    background-color: #e8e8e8;
    border-radius: 30px;
}

.register h1 {
    text-align: center;
}

.register label {
    color: #f00;
    font-size: 25px;
    margin-left: 20px;
}

.register input {
    width: 100%;
    padding: 12px 20px;
    box-sizing: border-box;
    margin: 8px 0;
}

.register button {
    width: 50%;
    margin: 0 25%;
    font-size: 25px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 1.5rem;
}

.register button:hover {
    color: #4caf50;
    background-color: #dc143c;
}

.register p {
    margin-left: 20px;
}

.register a {
    color: #f00;
    font-size: 25px;
    text-decoration: none;
}

</style>

</head>
<body>
    
    <div class="register">
        <h1>Registration Form</h1>

            <form method="post">
            <label><b>Username</b></label>
            <input type="text" name="name" placeholder="Enter Username.." required>

            <label><b>Password</b></label>
            <input type="password" name="password" placeholder="Enter Password.." required>

            <label><b>Confirm Password</b></label>
            <input type="password" name="confirmpassword" placeholder="Enter Password.." required>

            <button type="submit" name="submit">Register</button>
            <p>Already have an account? <a href="login.php">Sign in</a></p>
        </form>
    </div>

</body>
</html>

<?php 
    $conn=mysqli_connect("localhost","root","","ecommerce");

    if(isset($_POST['submit'])) {
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $psw=mysqli_real_escape_string($conn,$_POST['password']);
        $cpsw=mysqli_real_escape_string($conn,$_POST['confirmpassword']);

            if($psw == $cpsw) {
                $sql="select * from adminlogin where username='$name'";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);

                if($count == 0) {
                    mysqli_query($conn,"insert into adminlogin(username,password) values('$name','$psw')");

                    echo '<script type="text/JavaScript">
                        alert("User Registered Successfully");
                        window.location="login.php";
                    </script>';
                }
                else
                {
                    echo '<script type="text/JavaScript">alert ("Username Already Exists");</script>';
                }
            }
            else {
                echo '<script type="text/JavaScript">alert("Password did Not Match.Please Try Again...");</script>';
            }
    }
?>