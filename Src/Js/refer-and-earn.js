
$(document).ready(function (e) {
        
    $("#FormData").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Process/generate-referal-link',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
      document.querySelector(".loader-overlay").style.display= "none";
    
         document.querySelector(".error_message").innerHTML = Data;

         if(Data == "\r\nsuccess"){

            window.location.reload();
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



document.querySelector(".view-referal").addEventListener("click",openHistory);

function openHistory(){

document.querySelector(".referal-history-container").style.width="100%";

}

document.querySelector("#close-history-btn").addEventListener("click",CloseHistory);

function CloseHistory(){
document.querySelector(".referal-history-container").style.width="0%";


}








function CopyLink(){
var link=
document.querySelector("#link");
link.select();
link.setSelectionRange(0,99999);
navigator.clipboard.writeText(
link.value);
alert("Link copied to clipboard");

}
