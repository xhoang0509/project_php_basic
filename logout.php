<?php
session_start();
session_destroy();
setcookie('remmember', NULL, -1);
header('location:index.php');
exit();