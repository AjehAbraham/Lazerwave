
var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);



$(document).ready(function (e) {
      
      $("#FormData").on('submit', (function(e){
      
      
        e.preventDefault();
        
      document.querySelector(".loader-overlay-refresh").style.display= "block";
      
         $.ajax({
       
          url: 'Process/Process-reg',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
          success:function(Data){
      
        document.querySelector(".loader-overlay-refresh").style.display= "none";
      
           document.querySelector(".error_message").innerHTML = Data;
      
  if(Data == "success"){
    document.querySelector(".error_message").innerHTML = "";
    
    document.querySelector("#FormData").reset();
  
  alert("Registeration successful");
  
  window.location.href = "Login";
  
  
  }else if(Data == "\r\nsuccess"){
  
    document.querySelector(".error_message").innerHTML = "";
  
    document.querySelector("#FormData").reset();
  
    alert("Registeration successful");
  
  
  window.location.href = "Login";
  
  
  }
  
  
  
           
          },
          error:function(Data){
           document.querySelector(".loader-overlay-refresh").style.display= "none";
      
            document.querySelector(".error_message").innerHTML = Data;
      
          }
        
         });
      
      
      
      }));
      
      
        });
  
        //COMPELETE  FORM//

        function passwordReveal(){
  
          var password = document.querySelector("#passw");
          var pass2 = document.querySelector("#passw2");
            
            if (password.type === "password"){
            
            password.type =("text");
          
            document.querySelector(".show_passowrd_text").innerHTML="Hide password";
            
            }else{
          
                password.type =("password");
             
               document.querySelector(".show_passowrd_text").innerHTML="Show password";
            
            }
          
             
            if (pass2.type == "text"){
          
          pass2.type =("password");
          
          }else{
          
            pass2.type =("text");
          
          }
          
          }
          
          function verifypass(){
          
          //CHECK IF PASSWORD REACH THE REQUIREMENT//
          
          var myInput = document.querySelector("#passw");
          var letter= document.querySelector(".check1");
          // Validate lowercase letters
          var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {
              letter.style.color="mediumseagreen";
              document.querySelector(".check1").innerHTML='<i class="fa fa-check" id="box1"></i> Lowercase letter';
            } else {
              letter.style.color="red";
              document.querySelector(".check1").innerHTML='<i class="fa fa-close" id="box1"></i> Lowercase letter';
          }
          
          
          var letter= document.querySelector(".check2");
          // Validate uppercase letters
          var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {
              letter.style.color="mediumseagreen";
              document.querySelector(".check2").innerHTML='<i class="fa fa-check" id="box2"></i>A Capital(Uppercase) letter';
            } else {
              letter.style.color="red";
              document.querySelector(".check2").innerHTML='<i class="fa fa-close" id="box2"></i> A Capital(Uppercase) letter';
          }
          
          
          var letter= document.querySelector(".check3");
          // Validate numbers
          var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {
              letter.style.color="mediumseagreen";
              document.querySelector(".check3").innerHTML='<i class="fa fa-check" id="box3"></i> A Number';
            } else {
              letter.style.color="red";
              document.querySelector(".check3").innerHTML='<i class="fa fa-close" id="box3"></i> A Number';
          }
          
          var letter= document.querySelector(".check4");
            // Validate length
            if(myInput.value.length >= 8) {
              letter.style.color="mediumseagreen";
              document.querySelector(".check4").innerHTML='<i class="fa fa-check" id="box4"></i> A Minimum 8 in length';
            } else {
              document.querySelector(".check4").innerHTML='<i class="fa fa-close" id="box4"></i> A Minimum 8 in length';
              letter.style.color="red";
          
            }
          
            
          var letter= document.querySelector(".check5");
            // Validate special char
            var specialchar = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            if(myInput.value.match(specialchar)) {
              letter.style.color="mediumseagreen";
              document.querySelector(".check5").innerHTML='<i class="fa fa-check" id="box5"></i> At least one special charater';
            } else {
              document.querySelector(".check5").innerHTML='<i class="fa fa-close" id="box5"></i> At least one special charater';
              letter.style.color="red";
          
            }
          
          
          }
            
  
        
  function Checkmode(){
  
  var current_mode = localStorage.getItem("Theme");
  
  if(current_mode == "Dark-mode"){
  
  
  var dark = document.body;
  
  dark.classList.add("Dark-mode");
  
  
  // document.querySelector("#theme").checked= true;
  
  
  }else{
  
  var dark = document.body;
  
  dark.classList.add("Light-mode");
  
  //document.querySelector("#theme").checked= false;
  
  
  
  
  }
  
  
  }
  
  var mode = Checkmode();
  