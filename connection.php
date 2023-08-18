<?php

$server_name = "localhost";
$db_User = "root";
$db_Pass = "";
$db_Name = "portfolio";

$conn = mysqli_connect($server_name, $db_User, $db_Pass, $db_Name);

if (!$conn){
    die ("not connected");
}
