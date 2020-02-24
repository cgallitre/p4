<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet
{
    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    public function billet($idBillet){
        $billet=$this->billet->getBillet($idBillet);
        $commentaires=$this->commentaire->getCommentaires($idBillet);
        $vue = new Vue('Billet');
        $vue->generer([
            'billet' => $billet,
            'commentaires' =>$commentaires
        ]);
    }

    public function commenter($auteur, $contenu, $idBillet){
        // sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // actualisation de l'affichage
        $this->billet($idBillet);
    }
}