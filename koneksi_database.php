<?php
$servername = "localhost";
$username = "eossolut_timpos";
$password = "Timpos1@";
$database = "eossolut_db_pos";

// Create connection
$con = mysqli_connect($servername,$username,$password,$database);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
  echo "Connected to MySQL";
}
?>