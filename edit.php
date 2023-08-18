<?php            
session_start();

//Update Data
require 'connection.php';
if (isset($_POST["edit"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM tbl_users where email = '$email'");
        $id = mysqli_real_escape_string($conn, $_POST["id"]);


        if ($password == $confirmpassword ){

            $sql = "UPDATE tbl_users SET name = '$name', email = '$email', password = '$password' where id = $id";
            mysqli_query($conn, $sql);
            echo "<script>alert('Edit successful')</script>";
            header("Location: index.php");
            
        }
        else{
            echo "<script>alert('Password does not match')</script>";
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
        <h2>Edit User</h2>
    </header>

    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            require ("connection.php");
            $sql = "SELECT * FROM tbl_users where id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            ?>
    <form method="POST">

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" required value="<?php echo $row["name"]; ?>">
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" required value="<?php echo $row["email"]; ?>">
    </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required value="<?php echo $row["password"]; ?>">
    </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" required>
    </div>
    
    <input type="hidden" name="id" value='<?php echo $row['id']?>'>
    <button type="submit" class="btn btn-primary" name="edit">Edit</button>

    
    </form>
    <?php
    }

    ?>
    <br>
    <a href="index.php">Back</a>

    </div>
</body>
</html>