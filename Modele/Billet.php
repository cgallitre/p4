<?php

require_once 'Modele/Modele.php';

class Billet extends Modele
{
    public function getBillets()
    {
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu FROM T_BILLET ORDER BY BIL_ID DESC';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    public function getBillet($idBillet)
    {
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET WHERE BIL_ID = ?';
        $billet = $this->executerRequete($sql, [$idBillet]);
        if ($billet->rowCount() == 1){
            return $billet->fetch();
        } else {
            throw new Exception("Aucun billet ne correspondant à l'identifiant $idBillet");
        }
    }
}