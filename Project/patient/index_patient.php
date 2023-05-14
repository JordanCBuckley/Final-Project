<?php include('navbar_patient.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teleconference Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
  <h2 class="text-center">Choose an option from the menu below</h2>
    <div class="d-grid gap-5 col-4 mx-auto">
        <br>
        <a class="btn btn-primary" href="list_prescription.php" role="button">View Current Prescription</a>
        <a class="btn btn-primary" href="appointments.php" role="button">Book An Appointment</a>
        <a class="btn btn-primary" href="/project/home/logout.php" role="button">Sign Out</a>
    </div>
  </div>
</body>