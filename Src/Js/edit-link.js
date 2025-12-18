
document.querySelector(".procceed-btn").addEventListener("click",OpenPINBOX);

function OpenPINBOX(){

    document.querySelector(".Transaction-pin-overlay").style.display = "block";
}

document.querySelector("#ClosetBtn").addEventListener("click",ClosePINBOX);

function ClosePINBOX(){

    document.querySelector(".Transaction-pin-overlay").style.display = "none";
}
 
    
$(document).ready(function (e) {
      
      $("#FormData").on('submit', (function(e){
      
      
        e.preventDefault();
        
      document.querySelector(".loader-overlay-refresh").style.display= "block";
      
         $.ajax({
       
          url: 'edit-payment-link',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
          success:function(Data){
      
        document.querySelector(".loader-overlay-refresh").style.display= "none";
      
           document.querySelector(".status-message").innerHTML = Data;
      
      if(Data == "success"){
      
      
      document.querySelector(".status-message").innerHTML = "";

      window.location.reload();
      
      alert("Payment Link updated successfully");
      
      }else if(Data == "\r\nsuccess"){
      
      
      document.querySelector(".status-message").innerHTML = "";
      
      window.location.reload();
      
      alert("Payment link updated successfully");
      
      }
      
      
      
           
          },
          error:function(Data){
           document.querySelector(".loader-overlay-refresh").style.display= "none";
      
            document.querySelector(".status-message").innerHTML = Data;
      
          }
        
         });
      
      
      
      }));
      
      
        });
      
      
      
      
      
      
      
      document.querySelector("#copy-link").addEventListener("click",copyLink);
      function copyLink(){
      var Link=
      document.getElementById("myInput");
      Link.select();
      Link.setSelectionRange(0,99999);
      navigator.clipboard.writeText(
      Link.value);
      
      
    //  document.querySelector("#copy-link").innerHTML="<b><i class='fa fa-copy' style='color: black'></i> Copied</b>";
      
      alert("Payment Link copied to Clipboard");
      
      }
      
      document.querySelector("#share-btn").addEventListener("click",shareLink);
      
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