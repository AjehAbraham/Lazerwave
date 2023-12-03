
    
  $(document).ready(function (e) {
        
    $("#FormData").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Process/Info/Accountstatistic process',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
      document.querySelector(".loader-overlay").style.display= "none";
    
         document.querySelector(".status-message").innerHTML = Data;
    
if(Data == "success"){

document.querySelector("#FormData").reset();
document.querySelector(".status-message").innerHTML = "";

alert("Statement generated successfully");

}else if(Data == "\r\nsuccess"){

document.querySelector("#FormData").reset();
document.querySelector(".status-message").innerHTML = "";

alert("Statement generated successfully");

}



         
        },
        error:function(Data){
         document.querySelector(".loader-overlay").style.display= "none";
    
          document.querySelector(".status-message").innerHTML = Data;
    
        }
      
       });
    
    
    
    }));
    
    
      });

      //COMPELETE TRASACTION FORM//
   

document.querySelector(".openBtn").addEventListener("click",Open_pin_box);


function Open_pin_box(){

document.querySelector(".Transaction-pin-overlay").style.display = "block";

}

function CloseTransaction_pin(){


document.querySelector(".Transaction-pin-overlay").style.display = "none";


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