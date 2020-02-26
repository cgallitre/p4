<?php

require_once 'Framework/Controller.php';
require_once 'Model/Post.php';

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