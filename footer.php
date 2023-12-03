<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){
  header("Location: Warning");
  exit;

      //header('HTTP/1.0 403 Forbiddden',TRUE,403);
      //die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}
?>






        <div class="footer-container">

            <div class="sub-footer-container">
                <p>Blog</p>
                <p>News</p>
                <p>Cookie policy</p>
                <p>Developer</p>
                <p>About</p>
                <p>License</p>
                <p>Promotion</p>
                <p>Terms and conditions</p>
                <p>Privacy policy</p>
            </div>

            <P>Contact: <a href="tel:09074220984">09074220984</a></P>
            <p>Address: <i>opposite city mart,gwagwalada,Abuja.</i></p>

            <div class="flex">
            <div class="footer-social-container">

           
                <a href="https://wa.me/+2349074220984" target=" bkank"><i class="fa fa-whatsapp"></i></a>

            
                <a href="https://www.twitter.com/AbrahamAjeh" target=" bkank"><i class="fa fa-twitter"></i></a>
                
             
                <a href="mailto:ajehabraham51@yahoo.com" target=" bkank"><i class="fa fa-google"></i></a>
        
</div>
            </div>
        
     <p class="footer-date">©2022 -<?php echo date("Y")  ?> </p>
            <h1><i>All Right Reserve</i></h1>
            
            
        </div>

    <style>
.back-to-top{
    margin-top: 20px;
    margin-bottom: 50px;
    text-align: center;
    color: rgb(0,0,180);
    animation: back-to-top 4s  infinite;
    position: relative;
    font-size: 30px;
}
@keyframes  back-to-top {

0%{transform: translate3d(0px,50px,0px);}
100%{transform: translate3d(0,0,0);}
/*
0%{top: 50px;animation-timing-function: ease-in-out;}
100%{top: 0px; animation-timing-function: ease-in-out;}*/
}
.footer-container{
    margin: 0;
    background-color: rgb(0,52,102);
    color: white;
    padding: 10px 10px;
}
.footer-container p{
    margin: 10px;
    color: white;
    font-weight: bold;
}
.footer-container h1{
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    font-style: italic;
}
.footer-container p a:link{
    color: white;
    text-decoration: none;

}
.footer-container p a:visited{
    color: lightblue;
}
.flex{
    display: flex;
    padding: 7px;
    margin: auto;
    border-radius: 2rem;
    text-align: center;
    letter-spacing: 15px;
}
.footer-social-container {
margin: auto;
display: block;
 font-size:  25px;

}
.footer-social-container a:link{
    text-decoration: none;
    color: white;
}
.footer-social-container a:visited{
    color: white;
}
.footer-date{
  text-align: center;
  font-weight: bold;
}
</style>