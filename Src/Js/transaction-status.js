
document.querySelector(".CloseBtn").addEventListener("click",Close);

function Close(){

  document.querySelector(".form-container-fluid").style.width = "0%";
}
document.querySelector(".complete").addEventListener("click",Goback);
function Goback(){
  window.history.back();

}


document.querySelector(".data-btn").addEventListener("click", SubmitData);
function SubmitData()  {
              
      document.querySelector(".loader-overlay-refresh").style.display= "block"; 
      var form = $("#FormData");

var url = "Process/save-beneficiary";

$.ajax ({
type: "POST",
url: url,
data: form.serialize(),
dataType:'json',
encode: true,
success: function(data){
//form has beeen submitted//

console.log();


var error = document.querySelector(".error_message");

error.innerHTML = data.responseText;

},
error: function(data){

       document.querySelector(".loader-overlay-refresh").style.display= "none";
var error = document.querySelector(".error_message");

error.innerHTML = data.responseText;

if(data.responseText == "\r\nSuccess"){
  
  document.querySelector(".form-container-fluid").style.width = "0%";

  dcoument.querySelector(".error_message").innerHTML= "";

alert("Beneficiary saved successfully");

}else if(data.responseText == "Success"){
  
  dcoument.querySelector(".error_message").innerHTML= "";
  
  document.querySelector(".form-container-fluid").style.width = "0%";

alert("Beneficiary saved successfully");


}else{

  if(data.responseText == "\r\nExit"){

  document.querySelector(".form-container-fluid").style.width = "0%";

    alert("Beneficiary already exit");

  }else if (data.responseText == " \r\nFailed"){

  alert("failed to save Beneficiary");

  }

}

}
});

  }

document.querySelector(".complete").addEventListener("click",Goback);
function Goback(){
  window.history.back();

}
            
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
 
 
 