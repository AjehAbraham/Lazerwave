function Submit_Form_Data(event){

    document.querySelector(".loader-overlay").style.display ="block";
    
    var form = $("#Form-Data");
    var url = "Process/Info/Transaction-history";
    
    $.ajax ({
    type: "POST",
    url: url,
    data: form.serialize(),
    dataType:'json',
    encode: true,
    success: function(data){
    //form has beeen submitted//
    
    },
    error: function(data){
    document.querySelector(".loader-overlay").style.display ="none";
    
    document.querySelector(".error_message").innerHTML  = data.responseText;    
    
    }
    });
    
    }
    const myTimeout = setTimeout(Submit_Form_Data,1000);
    
    
    
    
    function Submit_category(){
    
    document.querySelector(".loader-overlay-refresh").style.display ="block";
    
    var form = $("#Form-Data");
    var url = "Process/Info/Refresh-transaction-history";
    
    $.ajax ({
    type: "POST",
    url: url,
    data: form.serialize(),
    dataType:'json',
    encode: true,
    success: function(data){
    
    },
    error: function(data){
    document.querySelector(".loader-overlay-refresh").style.display ="none";
    
    document.querySelector(".error_message").innerHTML  = data.responseText;    
    
    }
    });
    
    }
    
    function Submit_category_two(){
    
    document.querySelector(".loader-overlay-refresh").style.display ="block";
    
    var form = $("#Form-Data");
    var url = "Process/Info/Refresh-transaction-history";
    
    $.ajax ({
    type: "POST",
    url: url,
    data: form.serialize(),
    dataType:'json',
    encode: true,
    success: function(data){
    
    },
    error: function(data){
    document.querySelector(".loader-overlay-refresh").style.display ="none";
    
    document.querySelector(".error_message").innerHTML  = data.responseText;    
    
    }
    });
    
    }
   document.querySelector(".refresh_notification").addEventListener("click", refresh_page);
    
    function refresh_page(){
    
        document.querySelector(".loader-overlay-refresh").style.display ="block";
        
        var form = $("#Form-Data");
        var url = "Process/Info/Refresh-transaction-history";
        
        $.ajax ({
        type: "POST",
        url: url,
        data: form.serialize(),
        dataType:'json',
        encode: true,
        success: function(data){
        
        },
        error: function(data){
        document.querySelector(".loader-overlay-refresh").style.display ="none";
        
        document.querySelector(".error_message").innerHTML  = data.responseText;    
        
        }
        });
        
        }


        //CHECK FOR DARK MODE//

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