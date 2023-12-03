
function Open_pin_box(){
    
    document.querySelector(".Transaction-pin-overlay").style.display = "block";
  
  }
  
  function CloseTransaction_pin(){
  
  
    document.querySelector(".Transaction-pin-overlay").style.display = "none";
  
  
  }
  
  
    if(window.history.replaceState){
       
       window.history.replaceState(null,null,window.location.href);
       
       }
   
   
   
  
  $(document).ready(function (e) {
        
        $("#FormData").on('submit', (function(e){
        
        
          e.preventDefault();
          
        document.querySelector(".loader-overlay").style.display= "block";
        
           $.ajax({
         
            url: 'Process/Payment-Gateway/Data-process',
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
    document.querySelector(".status-message").innerHTML="";
  
    window.location.href = "Transaction-status";
  
  
  }else if(Data === "\r\nsuccess"){
  
    
    document.querySelector("#FormData").reset();
    document.querySelector(".status-message").innerHTML="";
  
    window.location.href = "Transaction-status";
  
  
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
       
  
          function Fetch_data(){
  
  //event.preventDefault();
  
  document.querySelector(".loader-overlay-refresh").style.display ="block";
  
  var form = $("#FormData");
  var url = "Process/Info/Fetch_data_plan";
  
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
  
  
  
  document.querySelector(".error_message").innerHTML  = data.responseText;    
  
  }
  });
  
  }
  
  
  
   
function close_container(){

document.querySelector(".container-container-fluid").style.display ="none";
}

function SubmitData(){

//event.preventDefault();

document.querySelector(".loader-overlay-refresh").style.display ="block";

var form = $("#FormData");
var url = "Process/Info/verify-data";

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



document.querySelector(".error_message_data").innerHTML  = data.responseText;    

}
});

}


