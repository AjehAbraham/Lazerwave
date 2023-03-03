

<?php 
require_once __DIR__.("/sessionPage.php");


if (!isset($_SESSION["New_user"])){
    header("location:login.php");
    exit;
}


//require_once __DIR__.("/Network.php");

?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Bank card.css">
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
<title>Bank card</title>
      </head>
      <body>


        <div class="bank-card-container">

          <a href="index.php">  <i class="fa fa-home" style="float:right;margin-top:2px;font-size:25px;"></i>
</a> 
          <span class="material-symbols-outlined" onclick="window.history.back()">arrow_back</span>
<h1><a href="VirtualCard.php"><i class="fa fa-credit-card"></i></a>Bank card</h1>

        </div>

<?php 
require_once __DIR__.("/db_connection.php");

$selct_card =  "SELECT * FROM Credit_card WHERE User_id ='$_SESSION[New_user]'";


$result = $conn -> query ($selct_card);


if ($result -> num_rows > 0){

        while ($card = $result -> fetch_assoc()){

                

               /* $card["Credit_card_no"];*/

                echo "
                <div class='saved-cards'>
        
        <p> ".$card["Credit_card_no"].  "<i class='fa fa-trash'></i></p>
        
                </div>";
        }
}else{
        echo "<p style='text-align:center;font-size;25px;'>No card found,apply <a href='VirtualCard.php'> here</a></p>";
}


?>

        <div class="add-card">
           <p> <i class="fa fa-plus" id="open-add-card-btn"></i> Add card</p>
        </div>


        <div class="add-card-information">
<span class="material-symbols-outlined" id="close-btn">close</span>

<h1 class="open-add-card-btn"><i class="fa fa-credit-card-alt"></i> Add card</h1>


            <label for="name"><b>Name:</b></label>
            <input type="text" name="full-name" placeholder="Name on card...">
            <br>
            
            <label for="name"><b>Card number:</b></label>
            <input type="number" name="card-number" placeholder="Card no...">
            <br>

            <label for="cvv"><b>Cvv</b></label>
            <input type="tel" placeholder="Cvv">
            <br>

            <label for="date"><b>Expiry date:</b></label>
            <input type="date" name="date">
            <br>



            <label for="card pin"><b>Pin</b></label>
            <input type="number" name="pin" placeholder="pin...">
            <br>
<input type="submit" value="Add card" onclick="alert('coming soon')">

        </div>

        <script src="Bank card.js"></script>
        </body>
        </html>