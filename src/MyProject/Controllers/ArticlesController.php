<?php

namespace MyProject\Controllers;

use JetBrains\PhpStorm\Pure;
use MyProject\Exceptions\NotFoundExeption;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\View\View;

class ArticlesController
{
private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__. '/../../../templates');
    }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

//        $reflector = new \ReflectionObject($article);
//        $properties = $reflector->getProperties();
//        $propertiesNames = [];
//        foreach ($properties as $property){
//            $propertiesNames[] = $property->getName();
//        }

        if($article === null)
        {
            throw new NotFoundExeption();
        }

        $this->view->renderHTML(
            'articles/view.php',[
                'article' => $article,
            ]
        );
    }

    public function edit(int $articleId) : void
    {
        $article = Article::getById($articleId);
        if($article === null){
            $this->view->renderHTML('errors/404.php',[],404);
        }

        $article->setName('New article name');
        $article->setText('New text!');

        $article->save();
    }

    public function add() :void
    {
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Very new name');
        $article->setText('Very new text');

        $article->save();

//        echo '<pre>';
//        var_dump($article);
//        echo '</pre>';
    }

}