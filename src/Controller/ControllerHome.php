<?php
namespace App\Controller;

use App\Model\Post;
use App\Framework\Controller;


class ControllerHome extends Controller
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index(){
        $posts = $this->post->getPosts();
        $titlesPosts = $this->post->getTitlesPosts();
        $this->generateView([
            'posts' => $posts,
            'titlesPosts' => $titlesPosts
            ]);
    }
}