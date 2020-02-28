<?php
namespace App\Controller;


use App\Model\Comment;
use App\Framework\Controller;

class ControllerListComments extends Controller
{
    private $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    public function index(){
        $comments = $this->comment->getListComments();
        $this->generateView([
            'comments' => $comments
            ]);
    }

    public function delete(){
        $commentId = $this->request->getParameter("id");
        // delete post
        $this->comment->deleteComment($commentId);
        // actualisation de l'affichage
        $this->executeAction("index");
    }
}