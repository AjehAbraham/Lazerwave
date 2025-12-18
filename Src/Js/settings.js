//OPEN SECURITY CONTAINER

document.querySelector(".open-security").addEventListener("click",openSecurity);

function openSecurity(){
    document.querySelector(".security-container").style.width = "100%";
    document.querySelector(".report-scam-container").style.width = "0%";
}



document.querySelector("#close-security-btn").addEventListener("click",closeSecurity);

function closeSecurity(){

    document.querySelector(".security-container").style.width = "0%";
}


// END OF SECURITY CONTAINER



//



//OPEN TRANSACTION PIN //


document.querySelector(".open-transaction-pin").addEventListener("click",openTransactionPin);

function openTransactionPin(){
    document.querySelector(".transaction-pin-container").style.width = "100%";
    document.querySelector(".report-scam-container").style.width = "0%";
}


//CLOSE TRANSACTION PIN//


document.querySelector("#close_transaction_container_rr").addEventListener("click",close_transaction_pin_container);

function close_transaction_pin_container(){

    document.querySelector(".transaction-pin-container").style.width = "0%";

}





//OPEN AND CLOSE CHNAGE PASSWORD//


document.querySelector(".open-change-password").addEventListener("click",openChangePaswword);

function openChangePaswword(){
    document.querySelector(".change-password-container").style.width = "100%";
    document.querySelector(".report-scam-container").style.width = "0%";
}


document.querySelector("#close-change-password-btn").addEventListener("click",closeChangePassword);

function closeChangePassword(){

    document.querySelector(".change-password-container").style.width = "0%";
}

//


// OPEN REPORT ACCOUNT//

document.querySelector(".open-report-container").addEventListener("click",openReport);

function openReport(){
    document.querySelector(".report-scam-container").style.width = "100%";

    document.querySelector(".change-password-container").style.width = "0%";

    document.querySelector(".transaction-pin-container").style.width = "0%";
}


//CLOSE REPORT ACCOUNT
document.querySelector("#close-report-container-btn").addEventListener("click",closeReport);

function closeReport(){

    document.querySelector(".report-scam-container").style.width = "0%";
}


if(window.history.replaceState){

        window.history.replaceState(null,null,window.location.href);

    }



    //COPY PAYMENT LINK///



    document.querySelector(".copy-payment-link").addEventListener("click",copy_Payment_link);

    function copy_Payment_link(){
        var payment_link = document.getElementById("payment-link");
    
      payment_link.select();
        navigator.clipboard.writeText(payment_link.value);
    
        alert("Payment link copied to clipboard");

        document.querySelector(".copy-payment-link").innerHTML = "Link Copied";
    
      /* document.querySelector(".copy-account-no").innerHTML ="Copied";*/
        
    }

   
///OPEN AND CLOSE PAYMENT LINK CONTAINER

document.querySelector(".Open_payment_btn").addEventListener("click",openPayment_link);

function openPayment_link(){
    var link_contauner = document.querySelector(".Payment-link-container"). style.width = "100%";

    document.querySelector(".payment-link-overlay"). style.width = "100%";
   
  }


  document.querySelector("#close_payment_btn").addEventListener("click",closePayment_link);


  function closePayment_link(){
     var link_contauner = document.querySelector(".Payment-link-container"). style.width = "0%";
     document.querySelector(".payment-link-overlay"). style.width = "0%";
  }



    //SHARE PAGE //


    document.querySelector(".share").addEventListener("click",sharePage);

    function sharePage(){

        if (navigator.share){
            navigator.share({
                title:'Join me and earn millions using Lazerwave',
                url:'create-account',
            })
        }else{
            alert("opps your device does not support share");
        }
    }
    
    
    //END OF VERIFY OTP BTN
    

    

    //OPEN AND CLOSE ACCOUNT LIMIT//

    document.querySelector(".Open_acct_limit_btn").addEventListener("click",Open_account_limit_pop_up);

    function Open_account_limit_pop_up(){

      document.querySelector(".account-limit-overlay-container").style.width ="100%";
      
    }

    document.querySelector("#close-account-limit-btn").addEventListener("click",Close_account_limit_pop_up);

    function Close_account_limit_pop_up(){


document.querySelector(".account-limit-overlay-container").style.width="0%";


      
    }



    function Darkmode(){

      var darkmode = document.body;
      
      
      darkmode.classList.toggle("Dark-mode"  || "Light-mode");
      
      var Theme = localStorage.getItem("Theme");
      
      
      if(Theme  == "Dark-mode"){
      
      
      localStorage.setItem("Theme","Light-mode");
      
      var body = document.body;
      
      body.classList.add("Light-mode");
      
      document.querySelector("#theme").checked=false;
      
      }else{
      
      
      localStorage.setItem("Theme","Dark-mode");
      
      var body = document.body;
      
      
      
      body.classList.add("Dark-mode");
      
      document.querySelector("#theme").checked=true;
      
      
      }
      
      }
      
      function Checkmode(){
      
      var current_mode = localStorage.getItem("Theme");
      
      if(current_mode == "Dark-mode"){
      
      
      var dark = document.body;
      
      dark.classList.add("Dark-mode");
      
      
      document.querySelector("#theme").checked= true;
      
      
      }else{
      
      var dark = document.body;
      
      dark.classList.add("Light-mode");
      
      document.querySelector("#theme").checked= false;
      
      }
      
      
      }
      
      var mode = Checkmode();  
    

  
    
$(document).ready(function (e) {
      
    $("#FormData").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Process/Auth-security/change password',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
      document.querySelector(".loader-overlay").style.display= "none";
    
         document.querySelector(".error_message_change_password").innerHTML = Data;
    
if(Data == "success"){

document.querySelector("#FormData").reset();

document.querySelector(".error_message_change_password").innerHTML = "";

alert("Password updated successfully");

}else if(Data == "\r\nsuccess"){

document.querySelector("#FormData").reset();

document.querySelector(".error_message_change_password").innerHTML = "";

alert("Password updated successfully");

}



         
        },
        error:function(Data){
         document.querySelector(".loader-overlay").style.display= "none";
    
          document.querySelector(".error_message_change_password").innerHTML = Data;
    
        }
      
       });
    
    
    
    }));
    
    
      });


  
      $(document).ready(function (e) {
    
    $("#Pin_FormData").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Process/Auth-security/update-transaction_pin',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
      document.querySelector(".loader-overlay").style.display= "none";
    
         document.querySelector(".error_message_update_pin").innerHTML = Data;
    
if(Data == "success"){

document.querySelector("#Pin_FormData").reset();

document.querySelector(".error_message_update_pin").innerHTML = "";

alert("Transaction Pin updated successfully");

}else if(Data == "\r\nsuccess"){

document.querySelector("#Pin_FormData").reset();

document.querySelector(".error_message_update_pin").innerHTML = "";

alert("Transaction Pin updated successfully");

}



         
        },
        error:function(Data){
         document.querySelector(".loader-overlay").style.display= "none";
    
          document.querySelector(".error_message_update_pin").innerHTML = Data;
    
        }
      
       });
    
    
    
    }));
    
    
      });


      
  
$(document).ready(function (e) {
    
    $("#Pin_FormId").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Process/Auth-security/Create-transaction_pin',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
      document.querySelector(".loader-overlay").style.display= "none";
    
         document.querySelector(".error_message").innerHTML = Data;
    
if(Data == "success"){

document.querySelector("#Pin_FormId").reset();

document.querySelector(".error_message").innerHTML = "";

window.location.reload();

alert("Pin Created successfully");

}else if(Data == "\r\nsuccess"){

document.querySelector("#Pin_FormId").reset();

document.querySelector(".error_message").innerHTML = "";

window.location.reload();

alert("Pin Created successfully");

}



         
        },
        error:function(Data){
         document.querySelector(".loader-overlay").style.display= "none";
    
          document.querySelector(".error_message").innerHTML = Data;
    
        }
      
       });
    
    
    
    }));
    
    
      });


      function Two_factor(){

        //event.preventDefault();
        
        document.querySelector(".loader-overlay").style.display ="block";
        
        var form = $("#Two_factor_Form");
        var url = "Process/Auth-security/Two-factor";
        
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
        document.querySelector(".loader-overlay").style.display ="none";
        
        if(data.responseText == "\r\nON"){
        
        
          document.querySelector(".two_factor_error_message").innerHTML = "";
        
        alert("Two Factor ON successfuly");
        
        document.querySelector("#two-factor_btn").checked = true;
        
        }else if(data.responseText == "ON"){
        
            document.querySelector("#two-factor_btn").checked = true;
            
          document.querySelector(".two_factor_error_message").innerHTML = "";
        
        }else{
        
        
            
        if(data.responseText == "\r\nOFF"){
          
          document.querySelector(".two_factor_error_message").innerHTML= "";
        
        alert("Two Factor OFF Successful");
        
        document.querySelector("#two-factor_btn").checked = false;
        
        }else if(data.responseText == "OFF"){
          
          document.querySelector(".two_factor_error_message").innerHTML = "";
        
            document.querySelector("#two-factor_btn").checked = false;
        
        }
        
        
        
        }
        
        
        document.querySelector(".two_factor_error_message").innerHTML  = data.responseText;    
        
        }
        });
        
        }
        
       
$(document).ready(function (e) {
    
  $("#blockForm").on('submit', (function(e){
  
  
    e.preventDefault();
    
  document.querySelector(".loader-overlay-refresh").style.display= "block";
  
     $.ajax({
   
      url: ' Process/block-account',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
  
    document.querySelector(".loader-overlay-refresh").style.display= "none";
  
       document.querySelector(".status-message").innerHTML = Data;


       document.querySelector("#blockForm").reset();

       if(Data == "\r\ndisabled"){

        document.querySelector(".status-message").innerHTML = "";

        document.querySelector("#blockBox").checked=true;

        document.querySelector(".Transaction-pin-overlay").style.display = "none";

        alert("Your account has been suspended temporarily");

       }else if(Data == "\r\nBlock"){

        document.querySelector(".status-message").innerHTML = "";

document.querySelector(".Transaction-pin-overlay").style.display = "none";

        
document.querySelector("#blockBox").checked=true;
        alert("Your account has been Block successfuly");

       }else{


        if(Data == "\r\nUnblock"){


        document.querySelector(".status-message").innerHTML = "";

        document.querySelector("#blockBox").checked=false;

document.querySelector(".Transaction-pin-overlay").style.display = "none";

          alert("Your account has been Un-Block");

        }
       }
       
      },
      error:function(Data){
       document.querySelector(".loader-overlay-refresh").style.display= "none";
  
        document.querySelector(".status-message").innerHTML = Data;
  
      }
    
     });
  
  
  
  }));
  
  
    }); 
document.querySelector(".OpenPin_btn").addEventListener("click",Open_transac);
function Open_transac(){

document.querySelector(".Transaction-pin-overlay").style.display = "block";
}


document.querySelector("#ClosetBtn").addEventListener("click",Close_transac);
function Close_transac(){

document.querySelector(".Transaction-pin-overlay").style.display = "none";
}
