<?php
require_once __DIR__.("/sessionPage.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){   

 //   die(print_r($_POST));

if(empty($_FILES)){

   die("Please select a file");
  

}
/*
if ($_FILES["image"]["size"] > 1000000){



    die("file too large,max(10mb)");

   
}*/
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = $finfo -> file($_FILES["image"]["tmp_name"]);
$mime_types =["image/gif", "image/png", "image/jpeg"];
if(! in_array($_FILES["image"]["type"],$mime_types)){
 
die("invalid file type,only Gif,Png,Jpeg supported");


}

$dp_date = date("d D F Y");

$dp_time = date("H:i:sa");

$random =$dp_date. " "."(". $_SESSION["New_user"] . ")." . " image ". rand(). uniqid();

$pathinfo = pathinfo($_FILES["image"]["name"]);

$base = $pathinfo["filename"];

//$base = preg_replace("/[^\w-]", "_", $base);

$filename =  
$random . $base . "." . $pathinfo["extension"];

$destination = __DIR__. "/Uploads/" . $filename;

$i = 1;

while (file_exists($destination)){
    
$random = $_SESSION["New_user"] . "image". rand(45328,981230) . uniqid();


$filename = $base . "($i)." .$pathinfo["extenstion"];
$destination  = __DIR__ . "/Uploads/" . $filename;

$i++;

}
if (! move_uploaded_file($_FILES["image"]["tmp_name"],$destination)){



    die("Error in uploading your file,please try again");


}else{


    include __DIR__.("/db_connection.php");




 
$date_up =htmlspecialchars( date("Y-m-d H:i:s"));
$time = date("H:i:s");


 $upload ="INSERT INTO Profile_picture (User_id,Image_path,Date_id,Time_id)
 
 VALUES('$_SESSION[New_user]','$filename','$date_up','$time')
 ";

 if (mysqli_query($conn,$upload)){

   // $message_status = "server error,please try again later <br> <b onclick='window.history.back(-2)'>Go back</b>";
   
   //die("Profile picture uploaded successfully");
   die("Success");

 }else{
   


  die("Error,fail to uplaod,please re-upload again");


 }

mysqli_close($conn);
}

}
?>