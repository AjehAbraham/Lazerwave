
document.querySelector(".close-btn").addEventListener("click",close_history);

function close_history(){

document.querySelector(".Payment-link-details-container").style.width="0%";

}



document.querySelector(".open-btn").addEventListener("click",Open_history);
function Open_history(){

document.querySelector(".Payment-link-details-container").style.width="100%";

}

