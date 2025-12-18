                    

var loadFile = function(event){
    var image = document.querySelector("#output");
    image.src = URL.createObjectURL(event.target.files[0]);
  
  };
  
  
  //JQUERY TO AUTO INCREASE TEXT AREA SIZE//
  
  
  $("textarea").each(function () {
  this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
  }).on("input", function () {
  this.style.height = 0;
  this.style.height = (this.scrollHeight) + "px";
  });
  
  
  
    
  $(document).ready(function (e) {
      
  $("#FormData").on('submit', (function(e){
  
  
    e.preventDefault();
    
  document.querySelector(".loader-overlay-refresh").style.display= "block";
  
     $.ajax({
   
      url: 'create-payment-link-process',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
  
    document.querySelector(".loader-overlay-refresh").style.display= "none";
  
       document.querySelector(".error_message").innerHTML = Data;
  
  if(Data == "success"){
  
  document.querySelector("#FormData").reset();
  
  document.querySelector(".error_message").innerHTML = "";
  
  alert("Payment Link Created successfully");
  
  }else if(Data == "\r\nsuccess"){
  
  document.querySelector("#FormData").reset();
  
  document.querySelector(".error_message").innerHTML = "";
  
  alert("Payment link Created successfully");
  
  }
  
  
  
       
      },
      error:function(Data){
       document.querySelector(".loader-overlay-refresh").style.display= "none";
  
        document.querySelector(".error_message").innerHTML = Data;
  
      }
    
     });
  
  
  
  }));
  
  
    });
  
  
  
  
  
  
  
  document.querySelector(".copy-link").addEventListener("click",copyLink);
  function copyLink(){
  var Link=
  document.getElementById("myInput");
  Link.select();
  Link.setSelectionRange(0,99999);
  navigator.clipboard.writeText(
  Link.value);
  
  
  document.querySelector(".copy-link").innerHTML="<b><i class='fa fa-copy' style='color: black'></i> Copied</b>";
  
  alert("Payment Link copied to Clipboard");
  
  }
  
  document.querySelector(".share-link").addEventListener("click",shareLink);
  
  function shareLink(){
  
  SharingData = document.querySelector("#myInput").value;
  
  SharingTitle = document.querySelector("#Title").value;
  
  if (navigator.share){
    navigator.share({
        title: SharingTitle,
        url: SharingData,
    })
  }else{
    alert("opps your device does not support share");
  }
  
  }
  
  document.querySelector(".closeStatus").addEventListener("click",HideStatus);
  function HideStatus(){
  document.querySelector("#FormData").reset();
  
    document.querySelector(".container-fliud-class").style.width= "0%";
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
  
  
  
  