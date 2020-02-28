<?php
namespace App\Controller;

use App\Model\Post;
use App\Framework\Controller;

class ControllerListPosts extends Controller
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index(){
        $titlesPosts = $this->post->getTitlesPosts();
        $this->generateView([
            'titlesPosts' => $titlesPosts
            ]);
    }

    public function delete(){
        $postId = $this->request->getParameter("id");
        // delete post
        $this->post->deletePost($postId);
        // actualisation de l'affichage
        $this->executeAction("index");
    }
}