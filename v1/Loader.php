<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

     // header('HTTP/1.0 403 Forbiddden',TRUE,403);
     // die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}
?>


<div class="loader-overlay">
    <div class="loader-container">
        <p><i class="fa fa-spinner" id="Loader-spinner"></i></p>
        <br>
        <p class="Loader-loader">please wait <!--i class="fa fa-circle" id="loader-element"></i> <i class="fa fa-circle" id="loader-element">

        </i> <i class="fa fa-circle" id="loader-element"></i--></p>
    </div>
</div>

<style>
     .loader-overlay{
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
              /*  overflow-y: scroll;*/
                background-color: rgba(255,255,255,0.4);
display: none;
z-index: 4;
            }
            .loader-container{
position: absolute;
margin:  -50px 0 0 -50px;
left: 50%;
top: 50%;
      text-align: center;
                
            }
            .Loader-loader{
                color: black;
                font-weight: bold;
                text-align: center;
                margin: auto;
            width: 100%;
            display: block;
            }
            .Loader-loader i{
                color: black;
                margin: auto;
                display: block;
            }
            #Loader-spinner{
                animation: Loader 0.7s  linear infinite;
                font-size: 40px;
                color: black;
                
            }
            @keyframes Loader {
                0%{
                    transform: rotate(0deg);
                }
                100%{
                    transform: rotate(360deg);
                }
            }
            #loader-element:nth-child(1){

                -webkit-animation:  pre-loader 2s ease-in-out alternate infinite;
                animation: pre-loader 0.6s ease-in-out alternate infinite;
          font-size: 5px;
              }
              
              #loader-element:nth-child(2){
                
                -webkit-animation:  pre-loader 2s ease-in-out alternate infinite;
                animation: pre-loader 0.6s ease-in-out alternate  0.2s infinite;
                font-size: 5px;
              }
              
              #loader-element:nth-child(3){
                
                -webkit-animation:  pre-loader 2s ease-in-out alternate infinite;
                animation: pre-loader 0.6s ease-in-out alternate  0.4s infinite;
                font-size: 5px;
                color: rgba(0,0,56);
              }

@keyframes pre-loader {
    100%{transform: scale(2);}
}
.Dark-mode .loader-overlay{
    background-color: rgba(0,0,56);
    color: white;
}
.Dark-mode   .Loader-loader{
    
    color: white;
}
.Dark-mode #Loader-spinner{
    color: white;
}
</style>

      