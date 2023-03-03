document.querySelector("#open-add-card-btn").addEventListener("click",opencontainer);

function opencontainer(){
    document.querySelector(".add-card-information").style.width = "100%";
}

document.querySelector("#close-btn").addEventListener("click",closeContainer);

function closeContainer(){
    document.querySelector(".add-card-information").style.width = "0%";
}


if(window.history.replaceState){

    window.history.replaceState(null,null,window.location.href);

}

