<?php
    // Données
    require 'Modele.php';

    $billets = getBillets();
    
    // Affichage
    require 'vueAccueil.php';           