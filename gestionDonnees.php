<?php
/**
 * Created by PhpStorm.
 * User: Marius PAGEOT
 * Date: 13/03/2019
 * Time: 16:47
 */

include 'Conteneurs/conteneurEmployees';
include 'Conteneurs/maBD.php';

class gestionDonnees
{
    private $tousLesEmployers;
    private $maBD;

    public function __construct()
    {
        $this->tousLesEmployers = new conteneurEmployees();
        $this->maBD = new maBD();
        $this->chargeLesEmployers();
    }

}
private function chargeLesEmployers()
{
    $resultat=$this->maBD->chargement('employees');
    $nb=0;
    while ($nb<sizeof($resultat))
    {
        //instanciation du club et ajout de celui-ci dans la collection
        $this->tousLesEmployers->ajouteUnEmployees($resultat[$nb][1],$resultat[$nb][2],$resultat[$nb][3],$resultat[$nb][34,$resultat[$nb][5],$resultat[$nb][6]);
        $nb++;
    }
}