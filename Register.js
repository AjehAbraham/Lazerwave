
  if(window.history.replaceState){
  
  window.history.replaceState(null,null,window.location.href);
  
  }




  
function close_otp_message(){

document.querySelector(".form-status-message-overlay").style.display = "none";



}




$(() => {

$("#submitButton").click(function(ev){
//STOP PAGE FROM REFRESIN//

ev.preventDefault();


//show laoder pending whne form submit//


  document.querySelector(".loader-overlay").style.display = "block";
 

  ////

  var form = $("#formId");
  var url = "Register proccess.php";

  $.ajax ({

    type: "POST",
    url: url,
    data: form.serialize(),
    dataType:"json",
    success: function(data){
      //  alert("success");

        console.log();
        
      /*  var reply = data.responseText

    document.querySelector(".error_message").innerHTML= reply;

*/
      //form has beeen submitted//

      document.querySelector(".loader-overlay").style.display = "none";


      document.querySelector(".form-status-message-overlay").style.display ="block";

//check if it is successull or it failed//

var res = document.querySelector(".error_message");

res.innerHTML= reply;


    },
    error: function(data){

        document.querySelector(".loader-overlay").style.display = "none";


        document.querySelector(".error_message").innerHTML = data.responseText;



document.querySelector(".form-status-message-overlay").style.display = "block";



if (data.responseText == "Registration successful! &#12819"){


  document.querySelector("$formId").reset();


}


      //alert("Invalid otp");
    }
  });
});

});




//END OF VERIFY OTP BTN













  
/*
  //VALIDATE SURNAME//

function Validate_surname(){



var surname = document.querySelector("#surname");

if (surname.value.length  < 1){

document.querySelector(".danger_surname").innerHTML = "Name cannot be blank";

document.querySelector(".danger_surname").style.color = "red";


surname.style.border="2px solid red";


surname.style.outline="2px solid red";


} else{


  document.querySelector(".danger_surname").innerHTML = "";

  surname.style.border="2px solid #ccc";


  surname.style.outline="1px solid #ccc";


}


}



//VALIDATE LAST NAME


function Validate_last_name(){



var last_name = document.querySelector("#last_name");

if ( last_name .value.length  < 1){

document.querySelector(".danger_last_name").innerHTML = "Name cannot be blank";

document.querySelector(".danger_last_name").style.color = "red";


last_name.style.border="2px solid red";

last_name.style.outline="2px solid red";


} else{


  document.querySelector(".danger_ last_name ").innerHTML = "";

  last_name.style.border="2px solid #ccc";


  last_name.style.outline="1px solid #ccc";


}


}





//VALIDATE PASSWORD//



function Validate_password(){


var password = document.querySelector("#Password");

if (password.value.length < 1){


  document.querySelector(".danger_password").innerHTML = "Please enter password";


  document.querySelector(".danger_password").style.color="red";


password.style.border = "2px solid red";

}else{


  if (password.value.length < 8){


    document.querySelector(".danger_password").innerHTML = "Very weak";


document.querySelector(".danger_password").style.color="red";


password.style.border ="2px solid red";


  }else{


    if (password.value.length >= 8 ){


document.querySelector(".danger_password").innerHTML = "Weak";


document.querySelector(".danger_password").style.color="Yellow";



password.style.border =" 2px solid yellow";


  }else{







}


}

}


if (password.value.length >= 10){


document.querySelector(".danger_password").innerHTML = "Strong";


document.querySelector(".danger_password").style.color="Green";


password.style.border ="2px solid #ccc";




  }


}



*/