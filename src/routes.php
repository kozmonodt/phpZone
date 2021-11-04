<?php
return [
    "/^$/" => [\MyProject\Controllers\MainController::class, 'main'],
    "/^articles\/(\d+)$/" => [\MyProject\Controllers\ArticlesController::class, 'view'],
    "/^articles\/(\d+)\/edit$/" =>[\MyProject\Controllers\ArticlesController::class, 'edit'],
    "/^articles\/add$/" =>[\MyProject\Controllers\ArticlesController::class, 'add'],
    "/^users\/register$/" =>[\MyProject\Controllers\UsersController::class, 'signUp'],
    "/^users\/login$/" => [\MyProject\Controllers\UsersController::class, 'login'],
    "/^users\/logout$/" => [\MyProject\Controllers\UsersController::class, 'logout'],
    /* NEW Routes for labs */
    "/^about$/" => [\MyProject\Controllers\MainController::class,'about'],
    "/^interests$/"=>[\MyProject\Controllers\MainController::class,'interests'],
    //"/^ $/"
    "/^test$/"=>[\MyProject\Controllers\MainController::class,'test'],
    "/^photo$/"=>[\MyProject\Controllers\MainController::class, 'photo'],
    "/^contact$/" =>[\MyProject\Controllers\MainController::class, 'contact'],
    "/^contact\/validate$/" => [\MyProject\Controllers\FormController::class, 'validateForm'],
];