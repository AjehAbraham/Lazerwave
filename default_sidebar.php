<?php

if($_SERVER["REQUEST_METHOD"] == "GET" && realpath(__FILE__) 
== realpath($_SERVER["SCRIPT_NAME"])){

    exit;

}else if($_SERVER["REQUEST_METHOD"] == "POST" && realpath(__FILE__) 
== realpath($_SERVER["SCRIPT_NAME"])){

    exit;

}
$pageName = $_SERVER["SCRIPT_NAME"];
$pageName = basename($pageName,".php");
?>

        <div class="default_sub_sidebar_container_overlay">
            <div class="default_subsidebar_container">
                <h3><i class="fa fa-close" id="close_selectorbtn"></i></h3>
                <p><a href="index"><i class="fa fa-home"></i> Home</a></p>
                <?php if($pageName == "sendmoney" or $pageName == "Transfer"):?>
                <p style="cursor: pointer;" onclick="openBene()"><i class="fa fa-users" style="margin-left: 22px;"></i> Beneficiary</p><?php else:?>
                <p><a href="sendmoney"><i class="fa fa-send"></i> Transfer</a></p><?php endif;?>
                <?php if(isset($_SESSION["reg_auth"]) or isset($_SESSION["New_user"])):?> <?php else:?>
                <?php if($pageName == "Login"):?> <?php else:?>
                <?php if(!isset($_SESSION["reg_auth"]) or !isset($_SESSION["New_user"])):?>
                <p><a href="Login"><i class="fa fa-sign-in"></i> Sign-in</a></p><?php endif;?><?php endif;?><?php endif;?>
                <?php if(isset($_SESSION["reg_auth"]) or isset($_SESSION["New_user"])):?>
                <?php if($pageName == "Myprofile"):?><?php else:?>
                <p><a href="Myprofile"><i class="fa fa-user-plus"></i><b>Profile</b></a></p><?php endif;?>
                <?php if($pageName == "create-payment-link"):?>
                <?php if($pageName == "payment-link-history" or $pageName == "edit-link"):?><?php else:?>
                <p><a href="payment-link-history"><i class="fa fa-eye"></i><b>View Link</b></a></p><?php endif;?>
                <?php endif; ?>
                <?php if($pageName == "payment-link-history" or $pageName == "edit-link"):?>
                <p><a href="create-payment-link"><i class="fa fa-link"style="margin-left: 17px;"></i><b>Create Link</b></a></p><?php endif;?>
                <?php if($pageName == "setting"):?><?php else:?>      
                <p><a href="setting"><i class="fa fa-cogs"></i><b>Settings</b></a></p><?php endif;?>
                <p><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></p>
                <?php endif; ?>
                <?php if(isset($_SESSION["reg_auth"]) or isset($_SESSION["New_user"])):?> <?php else:?>
                <?php if($pageName == "create-account"):?> <?php else:?>
                <?php if(!isset($_SESSION["reg_auth"]) or !isset($_SESSION["New_user"])):?>
                <p><a href="create-account"><i class="fa fa-user-plus"></i> Register</a></p><?php endif;?><?php endif;?><?php endif;?>
                <p id="get"><a href=""><i class="fa fa-exclamation-circle"></i> Get help</a></p>
                
            </div>
        </div>
        <div class="subsidebar_selector">
            <p><i class="fa fa-bars" id="selectorbtn"></i></p>
        </div>
<br>
        <script>
            document.querySelector("#selectorbtn").addEventListener("click",open_default_sidebar);
            function open_default_sidebar(){
                document.querySelector(".default_sub_sidebar_container_overlay").style.width = "50%";
            }
            document.querySelector("#close_selectorbtn").addEventListener("click",close_default_sidebar);
            function close_default_sidebar(){
                document.querySelector(".default_sub_sidebar_container_overlay").style.width = "0%";
            }
        </script>
        <style>
.default_sub_sidebar_container_overlay{
top: 0;
left: 0;
right: 0;
bottom: 0;
width: 0%;
color: white;
position: fixed;
overflow-y: scroll;
transition: 0.2s;
background-color: rgb(0,0,56);
z-index: 4;
}
.default_subsidebar_container{
  font-size: 20px;
    margin-top: 50px;
}
.default_subsidebar_container p{
    text-align: center;
     color: white;
     padding: 5px 5px;
    border:  4px solid rgb(0,0,20);
    border-radius: 2rem;
     font-size: 13px;
     margin-left: auto;
     margin-right: auto;
     width: 90%; 
     font-weight: bold;  
     color: white;
}
.default_subsidebar_container p i{
    margin-right: 10px;
    font-size: 18px;
    color: white;
}
.default_subsidebar_container p a:link,.default_subsidebar_container p a:visited{   
     color: white;
     text-decoration: none;
 }
 .default_subsidebar_container p:hover{
     background-color: rgb(0,0,20);
 }
 .default_subsidebar_container p:nth-child(3) i{
    margin-right: 12px;
 }
 
 .default_subsidebar_container p:nth-child(4) i{
    margin-right: 12px;
 }
 .default_subsidebar_container #get{
    /*margin-right: 21px;*/
 }
 .default_subsidebar_container h3{
    text-align: center;
 }
 .default_subsidebar_container h3 i{
    cursor: pointer;
    color: white;
 }
.subsidebar_selector p i{
margin-left: 10px;
cursor: pointer;
font-size: 24px;
color: rgb(0,0,56);
}
        </style>