
function show_acct_no(){
    var acct =document.querySelector(".acct_no");
    
    
    if(acct.style.display == "none"){
    
    acct.style.display= "block";
    }else{
    acct.style.display= "none";
    }
    
    
    }
    
    document.querySelector("#copy-btn").addEventListener("click",copyNo);
    function copyNo(){
    var AccountNumber=
    document.getElementById("myInput");
    AccountNumber.select();
    AccountNumber.setSelectionRange(0,99999);
    navigator.clipboard.writeText(
    AccountNumber.value);
    alert("Account Number copied to Clipboard");
    
    document.getElementById("copy-btn").innerText="Copied";
    }
    function Checkmode(){
    
    var current_mode = localStorage.getItem("Theme");
    
    if(current_mode == "Dark-mode"){
    
    
    var dark = document.body;
    
    dark.classList.add("Dark-mode");
    
    
    document.querySelector("#theme").checked= true;
    
    
    }else{
    
    var dark = document.body;
    
    dark.classList.add("Light-mode");
    
    document.querySelector("#theme").checked= false;
    
    
    
    
    }
    
    
    }
    
    var mode = Checkmode();
    
    
    