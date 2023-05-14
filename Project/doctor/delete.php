<?php include('navbar_doctor.php');?>

<?php
if (isset($_GET["userID"])){
    $userID = $_GET["userID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project database";

    //create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM patientsinformation WHERE userID=$userID";
    $connection->query($sql);
}
header("location: /project/index_doctor.php");
exit;
?>