<?php
session_start();
$_SESSION = array();
setcookie (session_id(), "", time() - 3600);
session_destroy();

// Destruction du tableau de session
unset($_SESSION);
header("location: ../vue/Login.php");
exit();

?>