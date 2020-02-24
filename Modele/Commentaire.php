<?php

require_once 'Framework/Modele.php';

class Commentaire extends Modele
{
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT COM_ID as id, COM_DATE as date,COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE WHERE BIL_ID=?';
        $commentaires = $this->executerRequete($sql, [$idBillet]);
        return $commentaires;
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet){
        $sql = 'INSERT INTO T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) values (?, ?, ?, ?)';
        $date=date(DATE_W3C);
        $this->executerRequete($sql, [
            $date,
            $auteur,
            $contenu,
            $idBillet
        ]);
    }
}
