
document.querySelector(".open_btn").addEventListener("click",Open_transac);
function Open_transac(){

  document.querySelector(".Transaction-pin-overlay").style.display = "block";
}


document.querySelector("#ClosetBtn").addEventListener("click",Close_transac);
function Close_transac(){

  document.querySelector(".Transaction-pin-overlay").style.display = "none";
}



$(document).ready(function (e) {
    
    $("#FormData").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-overlay-refresh").style.display= "block";
    
       $.ajax({
     
        url: ' Process/block-account',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
      document.querySelector(".loader-overlay-refresh").style.display= "none";
    
         document.querySelector(".status-message").innerHTML = Data;


         
        },
        error:function(Data){
         document.querySelector(".loader-overlay-refresh").style.display= "none";
    
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
