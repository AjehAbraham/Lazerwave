<?php
require_once "sessionPage.php";

?>
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Transaction history.cs">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>

<!--ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link--> 


<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">

<title>Transaction History</title>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
</head>
<body>

<?php require_once "default_sidebar.php"; ?>

<div class="notification-header">
<h4 style="text-align: center;color: #666;">Transaction history <i class="fa fa-database" style="color: skyblue"></i></h4>
<form id="Form-Data">
<p class="refresh_notification">Refresh 
<i class="fa fa-refresh" ></i></p>
            <p>
              
              <select name="duration" onchange="Submit_category()" >
                <option>All Time</option>
                <option>This Week</option>
                <option>This Month</option>
            
</select>

<b>
  <select name="type" onchange="Submit_category_two()" class="select">
  <option>All</option>
    <option>Successful</option>
    <option>Failed</option>
</select></b></p>

</form>
        </div>

        <p class="error_message"></p>
       
        <style>
          
body {
   
   font-size: 13px;
   background-color: white;
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   margin: 0;
 }
 .notification-header{
 
 padding: 12px 12px;
 margin-bottom: 29px;
 
 }

 .notification-header i{
 
 font-size: 16px;
 margin-top: 7px;
 
 }
 
 .refresh_notification {
   padding: 10px 10px;
   margin: auto;
   text-align: center;
   color: white;
   background-color: rgb(0,0,56);
   width: 34%;
   border-radius: 2rem;
   font-size: 13px;
   margin-top: 15px;
   cursor: pointer;
   }
   .refresh_notification i{
   font-size: 13px;
   
   }
   .notification-header select{
border-radius: 2rem;
width: 35%;
font-size: 13px;
    padding: 10px 10px;
    outline: 0;
    border: 2px solid #ccc;

   }
 
 .notification {
   background-color: #555;
   color: white;
   text-decoration: none;
   padding: 15px 15px;
   position: relative;
   display: inline-block;
   border-radius: 2px;
   float: right;
 }
 
 .Dark-mode{
     color: white;
     
     background-color: rgb(0,0,20);
 }
 .Dark-mode .notification{
     background-color: black;
     color: white;
 }
 .Dark-mode .notifications-container p:nth-child(1){
     
     color: white;
     background-color: rgb(0,0,56);
 }
 .Dark-mode .notifications-container p:nth-child(3){
     
     color: white;
  
 }
 
 .Dark-mode .notifications-container p:nth-child(5){
     
     color: white;
  
 }

 .Dark-mode .notifications-container p:nth-child(6){
     
     color: white;
  
 }


 .notification:hover {
   background: red;
 }
 

 .notifications-container{
 padding: 10px 10px;/*
 background-color: rgb(0,0,52);
 color: white;*/
 }
 
 
 @media  screen and (min-width: 600px){
 .notifications-container{
 margin: auto;
 width: 100%;
 }
 }
 
 .notifications-container a:link{
 
 color: white;
 text-decoration: none;
 }
 .notifications-container a:visited{
 
 color: white;
 text-decoration: none;
 }
 .notifications-container img{
   border-radius: 50%;
   width: 50px;
   height: 50px;
   border: 2px solid skyblue;
 }
 .notifications-container p:nth-child(1){
 background-color: #f1f1f1;
 color: #333;
 padding: 10px 10px;
 text-align: center;
 }
 .notifications-container p:nth-child(2){
 font-size: 13px;
 color: #f1f1f1;
 }
 
 .notifications-container p:nth-child(3){
 text-align: center;
 color: #555;
 }
 .notifications-container b{
 text-align: center;
 margin-left: auto;
 margin-right: auto;
 display: block;
 color: mediumseagreen;
 font-size: 15px;
 }
 
 .notifications-container p:nth-child(5) a:link{
     text-decoration: none;
     color: #555;
 }
 .notifications-container p:nth-child(5){
 text-align: center;
 color: #666;
 
 }
 .notifications-container p:nth-child(7){
 width: 45%;
 padding: 10px 10px;
 background-color: rgb(0,0,52);
 color: white;
 text-align: center;
 float: right;
 border-radius: 2rem;
 
 }
 @media screen and (min-width: 600px){

  .notifications-container p:nth-child(7){
    width: 20%;
    margin-right: 15px;
  }

 }
 .notifications-container  a:hover p:nth-child(6) {
 background-color: red;
 }
 .error_message{
   text-align: center;
   color: red;
 }
 .Dark-mode input{
   background-color: #f1f1ff;
 }
 </style>

        <?php

require_once "Network.php";

 require_once "Loader-refresh.php"; 

 
require_once "Loader.php";
require_once __DIR__.("/Non-script.php"); 
 
?>


<script src="Src/Js/Transaction-history.js"></script>
</body>
</html>