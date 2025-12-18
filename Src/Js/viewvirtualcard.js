
$(document).ready(function (e) {
        
  $(".form_data").on('submit', (function(e){
  
    e.preventDefault();
    
  document.querySelector(".loader-overlay").style.display= "block";
  
     $.ajax({
   
      url: 'Router/view_virtualcard',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
  
    document.querySelector(".loader-overlay").style.display= "none";
  
       document.querySelector(".status_message").innerHTML = Data;
  
if(Data != ""){

document.querySelector("#closeCardbtn").addEventListener("click",closeBankcard);
    function closeBankcard(){
      document.querySelector(".container-fluid-overlay").style.width= "0%";
    }



//FUNCTION TO UNBLOCK AND BLOCK CARD//
$(document).ready(function (e) {
  
  $("#formId").on('submit', (function(e){
  
    e.preventDefault();
    
  document.querySelector(".loader-overlay").style.display= "block";
  
     $.ajax({
   
      url: 'Process/Payment-Gateway/Card-Gateway/Block-card',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
  
    document.querySelector(".loader-overlay").style.display= "none";
  
      
if(Data == "success" || Data == "\r\nsuccess"){

  window.location.reload();
alert("Card status updated successfuly!");

}else{

alert(Data);

}

       
      },
      error:function(Data){
       document.querySelector(".loader-overlay").style.display= "none";
  
       alert("An error occured,please try again or reload page");
  
      }
    
     });
  
  
  
  }));
  
  
    });

//EMD OF BLOCK AND UNBLOCK BANK CARD//




}else{

alert("Failed,please try again");

}
       
      },
      error:function(Data){
       document.querySelector(".loader-overlay").style.display= "none";
  
        document.querySelector(".status_message").innerHTML = Data;
  
      }
    
     });
  
  
  }));
  
  
    });

    //COMPELETE TRASACTION FORM//

    function Open_pin_box(){
document.querySelector(".Transaction-pin-overlay").style.display = "block";
}

function CloseTransaction_pin(){
document.querySelector(".Transaction-pin-overlay").style.display = "none";
}     



