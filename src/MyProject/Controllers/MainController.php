<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Interests\Interests;
use MyProject\Models\Just_Data\Photo_Album_Data;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Services\Db;
use MyProject\View\View;
class MainController extends AbstractController
{

    public function main()
    {
/*        $articles = Article::findAll();
        $this->view->renderHTML('main/main.php', ['articles'=>$articles]);*/
        $this->view->renderHTML('main/main.php');

    }

    public function about()
    {
        $this->view->renderHTML('main/about.php');
    }

    public function interests()
    {
        $interests = Interests::findAll();
        $this->view->renderHTML('main/interests.php', ['interests'=>$interests]);
    }

    public function photo()
    {
        $titles = Photo_Album_Data::getTitles();
        $sources = Photo_Album_Data::getSources();
        $this->view->renderHTML('main/photo.php',[
            'titles' => $titles,
            'sources'=> $sources
        ]);
    }

    public function contact()
    {
        $this->view->renderHTML('main/contact.php');
    }
}