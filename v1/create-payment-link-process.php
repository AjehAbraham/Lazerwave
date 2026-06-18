<?php
require_once "sessionPage.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){


//    print_r($_POST);
if(isset($_POST["Message"])){

$message = htmlspecialchars($_POST["Message"]);


}else{

//DO NOTHING AS MESSAGE IS OPTIONAL//
if(empty($message)){
    $message = "";
}else{

    
}

}


if(isset($_POST["title"]) && !empty($_POST["title"])){

$title = filter_var($_POST["title"],FILTER_SANITIZE_STRING);

$title = htmlspecialchars($title);


}else{

    die("Please enter link Titile");
}



if(isset($_POST["amount"]) && !empty($_POST["amount"])){


$amount = (int) filter_var($_POST["amount"],FILTER_SANITIZE_NUMBER_INT);

if(empty($amount)){

    die("Please enter Amount");

}else if ($amount <= 999){

    die("Amount cannot be less than ₦1,000");
}


}else{


    die("Please enter Amount");
}


if(isset($_POST["terms"]) && !empty($_POST["terms"])){


    $terms = htmlspecialchars($_POST["terms"]);


    if($terms == "Yes"){



    }else{

        die("Accept our Terms");
    }


}else{


    die("Please Accept our Terms");
}



$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time = htmlspecialchars(date("H:i:s"));


$ip_addr = htmlspecialchars($_SERVER["REMOTE_ADDR"]);

$hash_link = uniqid() .rand(47528,980764). uniqid();

$status ="Active";


$isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"tablet"));


$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"mobile"));



$isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"windows"));


$isAndriod = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"andriod"));


$isIphone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"iphone"));


$isIpad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"ipad"));


$isIos= $isIpad || $isIphone;



if($isMob){

if($isTab){

    $agent = "Tablet";

}else{


    $agent = "Mobile";
}

}else{

    $agent = "Desktop";
}

if($isIos){

    $user_agent = $agent. " Iphone IOS";

}else if($isAndriod){

$user_agent = $agent . " Andriod";

}else{

$user_agent = $agent. " Windows";

}




//USER DID NOT SELECT AN IMAGE//


if(empty($_FILES["image"]["name"])){

$image_path ="";

//USER DID NOT SELECT IMAGE//
//SO INSERT DATAS//


$insert ="INSERT INTO Payment_link_table(User_id,Amount,Hash_link,
Date_created,Ip_addr,Image_path,Link_message,Time,Title,Terms,Status,User_agent)



VALUES('$_SESSION[New_user]','$amount','$hash_link','$date','$ip_addr','$image_path',
'$message','$time','$title','$terms','$status','$user_agent')

";

if(mysqli_query($conn,$insert)){

    $fullPath = "https://9paywave.000webhostapp.com/payment-gateway?token_keys="
    . $hash_link."&&title=" .$title;
    

    echo "
    
<div class='container-fliud-class'>
<p style='color: mediumseagreen'>Link created successful!</p>
<p>URL: <b>$fullPath</b></p>
<p class='copy-link' onclick='copyLink()' style='color: black;'><i class='fa fa-copy'></i> Copy</p>
<p class='share-link' onclick='shareLink()' style='color: black;'><i class='fa fa-share'></i> Share</p>
<br>
<p class='closeStatus' onclick='HideStatus()'>Close</p>
</div>

<input type='text' value='$fullPath' id='myInput' style='display: none;'>

<input type='text' style='display: none;' value='$title' id='Title'>

    ";
    die();

}else{


    die("Error occur creating Link,Please try again");
}

}else{
  

if($_FILES["image"]["size"] >= 2000000){


die("File too large");



}else{




$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = $finfo -> file($_FILES["image"]["tmp_name"]);
$mime_types =["image/gif", "image/png", "image/jpeg"];

if(! in_array($_FILES["image"]["type"],$mime_types)){
 
die("invalid file type,only Gif,Png,Jpeg supported");


}

$random = uniqid(). rand(172634,1928462). uniqid();

$pathinfo = pathinfo($_FILES["image"]["name"]);

$base = $pathinfo["filename"];

//$base = preg_replace("/[^\w-]", "_", $base);

$filename =  
$random . $base . "." . $pathinfo["extension"];

$destination = __DIR__. "/Link-images/" . $filename;

$i = 1;

while (file_exists($destination)){
    
$random =  "image".uniqid(). rand(87197,1293540) . uniqid();


$filename = $base . "($i)." .$pathinfo["extenstion"];

$destination  = __DIR__ . "/Link-images/" . $filename;

$i++;

}
if (! move_uploaded_file($_FILES["image"]["tmp_name"],$destination)){



    die("Error in uploading your file,please try again");


}else{

$image_path = $filename;

    include __DIR__.("/db_connection.php");


    $insert ="INSERT INTO Payment_link_table(User_id,Amount,Hash_link,
    Date_created,Ip_addr,Image_path,Link_message,Time,Title,Terms,Status,User_agent)
    
    
    
    VALUES('$_SESSION[New_user]','$amount','$hash_link','$date','$ip_addr','$image_path',
    '$message','$time','$title','$terms','$status','$user_agent')
    
    ";
    
    if(mysqli_query($conn,$insert)){
        echo "
    
        <div class='container-fliud-class'>
        <p style='color: mediumseagreen'>Link created successful!</p>
        <p>URL: <b>$fullPath</b></p>
        <p class='copy-link' onclick='copyLink()' style='color: black;'><i class='fa fa-copy'></i> Copy</p>
        <p class='share-link' onclick='shareLink()' style='color: black;'><i class='fa fa-share'></i> Share</p>
        <br>
        <p class='closeStatus' onclick='HideStatus()'>Close</p>
        </div>
        
        <input type='text' value='$fullPath' id='myInput' style='display: none;'>
        
        <input type='text' style='display: none;' value='$title' id='Title'>
        
            ";
            die();


        die("success");
    }else{
    
    
        die("Error occur creating Link,Please try again");
    }
    

    

}

}


}
//END OF IMAGE UPLOAD//


/*x
if($conn -> query($insert) == TRUE){


$hash_link = "lazerwave.000webhostapp.com/New payment.php?name=$hash_link&user=$user[Surname]$user[Last_name]$user[First_name]&Card_top=$user[id]";


echo "<div class='Link_generated'>

<p>$hash_link </p>


<p onlick='copy_link()'><i class='fa  fa-link'></i> Copy link</p>

<p onclick='window.location.reload()'><i class='fa fa-refresh'> </i> Recreate link</p>


<input type='hidden' value='$hash_link' id='link_value'>

</div>
";



}else{



$message_status ="Error creating link,please try again." .$conn -> error;

require_once "Failed.php";


}





*/

}else{

    header("location: Warning");
    exit;
}




?>