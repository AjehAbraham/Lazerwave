<?php

require_once __DIR__.("/db_connection.php");

//CHECK IF USERNAME EXIST OR NOT//


$username_test ="SELECT * FROM Username WHERE User_id='$_SESSION[New_user]'";

//$username_result_check =$conn -> query($username_test);

$username_result_check = mysqli_query($conn,$username_test);


if (mysqli_num_rows($username_result_check) > 0 ){

//DO NOTHING 



}else{

//No USERNAME FOUND SO SHOW POP UP//


require_once __DIR__.("/create-username.php");



}


?>