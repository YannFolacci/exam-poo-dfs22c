<?php

namespace Controllers;

use Core\View;
use Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::all();

        new View('Posts/index', compact("posts"));
    }

    public function show($request, $id)
    {
        $post = Post::getById($id);
        new View('Posts/show', compact("post")); 
    }

    public function create($request)
    {
        new View('Posts/create', []);
    }
    public function processCreate($request)
    {
        $body = $request->getBody();
        Post::create($body['titre'], $body['texte']);
        // new View('Posts/index', []);
    }

    public function modify($request, $id){
        $post = Post::getById($id);
        new View('Posts/modify', compact("post"));
    }
    public function processModify($request, $id){
        $body = $request->getBody();
        Post::modify($id, $body['title'], $body['content']);
    }
    public function delete($request, $id){
        Post::delete($id);
    }

}
