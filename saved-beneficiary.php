<?php 
header("Location: sendmoney");
exit;
//require_once __DIR__.("/sessionPage.php");

//CHECK IF USER HAS A SAVED BENEFICIARY ELSE RE-DIRECT USER TO SEND MONEY//


$fetch_data = "SELECT * FROM Beneficiary WHERE User_id='$_SESSION[New_user]'";

$be_result = mysqli_query($conn,$fetch_data);

if(mysqli_num_rows($be_result) > 0){

//USER HAS SAVED BENEFICIARY//
$dataDog = "
<label><b> Select Beneficary or click contiune </b></label><br>
<form method='post' action='sendmoney'>

<div class='custom-select'>
<select name='dataDog'>
<option></option>";

while($saved_result = mysqli_fetch_assoc($be_result)){

$dataDogs ="

<option value='$saved_result[Acct_no]'>$saved_result[Full_name]<br> ($saved_result[Acct_no])</option>
";

}

$dataDog2 = "</select></div>
<br>

<input type='submit' value='continue'>
</form>";

}else{

//USER DOES NOT HAVE ANY BENEFICIARY //
$dataDog = "";
$dataDog2 = "";
$dataDogs = "";

header("Location: sendmoney");
exit;

}



?>






<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/">
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
<title>Saved beneficiary</title>
      </head>
      <body>
<script>
  
  if(window.history.replaceState){
       
       window.history.replaceState(null,null,window.location.href);
       
       }
       </script>
      
              <div class="Top-nav">
                <span class="material-symbols-outlined" onclick="window.history.back()">arrow_back</span>
                 
                <a href="index.php"><i class="fa fa-home"
               ></i>
                 </a> 

</div>

<div class='save-beneficairy-container'>

<h1>Saved Beneficiary</h1>
<?php echo $dataDog . $dataDogs . $dataDog2;
?>

</div>


<?php //include __DIR__.("/logo.php"); 
        
        require_once __DIR__.("/Network.php");

        require_once "Non-script.php";
        
                ?>
<style>
  
body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        font-size: 13px;  
        }
        .Top-nav i{
            float:right;
            font-size:13px;
            margin-top:1px;
            cursor: pointer;
            color: #666;
        }
        .Top-nav span{
            font-size:11px;
            /*margin-top:1px;*/
            cursor: pointer;
            color: #666;
        }
        .save-beneficairy-container{
           /* overflow-y: scroll;*/
        }
    
        .save-beneficairy-container h1{
    text-align: center;
    font-size: 15px;
    color: rgb(0,0,56);
    padding: 5px 5px;
    
        }
        .save-beneficairy-container label{

          margin: auto;
    display: block;
  text-align: center;
        }
    
    .save-beneficairy-container  input[type=submit]{
    margin-top: 12px;
    background-color: rgb(0,0,56);
    color: white;
    margin: auto;
    display: block;
  
    width: 70%;
    border: none;
    padding: 8px 8px;
    font-size: 20px;
    border-radius: 2rem;
    cursor: pointer;
    }
    @media screen and (min-width: 600px){
        .save-beneficairy-container  input[type=submit]{
            width: 30%
        }
    }
    .Dark-mode {
        background-color: rgb(0,0,20);
        color: white;
    }
    .Dark-mode i,span{
        color: white;
    }
    .Dark-mode a:link{
        color: white;
    }
    .Dark-mode a:visited{
        color: white;
    }
    .Dark-mode h1{
        color: white;
    }
  
 /* The container must be positioned relative: */
.custom-select {
position: relative;
font-family: Arial;

margin: auto;
width: 80%;
}

.custom-select select {
display: none; /*hide original SELECT element: */

}

.select-selected {
background-color: mediumseagreen;
border-radius: 2rem;

}

/* Style the arrow inside the select element: */
.select-selected:after {
position: absolute;
content: "";
top: 14px;
right: 10px;
width: 0;
height: 0;
border: 6px solid transparent;
border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
border-color: transparent transparent #fff transparent;
top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
color: #ffffff;
padding: 8px 16px;
border: 1px solid transparent;
border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
cursor: pointer;
}

/* Style items (options): */
.select-items {
position: absolute;
background-color: skyblue;
top: 100%;
left: 0;
right: 0;
z-index: 99;
border-radius: 2rem;
}

/* Hide the items when the select box is closed: */
.select-hide {
display: none;
}

.select-items div:hover, .same-as-selected {
background-color: rgba(0, 0, 0, 0.1);
}
  @media screen and (min-width: 600px){
    .custom-select{
      width: 60%;
    }
  }
  </style>
                <script>
                  var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);
</script>
<script src="Src/Js/Saved-beneficary.js"></script>

</body>
</html>