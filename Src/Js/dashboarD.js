
document.getElementById("open-btn").addEventListener("click",openSidebar);

function openSidebar(){
    
    document.querySelector(".sidebar-container").style.width = "100%";
}

document.querySelector("#close-btn").addEventListener("click",CloseSidebar);

function CloseSidebar(){

    document.querySelector(".sidebar-container").style.width = "0%";
}

function AutoChecker(){


    Bal = document.querySelector("#UserId").value;
    
    
    var Mode = localStorage.getItem("BalStatus");
    
    
    if(Mode === "Hide"){
    
    
    document.querySelector(".Account-balance-p").innerHTML = 
    "<i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><br>";
    
    
    
    }else{
    
    
    document.querySelector(".Account-balance-p").innerHTML = Bal;
    
    
    
    }
    
    }
    //window.onload = AutoChecker();
    
    window.addEventListener("load",AutoChecker)
    
    
    document.querySelector("#balStatus").addEventListener("click",Bal_status);
    function Bal_status(){
    
    
    Bal = document.querySelector("#UserId").value;
    
    
    var Mode = localStorage.getItem("BalStatus");
    
    
    
    if(Mode == "Hide"){
    
      
      localStorage.removeItem("BalStatus");
    
      localStorage.setItem("BalStatus","Show");
    
    }else{
    
      localStorage.removeItem("BalStatus");
      
      localStorage.setItem("BalStatus","Hide");
    
    
    }
    
    
    
    if(Mode == "Hide"){
    
    
    
      document.querySelector(".Account-balance-p").innerHTML = 
      "<i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><br>";
      
      
    
    }else{
    
    
    
      document.querySelector(".Account-balance-p").innerHTML = Bal;
      
    
    }
    
    
    }
    
    
document.querySelector(".open-notify-btn").addEventListener("click",FetchNotification);
function FetchNotification(){

//event.preventDefault();

document.querySelector(".loader-overlay-refresh").style.display ="block";

var form = $("#DataDoger");
var url = "Notification";

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
if(data.responseText == ""){

  alert("Failed to fetch Notificatiom");
  
}else{
document.querySelector(".notify_error_message").innerHTML  = data.responseText; 
}


}
});

}

document.querySelector("#close-notification-btn").addEventListener("click",closeNotification);

function closeNotification(){

document.querySelector(".Notifications").style.width="0%";

}