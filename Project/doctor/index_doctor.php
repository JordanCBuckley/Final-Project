<?php include('navbar_doctor.php');?>

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
        <a class="btn btn-primary" href="list_patient.php" role="button">View Patients</a>
        <a class="btn btn-primary" href="list_doctor.php" role="button">View Doctors</a>
        <a class="btn btn-primary" href="/project/prescriptions/add_medication.php" role="button">Add New Medication</a>
        <a class="btn btn-primary" href="/project/prescriptions/prescription_doctor.php" role="button">Send Prescription</a>
        <a class="btn btn-primary" href="/project/prescriptions/prescriptions.php" role="button">View Prescriptions</a>
        <a class="btn btn-primary" href="create_appointment.php" role="button">Create Appointment</a>
        <a class="btn btn-primary" href="appointments.php" role="button">Current Appointments</a>
    </div>
  </div>
</body>