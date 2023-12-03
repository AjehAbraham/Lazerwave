<?php

if($_SERVER["REQUEST_METHOD"] == "GET" && realpath(__FILE__) 
== realpath($_SERVER["SCRIPT_NAME"])){



    header("Location: Warning");
    exit;

}else if($_SERVER["REQUEST_METHOD"] == "POST" && realpath(__FILE__) 
== realpath($_SERVER["SCRIPT_NAME"])){



    header("Location: Warning");
    exit;

}
?>


<noscript>
<div class='noscript'>
    <p> <i class="fa fa-warning"></i> Your browser doesn't support JavaScript or javascript appear to have been turn off,please go to your browser setting to turn javascript ON.</p>
    </div>
      <style>
      .noscript{
      background:black;
      color: white;
      position: fixed; 
      top: 0; 
      bottom: 0;
      left: 0;
      right: 0;
      text-align: center;
      font-size: 27px;
      width: 100%;
      height: 100%;
      z-index: 4;
          
          
      }
      noscript i{
        color: red;
      }
      </style>
      
    </noscript>



    <form id="PopForm">
<?php $rand = uniqid(); ?>
        <input type='hidden' value='<?php echo $rand;?>'>
</form>

<script>
            
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
 
 
 
 
       function Fetch_pop_not(){


var form = $("#PopForm");

    $.ajax({
  
     url: 'Pop-notification',
 type : 'POST',
 data: form.serialize(),
 cache: false,
 contentType: false,
 processData: false,
     success:function(Data){
 
 
      document.querySelector(".popUp_status_message").innerHTML = Data;


      document.querySelector(".popUp_status_message").innerHTML = Data;
       if(Data == "\r\nAll"){


        document.querySelector(".popUp_status_message").innerHTML = "";
        
       }else if (Data == "All"){
        
       document.querySelector(".popUp_status_message").innerHTML = "";

       }
 
       
     },
     error:function(Data){
       document.querySelector(".popUp_status_message").innerHTML = Data;
       if(Data == "\r\nAll"){


        document.querySelector(".popUp_status_message").innerHTML = "";
        
       }else if (Data == "All"){
        
       document.querySelector(".popUp_status_message").innerHTML = "";

       }
 
     }
   
    });
 
   }
   var Fetch =setInterval(Fetch_pop_not,20000);

   
document.querySelector("#close_popUp").addEventListener("click",close_popUp);
                function close_popUp(){

document.querySelector(".pop-Notification-overlay").style.display = "none";

                }

            
           </script>

        <p class="popUp_status_message"></p>
