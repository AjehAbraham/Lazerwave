<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

     // header('HTTP/1.0 403 Forbiddden',TRUE,403);
     // die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}
?>

        <div class="Transaction-pin-overlay">
            <div class="Transaction-pin-container">

                <label><b>Transaciton pin <i class="fa fa-lock"></i></b></label>
                <br>
                <br>
                <input type="text"  name="Transaction-pin" autocomplete="off" inputmode="numeric"
                 placeholder="your pin..." style="-webkit-text-security:disc;" maxlength="4">
                <br>
                <b class="status-message"></b>
                <p class="Transaction_error_message" style="text-align: center;color: red;"></p>
                <input type="submit" value="Complete" onclick="Submit_datas(event)">
            </form>

            <p><i class="fa fa-close" id="ClosetBtn" onclick="CloseTransaction_pin()"></i></p>
            </div>

        </div>


<style>
      .Transaction-pin-overlay{
                background-color: #ccc;
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                display: none;
                z-index: 2;
            }
            .Transaction-pin-container{
                padding: 10px 10px;
                width: 90%;
                text-align: center;
               background-color: white;
               margin: auto;
               width: 90%;
               margin-top: 20%;
               border-radius: 2rem;
            }
            .Transaction-pin-container label{
                color: grey;
            }
            @media screen and (min-width: 600px){
                .Transaction-pin-container{
                    margin-top: 10%;
                    width: 50%;
                }
            }

            .Transaction-pin-container input[type=text]{
                padding: 10px 10px;
                border: 2px solid #ccc;
                outline: 0;
                background-color: #ccc;
                width: 50%;
                margin: auto;
                font-size: 18px;
                border-radius: 2rem;
            }
            .Transaction-pin-container input[type=submit]{
                padding: 10px 10px;
                border: 0;
                outline: 0;
                background-color: rgb(0,0,56);
                width: 50%;
                font-size: 18px;
                border-radius: 2rem;
                margin: auto;
                color:white;
                cursor: pointer;
            }
            @media screen and (min-width: 600px){
                .Transaction-pin-container input[type=text]{
                    width: 15%;
                    font-size: 13px;
                }
                .Transaction-pin-container input[type=submit]{
                    width: 30%;
                }
            }
           
            .status-message{
                text-align: center;
                color: red;
            }
            .Dark-mode   .Transaction-pin-container{
                background-color: #f1f1f1;
            }
            .Dark-mode   .Transaction-pin-overlay{
                background-color: rgb(0,0,20);  
            }
            #ClosetBtn{
                color: red;
                cursor: pointer;
            }
            </style>