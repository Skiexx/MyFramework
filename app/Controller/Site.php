<?php

namespace Controller;

use Src\View;
use Model\Post;

class Site
{
    public function index(): string
    {
        $posts = Post::all();
        return new View('site.posts', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
}
