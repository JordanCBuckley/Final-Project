<?php include('navbar_doctor.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teleconference Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container my-5">
        <h2>List of Patients</h2>
        <a class="btn btn-primary" href="create_patient.php" role="button">New Patient</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th> User ID</th>
                    <th> First Name</th>
                    <th> Surname</th>
                    <th> Email Address</th>
                    <th> Date of Birth</th>
                    <th> Patients Doctor</th>
                    <th> Username</th>
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
                $sql = "SELECT * FROM patientsinformation";
                $result = $connection ->query($sql);

                if (!$result){
                    die("Invalid Query: ".$connection-error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[userID]</td>
                        <td>$row[firstName]</td>
                        <td>$row[surname]</td>
                        <td>$row[email]</td>
                        <td>$row[dateOfBirth]</td>
                        <td>$row[patientsDoctor]</td>
                        <td>$row[username]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit_patient.php?userID=$row[userID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?userID=$row[userID]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>