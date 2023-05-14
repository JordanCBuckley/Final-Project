<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project database";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$email = "";
$oldPassword = "";
$newPassword = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_POST["email"];
  $oldPassword = $_POST["oldPassword"];
  $newPassword =$_POST["newPassword"];

  do{
      if (empty($email) || empty($oldPassword) || empty($newPassword) ){
          $errorMessage = "All fields are required";
          break;
      }

      //resetting password
      $hash = md5($newPassword);
      $sql = "UPDATE patientsinformation SET password='$newPassword' WHERE email='$email'";
      $result = $connection->query($sql);
      $password = md5($password);
      $email = "";
      $oldPassword = "";
      $newPassword = "";

      $successMessage = "Patient added to database.";

      header("location: home.php");
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
        <h2>Reset password</h2>
        <?php
        if (!empty($errorMessage)){
            echo "<div class='alert alert-warning alert-dismissible fade show' role=alert>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
        ?>
        <form action="reset_password.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="oldPassword" placeholder="Old Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="newPassword" placeholder="New Password:">
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
                <a class="btn btn-outline-primary" href="/project/home/home.php" role="button">Cancel</a>
              </div>
            </div>
          </div>
        </form>
    </div>
</body>
</html>