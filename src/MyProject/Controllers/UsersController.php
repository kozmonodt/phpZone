<?php

namespace MyProject\Controllers;


use MyProject\Exceptions\InvalidDataException;
use MyProject\Models\Users\User;
use MyProject\View\View;

class UsersController
{
    private $view;

    /**
     * @param $view
     */
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

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

        }
        $this->view->renderHTML('users/signUp.php');
    }

}