
function Open_pin_box(){

  document.querySelector(".Transaction-pin-overlay").style.display = "block";

}
   
function CloseTransaction_pin(){

document.querySelector(".Transaction-pin-overlay").style.display = "none";

}


$(document).ready(function (e) {
      
      $("#V_FormData").on('submit', (function(e){
      
      
        e.preventDefault();
        
      document.querySelector(".loader-overlay").style.display= "block";
      
         $.ajax({
       
          url: 'Process/Payment-Gateway/Card-Gateway/Virtualcard-process',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
          success:function(Data){
      
        document.querySelector(".loader-overlay").style.display= "none";
      
           document.querySelector(".status-message").innerHTML = Data;
      
    if(Data == "\r\nsuccess"){
    
      alert("Card created successfully");
   window.location.href="Transaction-status";
   
    
    }else if(Data == "success"){
    
    alert("Card created successfully");
   window.location.href="Transaction-status";
    
    }
    
    
    
          },
          error:function(Data){
           document.querySelector(".loader-overlay").style.display= "none";
      
            document.querySelector(".status-message").innerHTML = Data;
      
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