<?php include('navbar_doctor.php');?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project database";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$firstName ="";
$surname ="";
$email ="";
$dateOfStart ="";
$username ="";
$password ="";
$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstName = $_POST["firstName"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $dateOfStart = $_POST["dateOfStart"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    do{
        if (empty($firstName) || empty($surname) || empty($email) || empty($dateOfStart) || empty($username) || empty($password) ){
            $errorMessage = "All fields are required";
            break;
        }

        $password = md5($password);

        //Inserting new patient into database
        $sql = "INSERT INTO doctorsinformation (firstName, surname, email, dateOfStart, username, password)" . 
                "VALUES ('$firstName', '$surname', '$email', '$dateOfStart', '$username', '$password')";
        $result = $connection->query($sql);

        $firstName ="";
        $surname ="";
        $email ="";
        $dateOfStart ="";
        $username ="";
        $password ="";

        $successMessage = "Patient added to database.";

        header("location: index_doctor.php");
        exit;

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>New Doctor</h2>
        <?php
        if (!empty($errorMessage)){
            echo "<div class='alert alert-warning alert-dismissible fade show' role=alert>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
        ?>
        <form action="create_doctor.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="firstName" placeholder="First name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="surname" placeholder="Surname:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="dateOfStart" placeholder="Start Date:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
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
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="list_doctor.php" role="button">Cancel</a>
              </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>