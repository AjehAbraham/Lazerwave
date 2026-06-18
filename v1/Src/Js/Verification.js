
$(document).ready(function (e) {
      
    $("#FormData").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Process/Kyc2-process',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
      document.querySelector(".loader-overlay").style.display= "none";
    
         document.querySelector(".error_message").innerHTML = Data;
    
if(Data == "success"){

document.querySelector(".error_message").innerHTML = "";

document.querySelector("#FormData").reset();

window.location.href = "Myprofile";


}else if(Data == "\r\nsuccess"){

document.querySelector("#FormData").reset();

         document.querySelector(".error_message").innerHTML = "";

window.location.href = "Myprofile";


}



         
        },
        error:function(Data){
         document.querySelector(".loader-overlay").style.display= "none";
    
          document.querySelector(".error_message").innerHTML = Data;
    
        }
      
       });
    
    
    
    }));
    
    
      });

      //COMPELETE TRASACTION FORM//
   

      $(document).ready(function (e) {
        
        $(".FormData").on('submit', (function(e){
        
          e.preventDefault();
          
        document.querySelector(".loader-overlay").style.display= "block";
        
           $.ajax({
         
            url: 'Process/Auth-security/verify-email-otp',
        type : 'POST',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
            success:function(Data){
        
          document.querySelector(".loader-overlay").style.display= "none";
        
             document.querySelector(".error_message").innerHTML = Data;
        
    if(Data == "success" || Data =="\r\nsuccess"){
    
    alert("Email verification successful");
    window.location.href = "Myprofile";
    
    }
    
             
            },
            error:function(Data){
             document.querySelector(".loader-overlay").style.display= "none";
        
             alert("An error occured,please try again or reload page");
        
            }
          
           });
        
        
        
        }));
        
        
          });

   
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