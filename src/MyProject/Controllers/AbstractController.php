<?php

namespace MyProject\Controllers;

use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use MyProject\View\View;
use MyProject\Controllers\HostsController;


class AbstractController
{
    protected $user;
    protected $view;

    public function __construct()
    {
//       выключал
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->view->setVar('user', $this->user);
        HostsController::saveStatistics();

    }

    public function unsetUser()
    {
        if(isset($this->user))
        {
            unset($this->user);
        }
    }
}