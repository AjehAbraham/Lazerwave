
function Open_pin_box(){

    document.querySelector(".Transaction-pin-overlay").style.display = "block";
    
    }
     
    function CloseTransaction_pin(){
    
    document.querySelector(".Transaction-pin-overlay").style.display = "none";
    
    }
    
    
    $(document).ready(function (e) {
          
          $("#formId").on('submit', (function(e){
                e.preventDefault();
            
          document.querySelector(".loader-overlay").style.display= "block";
          
             $.ajax({
           
              url: 'Process/Payment-Gateway/Card-Gateway/Block-card',
          type : 'POST',
          data: new FormData(this),
          cache: false,
          contentType: false,
          processData: false,
              success:function(Data){
          
            document.querySelector(".loader-overlay").style.display= "none";
          
               document.querySelector(".status-message").innerHTML = Data;
          
        if(Data == "\r\nsuccess"){
        
          document.querySelector(".status-message").innerHTML = "";
          //alert("Card created successfully");
       window.location.reload();
       
        
        }else if(Data == "success"){
        
          document.querySelector(".status-message").innerHTML = "";
      //  alert("Card created successfully");
       window.location.reload();
        
        }
        
        
        
              },
              error:function(Data){
               document.querySelector(".loader-overlay").style.display= "none";
          
                document.querySelector(".status-message").innerHTML = Data;
          
              }
            
             });
          
          
          
          }));
          
          
            });
            
    
    
    
        function submit_form(event){
    
        event.preventDefault();
        
        document.querySelector(".loader-overlay").style.display = "block";
        
        
        ////
        
        var form = $("#formId");
        var url = 'Process/Payment-Gateway/Card-Gateway/Block-card';
        
        $.ajax ({
          type: "POST",
          url: url,
          data: form.serialize(),
        dataType:'json',
        encode: true,
        success: function(data){
            //form has beeen submitted//
        
            console.log();
        
            document.querySelector(".loader-overlay").style.display = "none";
        
           
            var error = document.querySelector(".error_message");
        
        error.innerHTML = data.responseText;
        
          //  alert("Form submitted successfully");
        
          },
          error: function(data){
        document.querySelector(".loader-overlay").style.display = "none";
        
            var error = document.querySelector(".error_message");
        
        error.innerHTML = data.responseText;
        
        if(data.responseText == "\r\nsuccess"){

          error.innerHTML ="";
        window.location.reload();


        }else if(data.responseText == "success"){
          
          error.innerHTML ="";
          window.location.reload();

        }
           
        
        }
        });
    
    
    }