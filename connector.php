<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calendar';

$link = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>