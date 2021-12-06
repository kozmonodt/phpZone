<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Feedback\Feedback;
use MyProject\Models\Interests\Interests;
use MyProject\Models\Just_Data\InterestsData;
use MyProject\Models\Just_Data\Photo_Album_Data;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Services\Db;
use MyProject\View\View;
class MainController extends AbstractController
{

    public function main()
    {
        $this->view->renderHTML('main/main.php');
    }

    public function about()
    {
        $this->view->renderHTML('main/about.php');
    }

    public function interests()
    {
//        $interests = Interests::findAll();
        $interestsObj = new InterestsData();
        $interests = $interestsObj->getInterests();

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

    public function test()
    {
        $this->view->renderHTML('main/test.php');
    }

    public function testShit()
    {
        $this->view->renderHTML('main/testShit.php');
    }

}