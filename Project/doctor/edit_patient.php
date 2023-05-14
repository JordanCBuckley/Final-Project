<?php include('navbar_doctor.php');?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project database";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$userID = "";
$firstName = "";
$surname = "";
$email = "";
$dateOfBirth = "";
$patientsDoctor = "";
$username = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    //get shows data of patient
    if (!isset($_GET["userID"])){
        header("location: list_patient.php");
        exit;
    }

    $userID = $_GET["userID"];

    $sql = "SELECT * FROM patientsinformation WHERE userID=$userID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: list_patient.php");
        exit;
    }

    $firstName = $row["firstName"];
    $surname = $row["surname"];
    $email = $row["email"];
    $dateOfBirth = $row["dateOfBirth"];
    $patientsDoctor = $row["patientsDoctor"];
    $username = $row["username"];

}
else{
    //POST updates data of patient

    $userID = $_POST["userID"];
    $firstName = $_POST["firstName"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $patientsDoctor = $_POST["patientsDoctor"];
    $username = $_POST["username"];

    do{
        if (empty($firstName) || empty($surname) || empty($email) || empty($dateOfBirth) || empty($patientsDoctor) || empty($username)) {
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE patientsinformation SET firstName='$firstName',surname='$surname',email='$email', dateOfBirth='$dateOfBirth', patientsDoctor='$patientsDoctor', username='$username' WHERE userID='$userID'";

        $result = $connection->query($sql);

        
        $successMessage = "Patient updated correctly";

        header("Location: list_patient.php");
        exit;

    } while(false);
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
        <h2>Edit patient information</h2>
        <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role=alert>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
        ?>
        <form action="edit_patient.php" method="post">
            <input type="hidden" name="userID" value="<?php echo $userID;?>"> 
            <div class="form-group">
                <input type="text" class="form-control" name="firstName" placeholder="First name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="surname" placeholder="Surname:">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="dateOfBirth" placeholder="Date of Birth:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="patientsDoctor" placeholder="Patients Doctor:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email:">
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
                <a class="btn btn-outline-primary" href="index_doctor.php" role="button">Cancel</a>
              </div>
            </div>
          </div>
        </form>
    </div>
</body>
</html>