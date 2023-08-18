<?PHP
session_start();
require 'connection.php';

if(isset($_POST['submit'])){
$email = $_POST["email"];
$password = $_POST["password"];
$result = mysqli_query($conn, "SELECT * from tbl_users where email = '$email'");
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) > 0){

    if($password == $row['password']){
        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];
        header("Location: index.php");  
    }
    else {

        echo "<script>alert('Wrong password')</script>";
    }
}
    else{
    echo "<script>alert('User not Registered')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container">
    <header>
        <h2>Login</h2>
    </header>

    <form method="POST">

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
    </div>
    
    <button type="submit" class="btn btn-primary" name="submit">Login</button>

    
    </form>
    <br>
    <a href="signup.php">Signup</a>

    </div>
</body>
</html>