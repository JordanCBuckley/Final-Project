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
<form action="home.php" method="post">
    <div class="form-group">
    <h1 class="text-center"><br>Please choose carefully</h1>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <div class="d-grid gap-2 col-6 mx-auto">
          <br>
          <a class="btn btn-primary" href="/project/doctor/doctor_login.php" role="button">Doctor login</a>
          <a class="btn btn-primary" href="/project/home/reset_doctor.php" role="button">Doctor Reset Password Here</a>
          <br>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
          <br>
          <a class="btn btn-primary" href="/project/patient/patient_login.php" role="button">Patient login</a>
          <a class="btn btn-primary" href="/project/home/reset_patient.php" role="button">Patient Reset Password Here</a>
        </div>
    </div>
  </form>
</body>
</html>