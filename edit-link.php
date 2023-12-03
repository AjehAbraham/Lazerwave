<?php
require_once "sessionPage.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){

if(isset($_GET["token_key"]) && !empty($_GET["token_key"])){


$token = htmlspecialchars($_GET["token_key"]);

require_once "db_connection.php";


$select = "SELECT * FROM Payment_link_table WHERE User_id='$_SESSION[New_user]' AND Hash_link='$token'";


$result = mysqli_query($conn,$select);

if(mysqli_num_rows($result) > 0){

$results = mysqli_fetch_assoc($result);

$amount= $results["Amount"];
//require_once "coming-soon_page.php";
//die();
//die("Coming soon");

if($results["Status"] == "Block"){

    $status = "Activate Link";
    $check = "checked";
}else if($results["Status"] == "Active"){


    $status = "Block Link";
    $check = "";
}else{

    $status = "Block";
    $check ="";
}

//echo $amount;
$amounts = "₦".number_format($results["Amount"]) . ".00";
$link = "https://9paywave.000webhostapp.com/payment-gateway?token_keys=". $results['Hash_link']. "&title=". $results["Title"];

$data = "
<div class='form-container'>
<h1>$results[Title] <br> $amounts</h1>
<p>URL:$link </p> 

<p><i class='fa fa-copy' id='copy-link'></i> copy link<br> <br><i class='fa fa-share' id='share-btn'></i> Share link</p>

<input type='text' style='display: none;'  id='myInput' value='$link'>

<input type='text' style='display: none;' value='$results[Title]' id='Title'>

<form id='FormData'>
<input type='hidden' name='key' value='$results[Hash_link]'>

<lable><b>Title</b></label><br>
<input type='text' name='title' placeholder='E.g Donation,rent,Fess,Rent...' value='$results[Title]'>
<br>

<lable><b>Amount(₦)</b></label><br>
<input type='number' name='amount'  value='$amount'>
<br>


<lable><b>Message</b></label><br>
<textarea cols='10' rows='10' name='message'>$results[Link_message]</textarea>
<br>
<p><input type='checkbox' name='status' $check> $status</p>
<p class='procceed-btn'>Save changes</p>
<br><br>
</div>
";


//$_SESSION["edit_link_data"] = $data;


}else{


    //NO PAYMENT LINK FOUND

    die("<p style='color:red;text-align: center;'>Link has been broken or is not valid</p>");
}



}else{

header("Location: dashboard-home");
exit;


}



}else{

    header("Location: dashbaord-home");
    exit;
}


?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet"href="Src/Css/edit-link.css">
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


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>
<title>Edit Payment Link</title>

      </head>
      <body>


<?php echo $data; ?>


<?php require_once "Transaction-pin-box.php"; 

echo "</form>";
?>

<?php require_once "Loader-refresh.php";

require_once "Network.php";
require_once "Non-script.php"; ?>

<script src="Src/Js/edit-link.js"></script>

</body>
</html>