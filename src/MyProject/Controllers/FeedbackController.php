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

    public function guestBookUpload()
    {
        $this->view->renderHTML('main/guestBookUpload.php');
    }

    public function guestBookUploadFile()
    {
        if(isset($_FILES['fileToUpload'])){
            $errors= array();
            $file_name = $_FILES['fileToUpload']['name'];
            $file_size =$_FILES['fileToUpload']['size'];
            $file_tmp =$_FILES['fileToUpload']['tmp_name'];
            $file_type=$_FILES['fileToUpload']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));

            $extensions=["inc",'txt'];

            if(in_array($file_ext,$extensions)=== false){
                $errors[]="extension not allowed";
            }

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,$file_name);
                echo "Success";
            }else{
                print_r($errors);
            }
        }
    }
}