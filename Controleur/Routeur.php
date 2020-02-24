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
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet !=0){
                        $this->ctrlBillet->billet($idBillet);
                    }
                    else {
                        throw new Exception("Action non valide");
                    }
                    
                } elseif ($_GET['action']== 'commenter'){
                    $auteur=$this->getParametre($_POST,'auteur');
                    $contenu=$this->getParametre($_POST,'contenu');
                    $idBillet=$this->getParametre($_POST,'id');
                    $this->ctrlBillet->commenter($auteur,$contenu,$idBillet);
                } else {
                    throw new Exception ("Action non valide");
                }
            } else { // aucune action définie, on affiche la pge d'accueil
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

    private function getParametre($tableau, $nom){
        if (isset($tableau[$nom])){
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre $nom absent.");
        }
    }
}