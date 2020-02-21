<?php

    require 'Modele.php';

    try {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            if ($id != 0) {
                $billet = getBillet($id);
                $commentaires = getCommentaires($id);
                require 'vueBillet.php';
            } else {
                throw new Exception('Identifiant de billet incorrect.');
            }
        } else {
            throw new Exception('Aucun identifiant de billet.');
        }
    } 
    catch (Exception $e)
    {
        $msgErreur = $e->getMessage();
        require 'vueErreur.php';
    }
