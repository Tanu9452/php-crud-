<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
    <link rel="stylesheet" type="text/css" href="style1.css">
        
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #00ff5573;">
    TV18 Management 
    </nav>
        <div class ="container">  
            <div class="box1">
                <h2>All Empolyees</h2>
                <div class="col-sm-2 d-grid">
                    <a class="btn btn-outline-primary mb-3" href="/emp_tv18/create.php" role="button">Add Empolyee</a>
                </div>
            </div>
            
            <table class ="table table-hower text-center table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Mobile Number</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $servername = "localhost";
                    $username="root";
                    $password = "";
                    $database = "emptv18";

                    $connection = new mysqli($servername, $username, $password, $database);

                    if($connection->connect_error){
                        die("connection failed:".$connection->connect_error);
                    }


                    $sql ="select * from employee";

                    $result =$connection->query($sql);

                    if(!$result){
                        die("query failed: " .$connection->error);
                    }
                    else{
                        while($row = $result->fetch_assoc()){
                            echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[first_name]</td>
                                <td>$row[last_name]</td>
                                <td>$row[email]</td>
                                <td>$row[age]</td>
                                <td>$row[mobile_no]</td>
                                <td>$row[gender]</td>
                                <td>
                                    <a class ='btn btn-primary btn-sm mb-0' href='/emp_tv18/edit.php?id=$row[id]'>Edit</a>
                                    <a class ='btn btn-danger btn-sm' href='/emp_tv18/delete.php?id=$row[id]'>Delete</a>
                                    </td>
                            </tr>    
                            ";
                        }
                    }

                    ?>
                    
                    
                </tbody>
                
            </table>
            <div class="col-sm-2 d-grid">
                <a class="btn btn-outline-danger mb-3" href="/emp_tv18/index.php" role="button">Logout</a>
            </div>
            </div> 
            
    </body>
</html>
            
