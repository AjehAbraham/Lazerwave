
   
function close_container(){

  document.querySelector(".container-container-fluid").style.display ="none";
  }
   function submitForm(){
               
               document.querySelector(".loader-overlay-refresh").style.display ="block";
            
               var form = $("#FormData");
  
    var url = "Process/request-money ";
    
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
   
        document.querySelector(".loader-overlay-refresh").style.display ="none";
  
        var error = document.querySelector(".error_message");
    
    error.innerHTML = data.responseText;
     
  if(data.responseText == "success"){
  
  document.querySelector(".error_message").innerHTML = "";
  document.querySelector(".username_error").innerHTML ="";
  
  document.querySelector("#FormData").reset();
  
  alert("Request sent successfully");
  
  
  }else if(data.responseText == "\r\nsuccess"){
    
    document.querySelector(".username_error").innerHTML ="";
  
  document.querySelector("#FormData").reset();
  
           document.querySelector(".error_message").innerHTML = "";
  
           alert("Request sent successfully");
  
  }
  
  
    }
    });
       
           }
    
   function  fecthData(){
               
               document.querySelector(".error_message").innerHTML ="please wait...";
            
               var form = $("#FormData");
  
    var url = "Process/Info/request-info";
    
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
   
        var error = document.querySelector(".error_message");
    
    error.innerHTML = data.responseText;
    
    }
    });
       
           }
     function Verify_username()  {
               
               document.querySelector(".username_error").innerHTML ="please wait...";
            
               var form = $("#FormData");
  
    var url = "Process/Info/fetch-username-acct";
    
    $.ajax ({
      type: "POST",
      url: url,
      data: form.serialize(),
    dataType:'json',
    encode: true,
    success: function(data){
        //form has beeen submitted//
    
        console.log();
    
        
        var error = document.querySelector(".username_error");
    
    error.innerHTML = data.responseText;
    
      },
      error: function(data){
   
        var error = document.querySelector(".username_error");
    
    error.innerHTML = data.responseText;
    
    }
    });
       
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