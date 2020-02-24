<?php

require_once 'Requete.php';
require_once 'Framework/Vue.php';

class Routeur
{
    // Route une requête entrante et exécute l'action associée
    public function routerRequete(){   
        try {
            // on fusionne $_GET et $_POST dans un tableau associatif
            $requete = new Requete(array_merge($_GET, $_POST));

            $controleur = $this->creerControleur($requete);
            $action=$this->creerAction($requete);
            
            $controleur->executerAction($action);
        }
        catch (Exception $e)
        {
        $this->gererErreur($e);
        }
    }

    // Crée le controleur en fonction de la requête
    private function creerControleur(Requete $requete){
        $controleur='Accueil'; // valeur par défaut
        
        if ($requete->existeParametre('controleur')){
            $controleur = $requete->getParametre('controleur');
            // Permière lettre en majuscule
            $controleur = ucfirst(strtolower($controleur));
        }
        // création du nom du fichier du controleur
        $classeControleur = "Controleur" . $controleur;
        $fichierControleur = "Controleur" . DIRECTORY_SEPARATOR . $classeControleur . ".php";
        if (file_exists($fichierControleur)){
            // instanciation du controleur selon la requête
            require($fichierControleur);
            $controleur = new $classeControleur();
            $controleur->setRequete($requete);
            return $controleur;
        } else {
            throw new Exception("Fichier $fichierControleur introuvable");
        }
    }

    private function creerAction(Requete $requete){
        $action="index"; // action par défaut
        if ($requete->existeParametre('action')){
            $action = $requete->getParametre('action');
        }
        return $action;
    }

    private function gererErreur(Exception $exception){
        $vue = new Vue('Erreur');
        $vue->generer(['msgErreur' => $exception->getMessage()]);
    }

    private function getParametre($tableau, $nom){
        if (isset($tableau[$nom])){
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre $nom absent.");
        }
    }
}