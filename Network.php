<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

      //header('HTTP/1.0 403 Forbiddden',TRUE,403);
      //die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}
?>

<div class="Network-container-overlay">
        <div class="Network-container">
            <h1> Opps! &#128549; no Internet  connection <i class="fa fa-wifi"></i></h1>
        </div>
</div>
        <style>
          
         .Network-container-overlay{
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            
             background-color: rgba(0,0,0,0.2);
              display: none;
              z-index: 6;
              
         }
          .Network-container h1{
              background-color: rgb(0,0,52);
              padding: 10px 10px;
              width: 70%;
              margin: auto;
        
              display: block;
              color: white;
              text-align: center;
              top: 60%;
              font-size: 18px;
              margin-top: 100px;
             
          }
          @keyframes load-network {
              0%{transform: translate3d(0,-100px,0);}
              100%{transform: translate3d(0,0,0);}
          }
          </style>


        <script>
            
            window.addEventListener('offline', (e) => {console.log('offline');
            document.querySelector(".Network-container-overlay").style.display = "block";
            
            });
            
            window.addEventListener('online',(e) => {
                console.log('online');
                document.querySelector(".Network-container-overlay").style.display = "none";
            
            
            })
        </script> 
       