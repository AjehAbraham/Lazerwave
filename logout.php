<?php

session_start();

//DESTROY REMEMBER ME COOKIE

setcookie("userId","",time()- 8640 * 7);

setcookie("check_confirm_real","",time() - 8640 * 70);

session_destroy();

header("location:index.php");
exit;