<?php

require_once 'Requete.php';
require_once 'Vue.php';

abstract class Controleur 
{
    private $action;            // action à réaliser
    protected $requete;         // requete entrante

    // Définit la requete entrante
    public function setRequete(Requete $requete){
        $this->requete =$requete;
    }

    // Exécute l'action
    public function executerAction($action){
        if (method_exists($this, $action)){
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $classControleur = get_class($this);
            throw new Exception("Action $action non défini dans la classe $classControleur");
        }
    }

    // Méthode abstraite pour l'action par défaut -> doit être définie dans les controleurs enfants
    // Oblige les classes dérivées à implémenter cette action par défaut
    public abstract function index();

    // Genère la vue associée au contrôleur courant
    protected function genererVue($donneesVue = array()){
        // Déterminer le nom du fichier vue à partir du nom du controleur actuel
        $classControleur = get_class($this);
        $controleur = str_replace("Controleur", "", $classControleur);
        // instancie et génère la vue
        $vue = new Vue($this->action, $controleur);
        $vue->generer($donneesVue);
    }
}