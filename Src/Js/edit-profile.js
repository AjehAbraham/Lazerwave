
$(document).ready(function (e) {
      
  $("#FormData").on('submit', (function(e){
  
  
    e.preventDefault();
    
  document.querySelector(".loader-overlay").style.display= "block";
  
     $.ajax({
   
      url: 'Process/Editprofile process',
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
alert("updated successfully");

}else if(Data == "\r\nsuccess"){

document.querySelector(".error_message").innerHTML = "";
alert("Updated");


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

