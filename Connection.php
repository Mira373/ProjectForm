<?php 

    $servername = "localhost";
    $username = "FormDB";
    $password = "FormDB2022";
    $dbname = "formdata";


// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connection) {
    die("error ");
  }
?>