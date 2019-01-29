<?php
/*This code is copyright (c) 2019, All Rights Reserved. and is 
governed by the GNU greater license. */ 
session_start();
require("functions.php");
display();
sendmsg(); 
session_destroy();
?>