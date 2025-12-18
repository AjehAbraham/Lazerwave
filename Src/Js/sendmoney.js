function check_acct_no(){
        
    document.querySelector(".acct_error_message").innerHTML ="please wait...";
   
   var form = $("#form-data");
var url = "Process/Info/Account-info";
   
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

document.querySelector(".acct_error_message").innerHTML  = data.responseText;    

}
});

}

 
function Verify_amount()  {

document.querySelector(".amount_error_message").innerHTML ="please wait...";

var form = $("#form-data");
var url = "Process/Info/Amount-info";

$.ajax ({
type: "POST",
url: url,
data: form.serialize(),
dataType:'json',
encode: true,
success: function(data){
//form has beeen submitted//

console.log();


var error = document.querySelector(".amount_error_message");

error.innerHTML = data.responseText;

},
error: function(data){

var error = document.querySelector(".amount_error_message");

error.innerHTML = data.responseText;

}
});

}



$(document).ready(function (e) {

$("#form-data").on('submit', (function(e){


e.preventDefault();

document.querySelector(".loader-overlay").style.display= "block";

$.ajax({

url: 'confirm',
type : 'POST',
data: new FormData(this),
cache: false,
contentType: false,
processData: false,
success:function(Data){

document.querySelector(".loader-overlay").style.display= "none";

document.querySelector(".error_message").innerHTML = Data;




},
error:function(Data){
document.querySelector(".loader-overlay").style.display= "none";

document.querySelector(".error_message").innerHTML = Data;

}

});



}));


});

//COMPELETE TRASACTION FORM//

function Submit_datas(event){

event.preventDefault();

document.querySelector(".loader-overlay-refresh").style.display ="block";

var form = $("#form-data");
var url = "Process/Payment-Gateway/checkout";

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

if(data.responseText == "\r\nSuccess"){


document.querySelector("#form-data").reset();


document.querySelector(".status-message").innsetHTML= "";

//alert("Transaction successfuly");

window.location.href="Transaction-status";

}else if(data.responseText == "Success"){

document.querySelector("#form-data").reset();


document.querySelector(".status-message").innsetHTML= "";

//alert("Transaction successfuly");

window.location.href=" Transaction-status";

}


document.querySelector(".Transaction_error_message").innerHTML  = data.responseText;    

}
});

}




//document.querySelector(".opentBtn").addEventListener("click",OpenTransaction_pin);
function OpenPinBox(){



document.querySelector(".Transaction-pin-overlay").style.display ="block";
}


//document.querySelector("#ClosetBtn").addEventListener("click",CloseTransaction_pin);
function CloseTransaction_pin(){

//document.querySelector(".confrim-payment-overlay").style.display ="none";

document.querySelector(".Transaction-pin-overlay").style.display ="none";
}

function CloseForm(){
document.querySelector(".confrim-payment-overlay").style.display = "none";

}




function Checkmode(){

var current_mode = localStorage.getItem("Theme");

if(current_mode == "Dark-mode"){


var dark = document.body;

dark.classList.add("Dark-mode");


}else{

var dark = document.body;

dark.classList.add("Light-mode");




}


}

var mode = Checkmode();


