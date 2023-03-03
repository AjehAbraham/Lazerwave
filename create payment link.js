
$(() => {

    $("#submitButton").click(function(ev){
    //STOP PAGE FROM REFRESIN//
    
    (ev).preventDefault();
    
    
    //show laoder pending whne form submit//
    
    
      document.querySelector(".loader-overlay").style.display = "block";
     
    
      ////
    
      var form = $("#formId");
      var url = "createPayment link process.php";
    
      $.ajax ({
    
        type: "POST",
        url: url,
        data: form.serialize(),
        dataType:"json",
        encode: true,
        success: function(data){
          //  alert("success");
    
            console.log();
       
          //form has beeen submitted//
    
          document.querySelector(".loader-overlay").style.display = "none";
    
    
          document.querySelector(".form-status-message-overlay").style.display ="block";
    
    //check if it is successull or it failed//
    
    var res = document.querySelector(".error_message");
    
    res.innerHTML=data.responseText;
    
    
        },
        error: function(data){
    
            document.querySelector(".loader-overlay").style.display = "none";
    
    
            document.querySelector(".error_message").innerHTML = data.responseText;
    
    
    
        }
      });
    });
    
    });
    
    
    
        
          
    function close_otp_message(){
        
        document.querySelector(".form-status-message-overlay").style.display = "none";
        
        
        
        }
        
    
        var payment_link = document.querySelector("#payment_link").value;
    
    
    function shareLink(){
        if(navigator.share){
            
            navigator.share({
                Title:'Payment Gateway',
                url:document.querySelector("#payment_link").value,
            })
        }
    }
    
    
    function copyPayment_link(){
        var account_number = document.getElementById("payment_link");
    
       account_number.select();
        navigator.clipboard.writeText(account_number.value);
    
        alert("Payment link copied to clipboard");
    
       document.querySelector(".copy_link_url").innerHTML ="<i class='fa fa-copy'></i>  Link copied";
        
    }
            




/*
var payment_link = document.querySelector("#payment_link").value;


    function shareLink(){
        if(navigator.share){
            
            navigator.share({
                Title:'Payment Gateway',
                url:document.querySelector("#payment_link").value,
            })
        }
    }


    function copyPayment_link(){
        var account_number = document.getElementById("payment_link");
    
       account_number.select();
        navigator.clipboard.writeText(account_number.value);
    
        alert("Payment link copied to clipboard");
    
       document.querySelector(".copy_link_url").innerHTML ="<i class='fa fa-copy'></i>  Link copied";
        
    }
            
    if(window.history.replaceState){
    
        window.history.replaceState(null,null,window.location.href);
    
    }
    
    
      
    function close_otp_message(){
    
    document.querySelector(".form-status-message-overlay").style.display = "none";
    
    
    
    }
    
  
*/