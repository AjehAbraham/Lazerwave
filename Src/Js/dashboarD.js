
  //const test = localStorage.clear();

  
  function AutoChecker(){


    Bal = document.querySelector("#UserId").value;
    
    
    var Mode = localStorage.getItem("BalStatus");
    
    
    if(Mode === "Hide"){
    
    
    document.querySelector(".Account-balance-p").innerHTML = 
    "<i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><br>";
    
    
    
    }else{
    
    
    document.querySelector(".Account-balance-p").innerHTML = Bal;
    
    
    
    }
    
    }
    window.onload = AutoChecker();
    
    
    
    document.querySelector("#balStatus").addEventListener("click",Bal_status);
    function Bal_status(){
    
    
    Bal = document.querySelector("#UserId").value;
    
    
    var Mode = localStorage.getItem("BalStatus");
    
    
    
    if(Mode == "Hide"){
    
      
      localStorage.removeItem("BalStatus");
    
      localStorage.setItem("BalStatus","Show");
    
    }else{
    
      localStorage.removeItem("BalStatus");
      
      localStorage.setItem("BalStatus","Hide");
    
    
    }
    
    
    
    if(Mode == "Hide"){
    
    
    
      document.querySelector(".Account-balance-p").innerHTML = 
      "<i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><br>";
      
      
    
    }else{
    
    
    
      document.querySelector(".Account-balance-p").innerHTML = Bal;
      
    
    }
    
    
    }