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