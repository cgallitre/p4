<?php

require_once 'Framework/Configuration.php';

Class Vue
{
    private $fichier;   // nom du fichier associé à la vue
    private $titre;     // titre de la vue (défini dans le fichier vue)

    public function __construct($action, $controleur="")
    {
        $fichier="Vue" . DIRECTORY_SEPARATOR;
        if ($controleur !=""){
            $fichier = $fichier . $controleur . DIRECTORY_SEPARATOR;
        }
        $this->fichier = $fichier . $action . ".php";
    }

    public function generer($donnees)
    {
        $contenu=$this->genererFichier($this->fichier, $donnees);
        $racineWeb = Configuration::get("racineWeb","/");
        $vue = $this->genererFichier('Vue/gabarit.php',[
            'titre' => $this->titre,
            'contenu' => $contenu,
            'racineWeb' => $racineWeb
        ]);
        echo $vue;
    }

    private  function genererFichier($fichier, $donnees)
    {
        if(file_exists($fichier)){
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        } else {
        throw new Exception("Fichier $fichier introuvable");
        }
    } 

    private function nettoyer($valeur)
    {
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }
}