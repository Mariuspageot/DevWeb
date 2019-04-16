<?php
require_once '../Config.php';
$login=filter_input(INPUT_POST, "login");
$pwd=filter_input(INPUT_POST, "pwd");

$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select Login, Password from employees where Login = :login and Password = :pwd");
$r->bindParam(":login",$login);
$r->bindParam(":pwd",$pwd);
$r->execute();

$lignes = $r->fetchAll();



if (isset($_POST['login']) && isset($_POST['pwd'])) {


    if ($r -> rowCount()==1) {



        session_start ();

        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pwd'] = $_POST['pwd'];


        header ('location: ../vue/Bijoux.php');
    }
    else {

        echo '<body onLoad="alert(\'Membre non reconnu...\')">';

        echo '<meta http-equiv="refresh" content="0;URL=index.htm">';
    }
}
else {
    echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>