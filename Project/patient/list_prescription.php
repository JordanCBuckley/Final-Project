<?php include('navbar_patient.php');?>
<?php session_start();?>

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
    <div class="container my-5">
        <h2>List of Current Prescriptions</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th> Prescription Number</th>
                    <th> Patient Email</th>
                    <th> Medication</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "project database";

                //create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //check connection
                if ($connection->connect_error){
                    die("Connection failed: ".$connection->connect_error);
                }

                //read data from table
                $sql = "SELECT * FROM prescriptions";
                $result = $connection ->query($sql);

                if (!$result){
                    die("Invalid Query: ".$connection-error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[prescriptionID]</td>
                        <td>$row[patientEmail]</td>
                        <td>$row[medication]</td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>