<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidDataException;
use MyProject\Models\Feedback\Feedback;

class FeedbackController extends  AbstractController
{
    public function guestBook()
    {
        $feedbacks = Feedback::getAll();
/*        echo '<pre>';
        var_dump($feedbacks);
        echo '</pre>';*/
        $this->view->renderHTML('main/guestBook.php',['feedbacks' => $feedbacks]);
    }

    public function newFeedback()
    {
        if(!empty($_POST)){
            try{
                $feedBack = Feedback::createFromArray($_POST);
//                    = Article::createFromArray($_POST, $this->user);
            }
            catch (InvalidDataException $e){
                $feedbacks = Feedback::getAll();
                $this->view->renderHTML('main/guestBook.php', ['error'=>$e->getMessage(),
                    'feedbacks' => $feedbacks,
                    ]);
                return;
            }
//            header('Location: /articles/' . $article->getId(),true,302);
//            exit;
        }
        $feedbacks = Feedback::getAll();
        $this->view->renderHTML('main/guestBook.php',['feedbacks' => $feedbacks]);
    }


}