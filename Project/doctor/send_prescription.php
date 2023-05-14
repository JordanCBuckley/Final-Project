<?php include('navbar_doctor.php');?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project database";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$patientEmail ="";
$medication ="";
$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $patientEmail = $_POST["patientEmail"];
    $medication = $_POST["medication"];
    do{
        if (empty($patientEmail) || empty($patientEmail) ){
            $errorMessage = "All fields are required";
            break;
        }

        //Inserting new patient into database
        $sql = "INSERT INTO prescriptions (patientEmail, medication) VALUES ('$patientEmail', '$medication')";
        $result = $connection->query($sql);

        $patientEmail ="";
        $medication ="";

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
        <h2>Send Prescription</h2>
        <?php
        if (!empty($errorMessage)){
            echo "<div class='alert alert-warning alert-dismissible fade show' role=alert>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
        ?>
        <form action="prescription_doctor.php" method="post">
        <select name="patientEmail">
            <option value="">Select Email</option>
            <?php 
            $query ="SELECT email FROM `patientsinformation`";
            $result = $connection->query($query);
            if($result->num_rows> 0){
                while($optionData=$result->fetch_assoc()){
                $option =$optionData['email'];
                if(!empty($patientEmail) && $patientEmail== $option){
                ?>
                <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                <?php 
                continue;
                }?>
                <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                <?php
                }
            }
            ?>
        </select>
        <select name="medication">
            <option value="">Select Medication</option>
            <?php 
            $query ="SELECT name FROM `medication`";
            $result = $connection->query($query);
            if($result->num_rows> 0){
                while($optionData=$result->fetch_assoc()){
                $option =$optionData['name'];
                ?>
                <?php 
                if(!empty($medication) && $medication== $option){
                    ?>
                    <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                    <?php 
                continue;
                }?>
                    <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                <?php
                }
            }
            ?>
        </select>
            <?php
            if (!empty($successMessage)){
                echo "
                <div class='alert alert-sucess alert-dismissible fade show' role=alert>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>
            <div class="row mb-3">
              <div class="offset-sm-3 col-sm-3 d-grid">
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <div class="col-sm-3 d-grid">
                <br>
                <a class="btn btn-outline-primary" href="index_doctor.php" role="button">Cancel</a>
              </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>