<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <?php
        if(isset($_GET['message'])){
            echo "<h4>".$_GET['message']."</h4>";
        }
        ?>
    <form class="form" action ="/emp_tv18/login_process.php" method="post" >
        <div class="form-group">
            <label for = "uname">Username</label>
            <input type="text"  name="uname" placeholder="Enter Username" class="form-control">
        </div>
        <div class="form-group">
            <label for = "passwords">Password</label>
            <input type="password" name="passwords" placeholder="Enter Password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="login" class="btn-login">
        </div>
    </form>
    </div>
</body>
</html>