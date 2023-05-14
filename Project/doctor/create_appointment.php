<?php include('navbar_doctor.php');?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project database";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$meetingID ="";
$patientsName ="";
$doctorsName ="";
$date ="";
$Time ="";
$duration ="";
$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $patientsName = $_POST["patientsName"];
    $doctorsName = $_POST["doctorsName"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $duration = $_POST["duration"];

    do{
        if (empty($patientsName) || empty($doctorsName) || empty($date) || empty($time) || empty($duration)){
            $errorMessage = "All fields are required";
            break;
        }

        //Inserting new patient into database
        $sql = "INSERT INTO appointments (patientsName, doctorsName, date, time, duration)" . 
                "VALUES ('$patientsName', '$doctorsName', '$date', '$time', '$duration')";
        $result = $connection->query($sql);

        $patientsName ="";
        $doctorsName ="";
        $date ="";
        $time ="";
        $duration ="";

        $successMessage = "Appointment added.";

        header("location: meeting_doctor.php");
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
        <h2>New Appointment</h2>
        <?php
        if (!empty($errorMessage)){
            echo "<div class='alert alert-warning alert-dismissible fade show' role=alert>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
        ?>
        <form action="create_appointment.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="patientsName" placeholder="Patients Name:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="patientsEmail" placeholder="Patients Email:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="doctorsName" placeholder="Doctors Name:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="doctorsEmail" placeholder="Doctors Email:">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="date" placeholder="Date:">
            </div>
            <div class="form-group">
                <input type="time" class="form-control" name="time" placeholder="Time:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="duration" placeholder="Duration:">
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