<?php
session_start();
session_destroy();
setcookie('remmember',-1); // delete cookie
header('location:index.php');
exit();