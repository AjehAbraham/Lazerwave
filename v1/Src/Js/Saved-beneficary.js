document.querySelector("#openSavedbtn").addEventListener("click",view_saved);
function view_saved(){

document.querySelector("#openSavedbtn").style.borderBottom= "5px solid rgb(0,0,56)";

  document.querySelector(".saved-detail-container").style.display ="block";

  document.querySelector(".recent-detail-container").style.display ="none";
  document.querySelector("#openRecentbtn").style.borderBottom= "0px";
}

document.querySelector("#openRecentbtn").addEventListener("click",view_recent);
function view_recent(){
  document.querySelector("#openRecentbtn").style.borderBottom= "5px solid rgb(0,0,56)";

  document.querySelector(".recent-detail-container").style.display ="block";

  document.querySelector(".saved-detail-container").style.display ="none";
 

  document.querySelector("#openSavedbtn").style.borderBottom= "0px";
}
document.querySelector(".closeDetailbtn").addEventListener("click",closeDetails);
function closeDetails(){
  document.querySelector(".container-fluid-saved-overlay").style.display="none";
}

function openBene(){
 var Bene = document.querySelector(".container-fluid-saved-overlay");

 if(Bene.style.display == "none"){

  document.querySelector(".container-fluid-saved-overlay").style.display="block";

 }else if(Bene.style.display == "block"){

document.querySelector(".container-fluid-saved-overlay").style.display="none";

 }else{

document.querySelector(".container-fluid-saved-overlay").style.display="block";
 }

}

$(document).ready(function (e) {
      
      $(".BeneData").on('submit', (function(e){
      
        e.preventDefault();
        
      document.querySelector(".loader-overlay").style.display= "block";
      
         $.ajax({
       
          url: 'Process/Info/verify-beneficiary',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
          success:function(Data){
      
        document.querySelector(".loader-overlay").style.display= "none";
      
  if(Data == ""){
  
  alert("Error occured fetching details");
  
  }else if(Data != ""){
  
    document.querySelector("#acctNO").value = Data +" ";

    document.querySelector(".container-fluid-saved-overlay").style.display="none";

  }
  
           
          },
          error:function(Data){
           document.querySelector(".loader-overlay").style.display= "none";
      
           alert("An error occured,please try again or reload page");
      
          }
        
         });
      
      
      
      }));
      
      
        });
