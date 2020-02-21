<?php

require 'Modele.php';

function accueil(){
    $billets = getBillets();
    require 'vueAccueil.php';       
}

function erreur($msgErreur){
    require 'vueErreur.php';
}

function billet($idBillet){
    $billet = getBillet($idBillet);
    $commentaires = getCommentaires($idBillet);
    require 'vueBillet.php';
}