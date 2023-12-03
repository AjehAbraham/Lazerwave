<?php
session_start();

//DESTROY REMEMBER ME COOKIE

setcookie("userId","",time()- 86400 * 7);

setcookie("Token","",time() - 86400 * 7);


setcookie("last_visited_page","",time() - 86400 * 7);



//setcookie("Cookie_consent", "", time()  + 86400 * 1);


session_destroy();

header("location:Login");
exit;