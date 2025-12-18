<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

}

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "lazer_wave";

$conn = mysqli_connect($servername,$db_username,$db_password,$db_name);


if ($conn == TRUE){

 //echo "connected";

}else{

  die("Server  Error ". mysqli_connect_error());

}

