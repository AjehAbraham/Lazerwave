
    const hour = new Date().getHours();

let greet;

if (hour < 13){
    greet = "Good Morning";
}else if(hour < 13 || hour >=18){
    greet = "Good Afternoon";
}else{
    greet = "Good Evening";
}

document.querySelector(".show-greeting").innerHTML = greet;


if(window.history.replaceState){

    window.history.replaceState(null,null,window.location.href);

}

//document.querySelector("#show-balance").addEventListener("click",showBalance);

  /*
  function showBalance(){
      var balance = document.querySelector(".Account-balance");
  
      var hide_balance = document.querySelector(".replace-balance");
  
  
      if (balance.style.display == "none"){
          hide_balance.style.display = "block";
      }else{
        balance.style.display = "block";
        hide_balance.style.display = "none";
      }
  
  }
  */
