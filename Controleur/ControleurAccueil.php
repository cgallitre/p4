<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Billet.php';

class ControleurAccueil extends Controleur
{
    private $billet;

    public function __construct()
    {
        $this->billet = new Billet();
    }

    public function index(){
        $billets = $this->billet->getBillets();
        $this->genererVue(['billets' => $billets]);
    }

}