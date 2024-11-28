<?php 
  $hostname = "localhost";
  $username = "jbphilip";
  $password = "qpoFmwU0";
  $database = "jbphilip";

  $connect = mysqli_connect($hostname, $username, $password, $database);

  if ($connect) {
    echo "<p style='text-align: center; color: green;'>Connection established with MySQL database: <span style='font-weight: bold; color: red;'> $database </span> succesfully!</p>";
  } else {
    echo "<p>Connection Failed: ". mysqli_connect_error() ."</p>";
  }

?>