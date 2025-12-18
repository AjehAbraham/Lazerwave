
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
//COPY USERNAME//

function copyUsername(){
var AccountNumber=
document.getElementById("Username");
AccountNumber.select();
/*
AccountNumber.setSelectionRange(0,99999);*/
navigator.clipboard.writeText(
AccountNumber.value);
alert("Username copied to clipboard");
/*
document.getElementById("copy").innerText="Copied";*/
}

//END COPY USERNAME



function see_more(){
  var see_more_info =  document.querySelector(".more-infromation");


  if (see_more_info.style.display == "none"){
    see_more_info.style.display = "block";
    document.querySelector(".More").innerHTML="See less";
    
  }else{
    see_more_info.style.display = "none";
    
    document.querySelector(".More").innerHTML="See more...";
    
  }

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


$(document).ready(function (e) {
      
  $("#Form-data-dp").on('submit', (function(e){
  
  
    e.preventDefault();
    
  document.querySelector(".loader-overlay").style.display= "block";
  
     $.ajax({
   
      url: 'Upload-profile-pics',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
  
    document.querySelector(".loader-overlay").style.display= "none";
  
       document.querySelector(".error_message").innerHTML = Data;
  
if(Data == "\r\nSuccess"){
  document.querySelector(".error_message").innerHTML = "";

alert("Profile picture uploaded successfully");

window.location.reload();

}else if(Data == "Success"){

  document.querySelector(".error_message").innerHTML = "";

alert("Profile picture uploaded successfully");
window.location.reload();

}



      },
      error:function(Data){
       document.querySelector(".loader-overlay").style.display= "none";
  
        document.querySelector(".error_message").innerHTML = Data;
  
      }
    
     });
  
  
  
  }));
  
  
    });
    

   
