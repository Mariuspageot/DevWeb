<?php
session_start();
$_SESSION=array();
session_destroy();
$data 			= array();
$data['success']=true;
$data['message'] = "Vous êtes bien déconnecté  !";
echo json_encode($data);


?>