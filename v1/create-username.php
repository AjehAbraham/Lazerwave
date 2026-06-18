<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

    //  header('HTTP/1.0 403 Forbiddden',TRUE,403);
     // die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}else 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

}


$fileName = $_SERVER["PHP_SELF"];

$fileName = basename($fileName,".php");
?>




<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <!--link rel="stylesheet" href="Src/Css/Reset password.css"-->
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title><?php echo $fileName; ?></title>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
      </head>
      <body>

      
    <style>
      .username-container-fliud{
  overflow: hidden;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  width: 0;
  font-size: 13px;
text-align: center;
background-color: white;
z-index: 3;
position: fixed;
transition: 0.2s;
      }
      .username-container-fliud h1{
font-size: 18px;
text-align: center;
color: #222;
      }
      
      .username-container-fliud input[type=text]{
        padding: 8px 8px;
        border-radius: 2rem;
        border: 2px solid #ccc;
        margin: auto;
        width: 80%;
        outline: 0px;
        font-size: 13px;
      }
      @media screen and (min-width: 600px){
        .username-container-fliud input[type=text]{
          width: 30%;
          font-size: 13px;
        }
      }
      .username-container-fliud input[type=submit]{
        border: none;
        background-color: rgb(0,0,56);
        color: white;
        border-radius: 2rem;
        padding: 8px 8px;
        font-size: 15px;
        margin: auto;
        width: 62%;
        cursor: pointer;
      }
      @media screen and (min-width: 600px){
        .username-container-fliud input[type=submit]{
          width: 30%;
        }
      }
      .username-container-fliud p{
        text-align: center;
        color: red;
      }
      .Dark-mode   .username-container-fliud{
        background-color: rgb(0,0,56);
        color: white;
      }
      .Dark-mode   .username-container-fliud h1{

        color: white;
      }
      .Dark-mode   .username-container-fliud input[type=submit]{
        background-color: rgb(0,0,20)
      }
      
      .Dark-mode   .username-container-fliud input[type=text]{
        
        background-color: #f1f1f1;
      }
      </style>

<?php include "Loader-refresh.php"; ?>

      <div class="username-container-fliud">

        <h1><i class="fa fa-user"></i>  Create Username  </h1>
        <form id="FormId_Data">

        <label><b>Username</b></label>
        <br>
        <input type="text" name="username" oninput="Verify_username()" 
        placeholder="E.g <?php echo ($user['First_name']); ?>">
<br>

        <p class="username_error"></p>
       
       <p class="username-error_message"></p>

        <input type="submit" value="create username" >

       
</form>
    </div>


<script>
  $(document).ready(function (e) {
        
        $("#FormId_Data").on('submit', (function(e){
        
        
          e.preventDefault();
          
        document.querySelector(".loader-overlay-refresh").style.display= "block";
        
           $.ajax({
         
            url: 'Process/Info/create-username',
        type : 'POST',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
            success:function(Data){
        
          document.querySelector(".loader-overlay-refresh").style.display= "none";
        
             document.querySelector(".username-error_message").innerHTML = Data;
   
  if(Data == "success"){
    document.querySelector(".username-error_message").innerHTML = "";

    
    document.querySelector(".username-container-fliud").style.width = "0%";
    document.querySelector("#FormId_Data").reset();

    alert("Username created");

  }else if(Data == "\r\nsuccess"){

    document.querySelector(".username-error_message").innerHTML = "";

    document.querySelector(".username-container-fliud").style.width = "0%";

    document.querySelector("#FormId_Data").reset();

  alert("Username created");

  }

  
             
            },
            error:function(Data){
             document.querySelector(".loader-overlay-refresh").style.display= "none";
        
              document.querySelector(".username-error_message").innerHTML = Data;
        
            }
          
           });
        
        
        
        }));
        
        
          });
  
          //COMPELETE TRASACTION FORM//
          function OpenUserrname(){
       
    
document.querySelector(".username-container-fliud").style.width = "100%"

          }

          const  User_Username = setTimeout(OpenUserrname,4000);

              
          function Verify_username()  {
             
             document.querySelector(".username_error").innerHTML ="please wait...";
          
             var form = $("#FormId_Data");

  var url = "Process/Info/verify-username";
  
  $.ajax ({
    type: "POST",
    url: url,
    data: form.serialize(),
  dataType:'json',
  encode: true,
  success: function(data){
      //form has beeen submitted//
  
      console.log();
  
      
      var error = document.querySelector(".username_error");
  
  error.innerHTML = data.responseText;
  
    },
    error: function(data){
 
      var error = document.querySelector(".username_error");
  
  error.innerHTML = data.responseText;
  
  }
  });
     
         }
           
       
 </script>  
