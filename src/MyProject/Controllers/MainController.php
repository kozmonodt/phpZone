<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Services\Db;
use MyProject\View\View;
class MainController extends AbstractController
{

    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHTML('main/main.php', ['articles'=>$articles]);

    }

    public function sayHello(string $name)
    {

        $this->view->renderHTML('main/hello.php',['name' => $name]);
    }
}