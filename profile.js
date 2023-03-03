
var loadFile = function(event){
    var image = document.querySelector("#output");
    image.src = URL.createObjectURL(event.target.files[0]);

};

            document.querySelector(".open-upload-btn").addEventListener("click",open_upload);
            function open_upload(){
                document.querySelector(".upload-option-overlay").style.width = "100%";
            }
document.querySelector("#close-upload-btn").addEventListener("click",close_upload);
            function close_upload(){
                document.querySelector(".upload-option-overlay").style.width= "0%";
            }
       

    document.querySelector(".copy-account-no").addEventListener("click",copyAcct_no);

function copyAcct_no(){
    var account_number = document.getElementById("account-number");

   account_number.select();
    navigator.clipboard.writeText(account_number.value);

    alert("Account Number copied to clipboard");

   document.querySelector(".copy-account-no").innerHTML ="Copied";
    
}


if(window.history.replaceState){

    window.history.replaceState(null,null,window.location.href);

}

function see_more(){
  var see_more_info =  document.querySelector(".more-infromation");


  if (see_more_info.style.display == "none"){
    see_more_info.style.display = "block";
  }else{
    see_more_info.style.display = "none";
  }

}


document.querySelector(".request_top_btn").addEventListener("click",Send_otp);

function Send_otp(){


//var b = document.querySelector(".otp-message").value;


/*
$.ajax({
    type: "POST",
    url: "Send otp.php",
    data: formData,
    dataType: "Json",
    encode: true,
    
}).done(function(data){
    console.log(data);
});
event.preventDefault();
/*
});
});*/



//alert(b);
/*
if (b = ""){

    alert("An unknow error has occur");
}else{

$.ajax{}



}*/


}



//CLOSE UPLOAD OVERLAY //

function close_uplaod_overlay(){


    document.querySelector(".upload-option-overlay").style.width = "0%";


}

function open_verify_email(){



document.querySelector(".verificastion-container-overlay").style.width = "100%";

}

function close_email_verify(){


document.querySelector(".verificastion-container-overlay").style.width = "0%";
}


//REQUEST FOR OTP BTN TO SEND OTP//

$(() => {

$("#submitButton").click(function(ev){

//show laoder pending whne form submit//


document.querySelector(".loader-overlay").style.display = "block";


////

var form = $("#formId");
var url = form.attr('action');

$.ajax ({
  type: "POST",
  url: url,
  data: form.serialize(),
dataType:'json',
encode: true,
  success: function(data){
    //form has beeen submitted//

    console.log();

    document.querySelector(".verificastion-container-overlay").style.width = "0%";
    
    document.querySelector(".loader-overlay").style.display = "none";

  //  alert("Form submitted successfully");

  },
  error: function(data){


    var error = document.querySelector(".error_message");

error.innerHTML = data.responseText;

    document.querySelector(".verificastion-container-overlay").style.width = "0%";
   
    
    document.querySelector(".loader-overlay").style.display = "none";
  


}
});
});

});

//END OF OTP BTN//


function close_otp_message(){

document.querySelector(".form-status-message-overlay").style.display="none";
/*
window.location.reload();*/


}





//VERIFY OTP BTN



$(() => {

$("#Otp_submitButton").click(function(ev){
//STOP PAGE FROM REFRESIN//

ev.preventDefault();


//show laoder pending whne form submit//


document.querySelector(".loader-overlay").style.display = "block";


////

var form = $("#Otp_formId");
var url = "email verify otp.php";

$.ajax ({

type: "POST",
url: url,
data: form.serialize(),
encode: true,
dataType:"json",
success: function(data){
    //alert("success");

    console.log();

    
  var error = document.querySelector(".error_message");

error.innerHTML = data.responseText;

  document.querySelector(".loader-overlay").style.display = "none";


document.querySelector(".verificastion-container-overlay").style.width = "0%";


document.querySelector(".reset_number").value= "";


//  alert("Form submitted successfully");

},
error: function(data){

    document.querySelector(".loader-overlay").style.display = "block";


  document.querySelector(".verificastion-container-overlay").style.width = "0%";
   

  var error = document.querySelector(".error_message");

  error.innerHTML = data.responseText;


  document.querySelector(".reset_number").value= "";


 // alert("Invalid otp");
}
});
});

});




//END OF VERIFY OTP BTN




