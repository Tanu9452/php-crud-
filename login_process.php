<?php
$servername = "localhost";
$username="root";
$password = "";
$database = "emptv18";

$connection = new mysqli($servername, $username, $password, $database);
?>
<?php
        if(isset($_POST['login'])){
            $username = $_POST['uname'];
            $passwords = $_POST['passwords'];
                    
        }
        $query = "SELECT * FROM users where username ='$username' and password = '$passwords'";
        $res = mysqli_query($connection, $query);

        if(!$res){
            die("connection failed:".$connection->connect_error);
        }
        else{
            $row = mysqli_num_rows($res);
            if($row ==1){
                $_SESSION['uname'] = $username;
                header("location: /emp_tv18/home.php");
            }
            else{
                header("location: /emp_tv18/index.php?message=Sorry username or password is invalid");
            }
        }


        ?>