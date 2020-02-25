<?php

require_once 'Framework/Modele.php';

class Commentaire extends Modele
{
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT id as id, date as date,author as auteur, content as contenu from comments WHERE postId=?';
        $commentaires = $this->executeRequest($sql, [$idBillet]);
        return $commentaires;
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet){
        $sql = 'INSERT INTO comments (date, author, content, postId) values (?, ?, ?, ?)';
        $date=date(DATE_W3C);
        $this->executeRequest($sql, [
            $date,
            $auteur,
            $contenu,
            $idBillet
        ]);
    }
}
