<?php
namespace App\Model;

use App\Framework\Model;

require_once '../src/Framework/Model.php';

class Comment extends Model
{
    public function getComments($idPost)
    {
        $sql = 'SELECT id as id, date as date, author as author, content as content from comments WHERE postId=?';
        $comments = $this->executeRequest($sql, [$idPost]);
        return $comments;
    }

    public function addComment($author, $content, $idPost){
        $sql = 'INSERT INTO comments (date, author, content, postId) values (?, ?, ?, ?)';
        $date=date(DATE_W3C);
        $this->executeRequest($sql, [
            $date,
            $author,
            $content,
            $idPost
        ]);
    }
}
