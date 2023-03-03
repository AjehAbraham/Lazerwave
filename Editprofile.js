//SEND FORM INPUT //


$(() => {

    $("#submitButton").click(function(ev){
    //STOP PAGE FROM REFRESIN//
    
    (ev).preventDefault();
    
    
    //show laoder pending whne form submit//
    
    
      document.querySelector(".loader-overlay").style.display = "block";
     
    
      ////
    
      var form = $("#FormId");
      var url = "Editprofile process.php";
    
      $.ajax ({
    
        type: "POST",
        url: url,
        data: form.serialize(),
        encode: true,
        dataType:"json",
        success: function(data){
           // alert("success");
    
            console.log();
            
          //form has beeen submitted//
    
          document.querySelector(".loader-overlay").style.display = "none";
    
    
          document.querySelector(".form-status-message-overlay").style.display ="block";
    
    //check if it is successull or it failed//
    
    var res = document.querySelector(".error_message");
    
    res.innerHTML= data.responseText;
    
    
        //  alert("Form submitted successfully");
    
        },
        error: function(data){
    
        //  alert("failed");
            document.querySelector(".loader-overlay").style.display = "none";
    
    
            var reply = data.responseText
    
        var res = document.querySelector(".error_message");
    
        res.innerHTML= reply;
    
    
          //alert("Invalid otp");
        }
      });
    });
    
    });
    
    
    //END OF SEND FORM INPUT

    
function close_otp_message(){

  document.querySelector(".form-status-message-overlay").style.display = "none";
  
  
  
  }