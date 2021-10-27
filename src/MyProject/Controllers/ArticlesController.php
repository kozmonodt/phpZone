<?php

namespace MyProject\Controllers;

use JetBrains\PhpStorm\Pure;
use MyProject\Exceptions\NotFoundExeption;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\View\View;

class ArticlesController extends AbstractController
{

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
        if($this->user === null){
            throw new UnauthorizedException();
        }
        $this->view->renderHTML('articles/add.php');
       /* $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Very new name');
        $article->setText('Very new text');

        $article->save();*/

//        echo '<pre>';
//        var_dump($article);
//        echo '</pre>';
    }

}