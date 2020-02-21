<?php
Class Vue
{
    private $fichier;   // nom du fichier associé à la vue
    private $titre;     // titre de la vue (défini dans le fichier vue)

    public function __construct($action)
    {
        $this->fichier = "Vue/vue" . $action . ".php";
    }

    public function generer($donnees)
    {
        $contenu=$this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('Vue/gabarit.php',[
            'titre' => $this->titre,
            'contenu' => $contenu
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
}