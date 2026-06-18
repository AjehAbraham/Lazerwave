<?php

$page = ($_SERVER["SCRIPT_NAME"]);

$page = basename($page);

$cookie_name ="last_visited_page";

$cookie_value = $page;

setcookie($cookie_name,$cookie_value, time() + 86400);


?>