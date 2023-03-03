<?php

/*if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning.php");
  exit;

      header('HTTP/1.0 403 Forbiddden',TRUE,403);
      die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}*/

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "Lazer_wave_db";

$conn = mysqli_connect($servername,$db_username,$db_password,$db_name);


if ($conn == TRUE){

 // echo "connected";

}else{
  echo "db created";
}

/*
$delete_db = "CREATE DATABASE Lazer_wave_db";


if ($conn -> query($delete_db) == TRUE){



    echo "database deleted";
}
*/
