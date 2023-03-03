
if(window.history.replaceState){
     
    window.history.replaceState(null,null,window.location.href);
    
    }


/*
document.querySelector("#open-container-btn").addEventListener("click",closeConfirm);
*/
function openConfirm(event){
    document.querySelector(".verifcation-box").style.width = "100%";
}


document.querySelector("#close-container-btn").addEventListener("click",closeConfirm);

function closeConfirm(){
    document.querySelector(".verifcation-box").style.width = "0%";
}