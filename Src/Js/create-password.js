
$(document).ready(function (e) {
        
    $("#FormData").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-overlay-refresh").style.display= "block";
    
       $.ajax({
     
        url: 'Process/Auth-security/create-password',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
      document.querySelector(".loader-overlay-refresh").style.display= "none";
    
         document.querySelector(".status-message").innerHTML = Data;

if(Data == "success"){
document.querySelector(".status-message").innerHTML = "";

alert("Password updated successfully");

window.location.href="Login";

}else if(Data == "\r\nsuccess"){

document.querySelector(".status-message").innerHTML = "";

alert("Password updated successfully");

window.location.href="Login";

}


         
        },
        error:function(Data){
         document.querySelector(".loader-overlay-refresh").style.display= "none";
    
          document.querySelector(".status-message").innerHTML = Data;
    
        }
      
       });
    
    
    
    }));
    
    
      });

      //COMPELETE TRASACTION FORM//
   

   
function Checkmode(){

var current_mode = localStorage.getItem("Theme");

if(current_mode == "Dark-mode"){


var dark = document.body;

dark.classList.add("Dark-mode");


//document.querySelector("#theme").checked= true;


}else{

var dark = document.body;

dark.classList.add("Light-mode");

// document.querySelector("#theme").checked= false;




}


}

var mode = Checkmode();


