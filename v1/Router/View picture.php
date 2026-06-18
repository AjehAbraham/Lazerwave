<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

     // header('HTTP/1.0 403 Forbiddden',TRUE,403);
     // die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}

?>
    
    
    <style>
    .Profile-picture_container-fluid{
    
    background-color: black;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: none;
    z-index: 2;
    
    }
    .Profile-picture_container-fluid label{
        padding: 10px 10px;
        background-color: rgb(0,0,56);
        color: white;
        border-radius: 2rem;
        text-align: center;
        margin: auto;
        display: block;
    width: 50%;
    cursor: pointer;
    }
    
    .Profile-picture_container-fluid input[type=submit]{
        padding: 10px 10px;
        background-color: rgb(0,0,56);
        color: white;
        border-radius: 2rem;
        border: 0px;
        width: 50%;
        text-align: center;
        margin: auto;
        display: block;
        cursor: pointer;
        font-size: 15px;
    }
    .picture{
    
    border: 2px solid white;
    border-radius: 50%;
    width: 200px;
    height: 200px;
    margin: auto;
 
 
    
    }
    .picture img{
    border-radius: 50%;
    width: 200px;
    height: 200px;
    
    }
    #closeBTN{
        cursor: pointer;
        font-size: 17px;
    }
    </style>
    
    
    
 
    
    <div class="Profile-picture_container-fluid">
    <b><i class="fa fa-close" id="closeBTN"></i></b>

    <div class="picture"><img src="<?php echo  $dp; ?>" id="outputs"></div>
    
<br>
    <form id="uploadData">
            <input type="file" name="image"  onchange ="loadFiles(event)"style="display:none;" id="file" accept="image">

<label for="file">Add Image</label><br>
        <input type="submit" value="upload"><br><br>
</form>

<p class="upload-response"></p>
    </div>
    
    
    
    <script>
        
var loadFiles = function(event){
    var image = document.querySelector("#outputs");
    image.src = URL.createObjectURL(event.target.files[0]);

};
    
    function open_picture(){
    
    document.querySelector(".Profile-picture_container-fluid").style.display="block";
    
    
    }
    
    
    document.querySelector("#closeBTN").addEventListener("click",close_picture);
    
    function close_picture(){
    
    document.querySelector(".Profile-picture_container-fluid").style.display="none";
    
    
    }
    
$(document).ready(function (e) {
      
      $("#uploadData").on('submit', (function(e){
      
      
        e.preventDefault();
        
      document.querySelector(".loader-overlay-refresh").style.display= "block";
      
         $.ajax({
       
          url: 'Upload-profile-pics',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
          success:function(Data){
      
        document.querySelector(".loader-overlay-refresh").style.display= "none";
      
           document.querySelector(".upload-response").innerHTML = Data;
      
    if(Data == "\r\nSuccess"){
      document.querySelector(".upload-response").innerHTML = "";
    
    alert("Profile picture uploaded successfully");
    
    window.location.reload();
    
    }else if(Data == "Success"){
    
      document.querySelector(".upload-response").innerHTML = "";
    
    alert("Profile picture uploaded successfully");
    window.location.reload();
    
    }
    
    
    
          },
          error:function(Data){
           document.querySelector(".loader-overlay-refresh").style.display= "none";
      
            document.querySelector(".upload-response").innerHTML = Data;
      
          }
        
         });
      
      
      
      }));
      
      
        });
        
    
       
    </script>
    
    