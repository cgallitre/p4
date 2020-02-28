<?php
namespace App\Model;

use DateTime;
use App\Framework\Model;

class Comment extends Model
{
    public function getComments($postId)
    {
        $sql = 'SELECT id as id, date as date, author as author, content as content from comments WHERE postId=?';
        $comments = $this->executeRequest($sql, [$postId]);
        return $comments;
    }

    public function addComment($author, $content, $postId){
        $sql = 'INSERT INTO comments (date, author, content, postId) values (?, ?, ?, ?)';
        $date = new DateTime('Europe/Paris');
        $date = $date->format('Y-m-d H:i:s');
        $this->executeRequest($sql, [
            $date,
            $author,
            $content,
            $postId
        ]);
    }

    public function getListComments()
    {
        $sql = 'SELECT comments.id, comments.date, comments.author, comments.content, comments.postId, posts.title FROM comments INNER JOIN posts ON posts.id = comments.postId ';
        $Comments = $this->executeRequest($sql);
        return $Comments;
    }

    public function deleteComment($commentId)
    {
        $sql= 'DELETE FROM comments WHERE id = ?';
        $commentDelete = $this->executeRequest($sql, [$commentId]);
        return $commentDelete;
    }
}
