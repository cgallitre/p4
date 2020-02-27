<?php
namespace App\Controller;

use App\Model\Post;
use App\Model\Comment;
use App\Framework\Controller;

require_once '../src/Framework/Controller.php';
require_once '../src/Model/Post.php';
require_once '../src/Model/Comment.php';

class ControllerPost extends Controller
{
    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new post();
        $this->comment = new comment();
    }

    // Affiche les détails d'un post
    public function index(){
        $postId = $this->request->getParameter("id");

        $post=$this->post->getPost($postId);
        $titlesPosts = $this->post->getTitlesPosts();
        $comments=$this->comment->getComments($postId);
        
        $this->generateView([
            'post' => $post,
            'comments' =>$comments,
            'titlesPosts' => $titlesPosts
        ]);
    }

    public function comment(){
        $postId = $this->request->getParameter("id");
        $author = $this->request->getParameter("author");
        $content = $this->request->getParameter("content");
        // sauvegarde du comment
        $this->comment->addComment($author, $content, $postId);
        // actualisation de l'affichage
        $this->executeAction("index");
    }
}