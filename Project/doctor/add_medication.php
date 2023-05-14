<?php include('navbar_doctor.php');?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project database";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$name ="";
$manufactured ="";
$stock ="";
$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $manufactured = $_POST["manufactured"];
    $stock = $_POST["stock"];

    do{
        if (empty($name) || empty($manufactured) || empty($stock)){
            $errorMessage = "All fields are required";
            break;
        }
        //Inserting new patient into database
        $sql = "INSERT INTO medication (name, manufactured, stock) VALUES ('$name', '$manufactured', '$stock')";
        $result = $connection->query($sql);

        $name ="";
        $manufactured ="";
        $stock ="";

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
        <h2>New Patient</h2>
        <?php
        if (!empty($errorMessage)){
            echo "<div class='alert alert-warning alert-dismissible fade show' role=alert>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
        ?>
        <form action="add_medication.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Medication Name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="manufactured" placeholder="Manufactured where:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="stock" placeholder="Number of available stock:">
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
                <a class="btn btn-outline-primary" href="/project/index_doctor.php" role="button">Cancel</a>
              </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>