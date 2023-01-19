<?php


$servername = "localhost";
$username="root";
$password = "";
$database = "emptv18";

$connection = new mysqli($servername, $username, $password, $database);
$id= "";
$first_name = "";
$last_name = "";
$email = "";
$age = "";
$mobile_no = "";
$gender = "";
$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["id"])){
        header("location: /emp_tv18/home.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM employee WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: /emp_tv18/home.php");
        exit;
    }
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $email = $row["email"];
    $age = $row["age"];
    $mobile_no = $row["mobile_no"];
    $gender = $row["gender"];

}
else{
    $id = $_POST["id"];
    $first_name= $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $email= $_POST["email"];
    $age= $_POST["age"];
    $mobile_no= $_POST["mobile_no"];
    $gender= $_POST["gender"];

    do{
        if (empty($first_name) ||empty($last_name) ||empty($email) || empty($age) ||empty($mobile_no)){
            $errorMessage = "all the fields are required";
            break;
        }

        $sql = "UPDATE employee SET last_name = '$last_name', first_name='$first_name', gender='$gender', mobile_no='$mobile_no', email='$email',age='$age' WHERE id =$id";

        $result = $connection->query($sql);
        
        if(!$result){
            $errorMessage = "invalid query: " . $connection->error; 
            break;
        }

        $successMessage = "employee updated successfully";
        header("location: /emp_tv18/home.php");
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #00ff5573;">
    TV18 Management
    </nav>
    <div class="container my-5 text-center mb-4">
        <h2>Update Employee Data</h2>

        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type = 'button' class = 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="age" value="<?php echo $age; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mobile No</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="mobile_no" value="<?php echo $mobile_no; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label> &nbsp;
                <div class="col-sm-6">
                    <input type="radio" class="form-control-input" name="gender" id="male" value="male">
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-control-input" name="gender" id="female" value="female">
                    <label for="female" class="form-input-label">female</label>
                </div>
            </div>
            <?php
            if(!empty($successMessage)){ 
                echo "
                <div class='row mb=3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>            
                ";    
                
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/emp_tv18/home.php" role="button">Cancel</a>
                </div>
            </div>   
        </form>
    </div>
</body>
</html>