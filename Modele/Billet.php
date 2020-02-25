<?php

require_once 'Framework/Modele.php';

class Billet extends Modele
{
    public function getBillets()
    {
        $sql = 'SELECT id as id, date as date, title as titre, content as contenu FROM posts ORDER BY id DESC';
        $billets = $this->executeRequest($sql);
        return $billets;
    }

    public function getBillet($idBillet)
    {
        $sql = 'SELECT id as id, date as date, title as titre, content as contenu FROM posts WHERE id = ?';
        $billet = $this->executeRequest($sql, [$idBillet]);
        if ($billet->rowCount() == 1){
            return $billet->fetch();
        } else {
            throw new Exception("Aucun billet ne correspondant à l'identifiant $idBillet");
        }
    }
}