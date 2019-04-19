<?php
require_once '../Config.php';
$login=filter_input(INPUT_POST, "login");
$pwd=filter_input(INPUT_POST, "pwd");

$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);


$r = $db->prepare("select Login, Password, IDMetier, NomE, PrenomE from employees where Login = :login and Password = :pwd");
$r->bindParam(":login",$login);
$r->bindParam(":pwd",$pwd);
$r->execute();

$lignes = $r -> fetch();

$rr = $db->prepare("select ID, NomMetier from metier");
$rr->execute();

$metiers = $rr->fetchAll();

foreach ($metiers as $metier) {
    if ($metier["ID"] == $lignes["IDMetier"]) {
        $MU = $metier["NomMetier"];
    }
}




if (isset($_POST['login']) && isset($_POST['pwd'])) {


    if ($r -> rowCount()==1) {



        session_start ();

            $_SESSION['login'] = $login;
            $_SESSION['NomE'] = $lignes["NomE"];
            $_SESSION['PrenomE'] = $lignes['PrenomE'];
            $_SESSION['Metier'] = $MU;
            $_SESSION['IDMetier'] = $lignes["IDMetier"];


        header ('location: ../vue/Bijoux.php');
    }
    else {

        echo '<body onLoad="alert(\'Membre non reconnu...\')">';

        echo '<meta http-equiv="refresh" content="0;URL=../vue/login.php">';
    }
}
else {
    echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>