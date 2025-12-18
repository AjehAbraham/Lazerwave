<?php require_once __DIR__.("/sessionPage.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["dataDog"]) && !empty($_POST["dataDog"])){

$dog = (int) filter_var($_POST["dataDog"],FILTER_SANITIZE_NUMBER_INT);

$dog = mysqli_real_escape_string($conn,$dog);
$dog = stripslashes($dog);
$dog = trim($dog);

$check = "SELECT * FROM Register_db WHERE Account_no='$dog'";

$Results = mysqli_query($conn,$check);

if(mysqli_num_rows($Results) > 0){


  //USER EXITS//

  $beneficary = $dog;


}else{

  //USER DOES NOT EXIST //


  $beneficary = "";
}


}else{


  //DO NOTHING AS FORM IS EMPTY//
  $beneficary = "";
}

}else{

  $beneficary = "";
}


?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Src/Css/sendmoney.css">
    <link rel="stylesheet" href="Src/Css/saved-beneficiary.css">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>Transfer</title>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
      </head>
      <body>

      <?php require_once "default_sidebar.php"; ?>
   

      <div class="container-fluid-saved-overlay">
    <div class="container-fluid-saved">
      <p><b id="openSavedbtn">Saved Beneficiary</b> <b id="openRecentbtn"> Recent Beneficiary</b></p>
    </div> 

    <?php 
//FETCH SAVED BENEFICIARY//

$fetchDAta = "SELECT * FROM Beneficiary WHERE User_id ='$_SESSION[New_user]' ORDER BY id DESC";

$queryResult = mysqli_query($conn,$fetchDAta);

if(mysqli_num_rows($queryResult) > 0){

//DROP RESULT//
echo '
<div class="saved-detail-container"> 
';
while($UsersBenefit = mysqli_fetch_assoc($queryResult)){

  //FETCH USER(S) DETAILS FIRST//

  $p_select = "SELECT * FROM Register_db WHERE Account_no='$UsersBenefit[Acct_no]'";

  $acctResult = mysqli_query($conn,$p_select);
  $details = mysqli_fetch_assoc($acctResult);
  //NOW USE DETAILS TO FETCH USER PROFILE PCITURE//

  $dpselect = "SELECT * FROM Profile_picture WHERE User_id='$details[id]'";

$dpResult = mysqli_query($conn,$dpselect);
if(mysqli_num_rows($dpResult) > 0){

  $dp = mysqli_fetch_assoc($dpResult);

  $UserDP = "Uploads/". $dp["Image_path"];

}else{

//USER HAS NOT YET UPLOADED PICTURE SO USE DEFAULT DP
$UserDP = "Images/Null-image.png";


}

echo "
<div class='saved-selector'>
      <form onsubmit='return false' class='BeneData' id='$UsersBenefit[Acct_no]'> 
      <input type='hidden' value='$UsersBenefit[Acct_no]' name='acct_no'>
      <button>
      <p><img src='$UserDP'><br> <b>$UsersBenefit[Full_name]</b>
         <br> $UsersBenefit[Acct_no] </button></form></p>
</div>";

}

echo "
<br><br>
</div>";

}else{

//NO SAVED BENEFICIARY FOUND//

echo "
<div class='saved-detail-container'>
    <p style='color: red; text-align: center;'>No saved beneficary
 found,please click continue</p>
 </div>";

}


//NOW FETCH ALL ACCOUNT USER HAS INTERACTED WITH FROM LATEST TO OLDEST//

$recentSelect = "SELECT * FROM Transaction_history WHERE User_id='$_SESSION[New_user]' 
AND Type='Transfer' OR Type='Money Request' ORDER BY id DESC";

$recent = mysqli_query($conn,$recentSelect);

if(mysqli_num_rows($recent) > 0){

echo '
<div class="recent-detail-container">';

while($recentDetails = mysqli_fetch_assoc($recent)){
//CHECK IF USER NAME EXITS TWICE TO REMOVE THE OLDEST ONES//


//FETCH USE FULL NAME//

$users = "SELECT * FROM Register_db WHERE Account_no='$recentDetails[Receiver_account_no]'";

$recentresult = mysqli_query($conn,$users);

$recentUsers = mysqli_fetch_assoc($recentresult);


//PREVENT SHOWING USER DETAILS TOO//
if(in_array($user["Account_no"],$recentUsers)){

  continue;

}


//FETCH USER PROFILE PCITURE//

$dpselect = "SELECT * FROM Profile_picture WHERE User_id='$recentUsers[id]'";

$dpResult = mysqli_query($conn,$dpselect);
if(mysqli_num_rows($dpResult) > 0){

  $dp = mysqli_fetch_assoc($dpResult);

  
  $UserDP = "Uploads/". $dp["Image_path"];

}else{

//USER HAS NOT YET UPLOADED PICTURE SO USE DEFAULT DP
$UserDP = "Images/Null-image.png";


}


  echo "
  <div class='saved-selector'>
    <form onsubmit='return false' class='BeneData' id='$recentUsers[Account_no]'>
     <input type='hidden' value='$recentUsers[Account_no]' name='acct_no'>
    <button>
    <p><img src='$UserDP'><br> <b>
$recentUsers[Surname] $recentUsers[Last_name] $recentUsers[First_name]
</b>
       <br> $recentUsers[Account_no] </button></form></p>
  </div>
  ";

}
  
echo "
<br><br><br><br></div>";

}else{

//NO RECENT BENEFICIARY FOUND//

echo "<div class='recent-detail-container'><p style='color: red; text-align: center;'>No recent 
beneficary found,please click continue</p></div>";


}

    ?>


<div class="option-container">
  <br>
  <p class="closeDetailbtn">Continue</p>
  <br><br>
</div>

</div>



         <div class="sendmoney-container">
     
<h1>Transfer Money(To Lazewave only)</h1>


<form  id="form-data">
<label><b>Username/Account Number:</b></label>
<br>
<input type="text" value="<?php echo $beneficary ?>"
 name="Acct_no" placeholder="Enter Username or Account number..." inputmode=""
  oninput="check_acct_no(event)" onchange="check_acct_no(event)" id='acctNO'>

<p class="acct_error_message" style="color: red;"></p>



</div>
     </div>
     
     
<p class="error_message" style='color: red;text-align: ;'></p>


     
<?php require_once "Loader.php"; 

 require_once "Loader-refresh.php";
 

 require_once "Transaction-pin-box.php";

 
 echo "</form>";
  ?>
        
        
      
<script src="Src\Js\saved-beneficary.js"></script>
 <script src="Src/Js/sendmoney.js"></script>
  
        
        <?php 
require_once __DIR__.("/Network.php");

require_once "Non-script.php";

        ?>
      </body>
      </html>