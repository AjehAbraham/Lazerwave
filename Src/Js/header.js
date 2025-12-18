document.getElementById("open-btn").addEventListener("click",openSidebar);

function openSidebar(){
    
    document.querySelector(".sidebar-container").style.width = "50%";
}

document.querySelector("#close-btn").addEventListener("click",CloseSidebar);

function CloseSidebar(){

    document.querySelector(".sidebar-container").style.width = "0%";
}