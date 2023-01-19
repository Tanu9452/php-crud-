<?php
if(isset($_GET["id"])){
    $first_name=$_GET["id"];

    $servername = "localhost";
    $username="root";
    $password = "";
    $database = "emptv18";

    $connection = new mysqli($servername, $username, $password, $database);
    $sql = "DELETE FROM employee WHERE first_name=$first_name";
    $connection->query($sql);
}

header("location: /emp_tv18/home.php");
exit;
?>