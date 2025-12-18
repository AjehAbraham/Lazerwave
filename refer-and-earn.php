<?php
require_once __DIR__.("/sessionPage.php");


?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/refer-and-earn.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>

<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->


<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">

<title>Refer and Earn</title>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
</head>
<body>

<?php require_once "default_sidebar.php"; ?>

<div class="refer-container-fluid">

<p>Generate Referal Link</p>


<p>Refer and earn when the person you refer register and uses lazerwave.</p>


<?php

$current = "SELECT * FROM Refer_and_Earn WHERE User_id='$_SESSION[New_user]' ORDER BY  id DESC LIMIT 1";
   
   $current_result  = mysqli_query($conn,$current);
   
   
   if(mysqli_num_rows($current_result) > 0){
   
   $link_result = mysqli_fetch_assoc($current_result);
   
   //$_SESSION["Current_link"] = $link_result["Referal_code"];
   
   
   
   $currentLink = "https://9paywave.000webhostapp.com/create-account?referalcode=".$link_result["Link_key"];
   
   

   
   }else{
   
   
   //NO LINK FOUND//
   $currentLink = "";
   
   
   }
   
   
?>

<p class="error_message" style="font-weight: bold;"><?php 

echo $currentLink; ?> </p>

<p><b style="color: red;">Note when you re-generate new link the previous link will be still be valid.</b></p>
<input type="text" style="display:none" value="<?php echo $currentLink; ?>" id="link">


<?php if(isset($currentLink) && !empty($currentLink)): ?>

<p><b onclick='CopyLink()'><i class='fa fa-copy' style="cursor: pointer;"></i> Copy link </b>
<b onclick='share_link()'> <i class='fa fa-share' style="cursor: pointer;"></i> Share link</b>
</p>

<?php endif; ?>


<form id="FormData">

<input type="hidden" value="refer" name="refer">

 <input type="submit" value="Generate Link">

</form>
<?php require_once "Loader.php"; ?>

</div>


<div class="refer-history-container">

<p>Referal history</p>

<?php

$sleect =" SELECT * FROM Refer_and_record WHERE User_id='$_SESSION[New_user]' ORDER BY id DESC";

$Result = mysqli_query($conn,$sleect);

if(mysqli_num_rows($Result) > 0){
   
   echo "
   <table>
   
   <th>Date Created</th>
   <th>Amount</th>
   <th>Referal code</th>

   
   ";

while($ReferData = mysqli_fetch_assoc($Result)){

   $amount = "₦". number_format($ReferData["Amount"]).".00";

   $date = date("d D F Y",strtotime($ReferData["Date"]));

   $linkKey = $ReferData["Link_key"];

echo "
<tr>
<td> $date</td>
<td> $amount</td>
<td> $linkKey</td></tr>";

}
echo "</table>";

}else{

   echo '<p style="text-align: center;"> No Referal History</p>';
}

?>



</div>




<?php 
require_once __DIR__.("/Non-script.php"); 
require_once __DIR__.("/Network.php");
 ?>


<script src="Src/Js/refer-and-earn.js"></script>

</body>
</html>