<?php include('navbar_doctor.php');?>

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
        <h2>Current Appointments</h2>
        <a class="btn btn-primary" href="create_appointment.php" role="button">New Appointment</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th> meeting ID</th>
                    <th> Patients Name</th>
                    <th> Doctors Name</th>
                    <th> Date</th>
                    <th> Time</th>
                    <th> Duration</th>
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
                $sql = "SELECT * FROM appointments";
                $result = $connection ->query($sql);

                if (!$result){
                    die("Invalid Query: ".$connection-error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[meetingID]</td>
                        <td>$row[patientsName]</td>
                        <td>$row[doctorsName]</td>
                        <td>$row[date]</td>
                        <td>$row[time]</td>
                        <td>$row[duration]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit_doctor.php?meetingID=$row[meetingID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?meetingID=$row[meetingID]'>Delete</a>
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