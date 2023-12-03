<?php 
require_once __DIR__.("/sessionPage.php");

  // cehck block history
  require_once "db_connection.php";

  $check_status_record = "SELECT *  FROM Block_account WHERE User_id = '$_SESSION[New_user]'";

 // $result_his = $conn -> query($check_status_record);
 $result_his = mysqli_query($conn,$check_status_record);
  
  if(mysqli_num_rows($result_his) > 0){
  
  $results = mysqli_fetch_assoc($result_his);
  
  if($results["Account_status"] == "Block"){

  $status = "Unblock";


}else{
    
    
    $status ="Block";
    
    
}

}else{



$status ="Block";


}
?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/block-account.css">
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
<title>Block Account</title>


<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->
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


<div class="Top_nav_bar">
          <a href="dashboard-home">  <i class="fa fa-home" 
         ></i>
</a> 
          <span class="material-symbols-outlined" onclick="window.history.back()">arrow_back</span>
       
</div>

        

      
          <div class='block-account-container'>
            <h1><?php echo  $status; ?>  Account</h1>
  
<p class=""></p>

            <p class="open_btn"><?php echo $status; ?></p>

            <form id="FormData">

            <input type="hidden" name="status" value="<?php echo $status; ?>">


<?php require_once "Transaction-pin-box.php";
echo "</form>";

$loadData = "SELECT * FROM Block_account_history WHERE User_id ='$_SESSION[New_user]' ORDER BY id DESC";

$UserData = mysqli_query($conn,$loadData);

if(mysqli_num_rows($UserData) > 0){
  echo "
  <p style='text-align: center;font-weight: bold;'>Block Account History</p>
  <table><th>Date</th><th> Account status </th><th>Ip</th>";

 while( $Data = mysqli_fetch_assoc($UserData)){

  $date = date("D F d Y",strtotime($Data["Date"]));

echo "
<tr><td>$date</td>
<td>$Data[Account_status]</td>
<td>$Data[Ip_addr]</td></tr>
<br>
";


 }

echo "</table>";

}else{

  echo "<p style='text-align: center;'>No History</p>";
}

require_once "Loader-refresh.php";
?>


<?php //include __DIR__.("/logo.php"); 
        
        require_once __DIR__.("/Network.php");
        
require_once "Non-script.php";
                ?>



<script src="Src/Js/block-account.js"></script>

</body>
</html>