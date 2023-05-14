<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project database";

//create connection
$connection = new mysqli($servername, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Get the entered username and password
    $email = $_POST["email"];
    $password = $_POST["password"];

    do{
        if (empty($email) || empty($password) ){
            $errorMessage = "All fields are required";
            break;
        }
        $sql = "SELECT * FROM doctorsinformation WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connection, $sql);
    
        if (mysqli_num_rows($result) == 1) {
        header("Location: index_doctor.php");
        exit();
        } else {
        $error = "Invalid username or password";
        }
    }while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teleconference Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/project/css/style.css">
</head>
<body>
    <div class="container">
    <h2 class="text-center">Doctor Login</h2>
    <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role=alert>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
        ?>
        <form action="doctor_login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
        <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <?php
        if (!empty($successMessage)){
            echo "
            <div class='alert alert-sucess alert-dismissible fade show' role=alert>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/home/home.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</body>
</html>