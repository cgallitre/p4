<?php

    function getBillets(){
        $bdd = getBdd();
        $billets = $bdd->query('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu FROM T_BILLET ORDER BY BIL_ID DESC'); 
        return $billets;
    }

    function getBdd(){
        $bdd = new PDO('mysql:host=localhost;dbname=php-mvc;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $bdd;
    }

    function getBillet($idBillet){
        $bdd = getBdd();
        $billet = $bdd->prepare('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET WHERE BIL_ID = ?');
        $billet->execute([$idBillet]);
        return $billet->fetch();
        }

    function getCommentaires($idBillet){
        $bdd = getBdd();
        $commentaires = $bdd->prepare('SELECT COM_ID as id, COM_DATE as date,COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE WHERE BIL_ID=?');
        $commentaires->execute([$idBillet]);
        return $commentaires;
        }