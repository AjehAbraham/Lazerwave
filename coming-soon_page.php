
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <!--link rel="stylesheet" href=""-->
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>Page coming soon</title>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>
      </head>
      <body>



        <div class="Page-container-fluid">
          <p>Coming soon</p>
        <p><a href="dashboard-home"><i class="fa fa-home"></i> Home</a></p>
        <p onclick="window.history.back()"><i class="fa fa-refresh" ></i> Go Back</p>
        </div>


        <style>
          body{
            margin: 0;
        
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
            font-size: 13px;
        }
        .Page-container-fluid{
          margin: auto;
        }
        .Page-container-fluid p:nth-child(1){
text-align: center;
font-weight: bold;
font-size: 18px;
        }
        .Page-container-fluid p:nth-child(2){
          text-align: center;
          color: white;
          border-radius: 2rem;
          width: 50%;
          margin: auto;
          background-color: rgb(0,0,56);
          cursor: pointer;
          padding: 6px 6px;
          margin-bottom: 15px;;
                  }
                  .Page-container-fluid p:nth-child(3){
                    text-align: center;
                    color: white;
                    border-radius: 2rem;
                    width: 50%;
                    margin: auto;
                    background-color: rgb(0,0,56);
                    cursor: pointer;
                    padding: 6px 6px;
                            }
                            .Page-container-fluid p a:link,a:visited{
                              color: white;
                              text-decoration: none;
                            }
                            .Dark-mode{
                              background-color: rgb(0,0,56);
                              color: white;
                            }
                            .Dark-mode .Page-container-fluid p:nth-child(3){
                              background-color: rgb(0,0,100);
                            }
                            .Dark-mode .Page-container-fluid p:nth-child(2){
                              background-color: rgb(0,0,100);
                            }
        </style>
        <script>
                  
  function Checkmode(){

var current_mode = localStorage.getItem("Theme");

if(current_mode == "Dark-mode"){


var dark = document.body;

dark.classList.add("Dark-mode");



}else{

//var dark = document.body;

dark.classList.add("Light-mode");




}


}

var mode = Checkmode();
</script>

                        </body>
                        </html>