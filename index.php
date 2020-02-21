<?php

require 'Controleur/Controleur.php';

    try {
        if (isset($_GET['action'])){
            if ($_GET['action'] == 'billet'){
                if (isset($_GET['id'])){
                    $billet = intval($_GET['id']);
                    if ($billet != 0){
                        billet($billet);
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
            accueil();
        }
    }
    catch (Exception $e)
    {
       erreur($e->getMessage()  . '<br>Fichier : ' . $e->getFile() . '<br>Ligne : ' . $e->getLine());
    }
