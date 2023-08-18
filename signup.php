<?php
require 'connection.php';
//Add Data
if (isset($_POST["add"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM tbl_users where email = '$email'");

        if (mysqli_num_rows($duplicate) > 0){

            echo "<script>alert('Email already use')</script>";
        }
        else{ 
            if($password == $confirmpassword){

                $sql = "INSERT INTO tbl_users VALUES ('','$name', '$email', '$password')";
                mysqli_query($conn,$sql);
                echo "<script>alert('Added Successful!')</script>";
            }
            else{

                echo "<script>alert('Password does not match')</script>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Signup</title>
</head>
<body>
    <div class="container">
    <header>
        <h2>Signup</h2>
    </header>

    <form method="POST">

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" required>
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
    </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" required>
    </div>
    
    <button type="submit" class="btn btn-primary" name="add">Signup</button>

    
    </form>
    <br>
    <a href="login.php">Login</a>

    </div>
</body>
</html>