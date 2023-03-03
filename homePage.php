<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="home.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<!--link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">
-->

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>




<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Noto+Sans:ital,wght@1,200&family=Oswald:wght@200&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">

      </head>
      <body>

      </div>   
      
      <?php if(isset($user)) :?>   
<div class="login-container-fliud">

<p>Welcome to the future !</p>

<!--img src="images\image.jpeg"-->

</div>
<?php endif;?>
      
      <?php if(!isset($user)) :?>


 <div class="country-region-conatiner">
    <select>
        <option>Nigeria</option>
        <option>Ghana</option>
        <option>South Africa</option>
    </select>
 </div>
 </div>  

 <div class="introduction-conatiner-box">
   <p>lazerwave <i class="fa fa-fire"></i> </p>

    <p>welcome to lazerwave the bank of Africa</p>
    <div class="welcome-message-container-image">
    <img src="images\image-welcome.jpeg" width="130px">
<?php endif;?>
    <?php if(!isset($user)) :?>
    <p><a href="Register.php"> Get started</a></p>

    <?php endif;?>


    
    </div>
    </div>

    <?php if(!isset($user)) :?>
    <div class="welcome-message-container">
      <p>LazerTech is a muti-national comapny founded by young Nigerian business enterprenur who has a very good knowlede in banking and finanace.Our goal is to make internet banking easier,faster and closer to you.Looking for the best internet banking? we got you covered!.Enjoy exciting offers and free transfer to all other local bank in Nigeria,Ghana and South Africa.We have highly trained business expert that can manage your business and bring alot of growth.We can also help you with business ideas that suits you best,so what are you waiting for? choose lazerTech today because we're starting a journey together with seamsless and fast banking.
      </p>
    </div>

    <?php endif;?>

<div class="home-flex">
   <div class="select-option-container">
      <p><i class="fa fa-shopping-cart"></i> Shop  Now</p>
   </div>

   <a href="saved beneficiary.php"><div class="select-option-container">
      <p><i class="fa fa-send"></i> Send money</p></a>
   </div>
</div>


<div class="home-flex">
   <div class="select-option-container">
      <p><i class="fa fa-credit-card"></i> Pay bills</p>
   </div>

   <div class="select-option-container">
      <p><i class="fa fa-exchange"></i> Recieve money</p>
   </div>
</div>

<?php if(!isset($user)) :?>

    <div class="send-money-container">
<p>join millions in using our online banking services.</p>
      <img src="images\image.jpeg"width="100px">
    </div>


    <div class="our-services">
      <h1>We provide services in the following;</h1>

      <p>Acount opening</p>

         <p>Internet Banking</p>
         
       <p> Mobile Banking </p>
         
        <p> Business Account</p>
         
        <p> Cross border Transfer(10+ countries) </p>
         
      <p> Online Payment Link </p>
         
         
       <p> Loans and Grants </p>
         
    </div>






    <div class="Download-app-container">
   <p>Download our app from app store or play store</p>

<img src="images\app-store.jpeg"width="100px">
<p>App Store</p>
      <p>Play store</p>
     
    </div>   
<?php endif;?>
   
    <style>
      body{
  


font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

font-weight: lighter;
text-align: justify;
color: #111;     
      }
      .welcome-message-container{
         text-align: justify;
      }
      .sidebar-container{
         font-weight: 2px;
      }
      .sidebar-container a:visited{
         color: rgb(0,0,180);
      }
      .introduction-conatiner-box a:link{
         text-decoration: none;
         color: rgb(0,0,180);
      }
      .introduction-conatiner-box a:visited{
         color: rgb(0,0,180);
      }
      .select-option-container a:link{
         text-decoration: none;
         color:rgb(0,0,180);
      }
      .select-option-container a:visited{
         color: rgb(0,0,180);
      }
   .send-money-container{
      background-color: rgb(0,52,102)
   }
   .home-flex-last{
      margin-left: auto;
      margin-right: auto;
      width: 100%;
      background-color: coral;
      padding:10px 10px;
   }
   .home-flex-last img{
      margin: 1`0px;
      
   }
      </style>