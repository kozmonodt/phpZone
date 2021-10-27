<?php

namespace MyProject\Controllers;


use MyProject\Exceptions\InvalidDataException;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use MyProject\View\View;

class UsersController extends AbstractController
{


    public function signUp()
    {
        if(!empty($_POST))
        {
            try{
                $user = User::signUp($_POST);
            }
            catch (InvalidDataException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }

            if($user instanceof User){
                echo 'yasss';
                $this->view->renderHTML('users/signUpSuccessful.php');
                mail('kozmonodt@gmail.com', 'loh', 'pidr','From: aiall98640@gmail.com');
                return;
            }

        }
        $this->view->renderHTML('users/signUp.php');
    }

    public function login()
    {
        if(!empty($_POST)){
            try {
                $user = User::login($_POST);
                $token = UsersAuthService::createToken($user);
                header('Location: /');
                exit();

            }
            catch (InvalidDataException $e) {
                $this->view->renderHTML('users/login.php',[
                    'error'=>$e->getMessage()
                ]);
                return;
            }
        }
        $this->view->renderHTML('users/login.php');


    }

}