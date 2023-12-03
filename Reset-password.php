
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Reset-password.css">
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
<title>Reset Password</title>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>
      </head>
      <body>

   

      <noscript>
<div class='noscript'>
    <p> <i class="fa fa-warning"></i> Your browser doesn't support JavaScript or javascript appear to have been turn off,please go to your browser setting to turn javascript ON.</p>
    </div>
      <style>
      .noscript{background:black;color: white;
      
      position: fixed; 
      top: 0; 
      bottom: 0;
      left: 0;
      right: 0;
      text-align: center;
      font-size: 27px;
      width: 100%;
      height: 100%;
      z-index: 4;
          
          
      }
      noscript i{
        color: red;
      }
      </style>
      
    </noscript>     

      <span class="material-symbols-outlined" 
      onclick="window.history.back()" style="color:rgb(0,0,180);font-size: 15px;cursor: pointer;">arrow_back</span>
    
    


      <div class="reset-password-container">

        <h1><i class="fa fa-cogs"></i> Reset Password  </h1>
        <form id="FormData">

        <label for="email"><b>E-mail:</b></label>
        <br>

        <input type="email" name="email" id="email"  value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''?>" placeholder="Enter your email...">

        <br>

        <input type="submit" value="Reset Password" >
        <p class="status-message"></p>
</form>
    </div>

<?php require_once "Loader-refresh.php";

//include __DIR__.("/logo.php"); 
        
        require_once __DIR__.("/Network.php");
        
                ?>
                <script src="Src/Js/reset-password.js"></script>
    </body>
    </html>