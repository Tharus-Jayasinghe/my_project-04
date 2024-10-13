<?php

//include function page
include_once('lib/functions/userFunction.php');
if(isset($_POST['btnLogin'])){
    $result = Authentication($_POST['userName'],$_POST['userPass']);
    echo($result);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMS</title>
    <!-- Link Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body style="background-image:url('images/ml.jpg')">

<div class="container" style="margin-top:40px;">
<div class="row">
    <div class="col-md-6">
        <div class="card"  style="background-color:rgba(0, 0, 0, 0.4);">
            <div class="card-header"style="color:white">
                Login Section
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group mt-3">
                        <label style="color:white" for="">Enter Your User Email</label>
                        <input type="text" name="userName" id="userName" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""style="color:white">Enter Your Password</label>
                        <input type="password" name="userPass" id="userPass" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" value="Login" name="btnLogin" class="btn btn-outline-warning btn-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="background-color:rgba(0, 0, 0, 0.4);">
            <div class="card-header"style="color:white">
                Registration Section
            </div>
            <div class="card-body">
                <form action="lib/route/user/registration.php" method="post">
                <div class="form-group mt-3">
                        <label for=""style="color:white">Enter Your Name</label>
                        <input type="text" name="userName" id="userName" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""style="color:white">Enter Your Email</label>
                        <input type="text" name="userEmail" id="userEmail" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""style="color:white">Enter Your Password</label>
                        <input type="password" name="userpass" id="userpass" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""style="color:white">Enter Your Phone</label>
                        <input type="text" name="userPhone" id="userPhone" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""style="color:white">Enter Your NIC</label>
                        <input type="text" name="userNic" id="userNic" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit"  name="btnSave" id="btnSave" value="Register" class="btn btn-outline-success btn-sm">
                        <input type="reset" value="Clear" class="btn btn-outline-danger btn-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div></div>

</body>
</html>

<!-- <?php
// Database configuration
$servername = "localhost"; // Change this to your server name
$username = "your_username"; // Change this to your database username
$password = "your_password"; // Change this to your database password
$dbname = "your_database"; // Change this to your database name

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Function for user authentication
    function Authentication($email, $password) {
        global $conn; // Using the database connection in the function

        // Perform validation and query
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return "Login successful"; // Change this to your desired success message
        } else {
            return "Invalid email or password"; // Change this to your desired error message
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?> -->