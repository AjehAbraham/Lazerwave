<?php
require_once "sessionPage.php";
?>
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/payment-link-history.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>

<!--ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->


<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">


<!-- AUTO INCREASE TEXT AREAS SIZE-->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.3.min.js"></script>

<!--END OF TEXT AREA -->
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>

<title>Payment link History</title>
</head>
<body>
<?php require_once "default_sidebar.php"; ?>
<div class='All-link-container'>


<p>All Payment Link(s) Created</p>


<?php

require_once "db_connection.php";


$fetch_links = "SELECT * FROM Payment_link_table WHERE User_id='$_SESSION[New_user]' ORDER BY id DESC";

$fetch_result = mysqli_query($conn,$fetch_links);

if(mysqli_num_rows($fetch_result) > 0){
    
echo "<table>
<th>Link Title</th>

<th>Date Created</th>
<th>Amount</th>
<th>Status</th>
<th>Option</th>
";

while($fetch_results = mysqli_fetch_assoc($fetch_result)){


//$total  +=$fetch_results["Amount"];

//$total_amount ="₦". number_format($total).".00";


//echo $total_amount;

$dates = date("d D F Y",strtotime($fetch_results["Date_created"]));

$amounts = "₦".number_format($fetch_results["Amount"]).".00";

$date = date("d D F Y",strtotime($fetch_results["Date_created"]));


if($fetch_results["Status"] == "Active"){

$status = "Active ";

$status_color ="style='color: mediumseagreen'";



}else{

$status = "InActive";

$status_color ="style='color: red;'";


}


echo "<tr>
<td>
$fetch_results[Title]</td>
<td>$date</td>
<td>$amounts</td>
<td>$status</td>
<td><a href='edit-link?token_key=$fetch_results[Hash_link]'>Edit</td>
</tr>";



}

echo "</table>";



}else{

echo "<p style='text-align: center; color: red;'>No Payment link found</p>";



}



?>

</div>
<script>
      function Checkmode(){

var current_mode = localStorage.getItem("Theme");

if(current_mode == "Dark-mode"){


var dark = document.body;

dark.classList.add("Dark-mode");



}else{

var dark = document.body;

dark.classList.add("Light-mode");



}


}

var mode = Checkmode();
</script>
<script src=""></script>

    <?php require_once "Network.php";
    require_once __DIR__.("/Non-script.php"); 
     ?>

</body>
</html>