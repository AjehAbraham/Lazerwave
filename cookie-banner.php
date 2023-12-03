<?php
if($_SERVER["REQUEST_METHOD"] == "GET" && realpath(__FILE__) == $_SERVER['SCRIPT_NAME']){

    header("Location: Warning");
    exit;
    
}else if($_SERVER["REQUEST_METHOD"] == "POST" && realpath(__FILE__) == $_SERVER["SCRIPT_NAME"]){

    header("Location: Warning");
    exit;


}
//var_dump($_COOKIE);
?>
<style>
.cookie-container-overlay{
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background-color: rgba(255,255,255,0.4);
width:  0%;
z-index: 6;
transition: 0.3s;
}
.cookie-box-container{
  top: 60%;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgb(0,0,56);
  color: white;
  overflow: hidden;
  position: absolute;
}
.cookie-box-container p a:link,a:visited{
  color: red;
}
.cookie-box-container .accept-btn{
  padding: 7px 7px;
  background-color: mediumseagreen;
  color:white;
  border-radius: 2rem;
  text-align: center;
  margin: auto;
  display: block;
  width: 66%;
  cursor: pointer;
}
@media screen and (min-width: 600px){
  .cookie-box-container .accept-btn{
    width: 40%;
  }
}

</style>

<div class="cookie-container-overlay">
  <div class="cookie-box-container"><br>
  
  <p class="cookie_error_message"></p>
    <p>This webiste uses cookie to analyze traffic and improve your user  experince.<br><a href="#">cookie policy</a></p>
<p><a href="" target="_blank">What is cookie?</a></p>
<form id="DataDogs"><input type="hidden" value="Accept" name="cookie"></form>
    <p class="accept-btn">I  Agree</p><br>
  </div>
 </div>


<script>
function cookieConsent(){
document.querySelector(".cookie-container-overlay").style.width= "100%";

}
const teasers = setTimeout(cookieConsent,2000);

document.querySelector(".accept-btn").addEventListener("click",SubmitDataDog);
function SubmitDataDog(){

//event.preventDefault();

document.querySelector(".loader-overlay-refresh").style.display ="block";

var form = $("#DataDogs");
var url = "Process/cookie-banner";

$.ajax ({
type: "POST",
url: url,
data: form.serialize(),
dataType:'json',
encode: true,
success: function(data){
//form has beeen submitted//

},
error: function(data){
document.querySelector(".loader-overlay-refresh").style.display ="none";



document.querySelector(".cookie_error_message").innerHTML  = data.responseText;   

if(data.responseText == "\r\nsuccess"){

    document.querySelector(".cookie-container-overlay").style.width= "0%";

    document.querySelector(".cookie_error_message").innerHTML  = "";

}else if(data.responseText == "success"){


    document.querySelector(".cookie_error_message").innerHTML  = "";
    document.querySelector(".cookie-container-overlay").style.width= "0%";

}

}
});

}

</script>
