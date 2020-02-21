<?php
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';


function accueil(){
    $billets = new Billet;
    $billets = $billets->getBillets();
    require 'Vue/vueAccueil.php';
}

function erreur($msgErreur){
    require 'vue/vueErreur.php';
}

function billet($idBillet){
    $billet= new billet();
    $commentaire = new Commentaire();

    $billet = $billet->getBillet($idBillet);
    $commentaires = $commentaire->getCommentaires($idBillet);
    require 'Vue/vueBillet.php';
}