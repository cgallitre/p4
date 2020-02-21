<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Vue/Vue.php';

class Routeur
{
    private $ctrlAccueil;
    private $ctrlBillet;

    public function __construct(){
        $this->ctrlAccueil = new controleurAccueil();
        $this->ctrlBillet = new controleurBillet();
    }

    public function routerRequete(){
        try {
            if (isset($_GET['action'])){
                if ($_GET['action'] == 'billet'){
                    if (isset($_GET['id'])){
                        $billet = intval($_GET['id']);
                        if ($billet != 0){
                            $this->ctrlBillet->billet($billet);
                        } else {
                            throw new Exception("Identifiant de billet non valide");
                        }
                    } else {
                        throw new Exception("Aucun identifiant de billet fourni.");
                    }
                } else {
                    throw new Exception("Action non valide");
                }
            } else {
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e)
        {
        $this->erreur($e->getMessage()  . '<br>Fichier : ' . $e->getFile() . '<br>Ligne : ' . $e->getLine());
        }
    }

    private function erreur($msgErreur){
        $vue = new Vue('Erreur');
        $vue->generer(['msgErreur' => $msgErreur]);
    }
}