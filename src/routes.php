<?php
return [
    "/^hello\/(.*)$/" => [\MyProject\Controllers\MainController::class, 'sayHello'],
    "/^$/" => [\MyProject\Controllers\MainController::class, 'main'],
    "/^articles\/(\d+)$/" => [\MyProject\Controllers\ArticlesController::class, 'view'],
    "/^articles\/(\d+)\/edit$/" =>[\MyProject\Controllers\ArticlesController::class, 'edit'],
    "/^articles\/add$/" =>[\MyProject\Controllers\ArticlesController::class, 'add'],
    "/^users\/register$/" =>[\MyProject\Controllers\UsersController::class, 'signUp'],
    "/^users\/login$/" => [\MyProject\Controllers\UsersController::class, 'login'],

];