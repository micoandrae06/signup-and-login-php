<?php
session_start();

//Delete Data
if (isset($_GET['id'])){
    $id = $_GET['id'];
    require 'connection.php';
    $sql = "DELETE FROM tbl_users where id = $id";

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["delete"] = "Book Deleted Successfully";
        header("Location:index.php");
    }
}
?>