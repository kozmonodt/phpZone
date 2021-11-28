<?php
    try{
        spl_autoload_register(function (string $className)
        {
            //echo __DIR__ . '/../src/' . str_replace('\\','/', $className) . '.php' . '<br>';
            require_once __DIR__ . '/../src/' . str_replace('\\','/', $className) . '.php';
        });

        $route = $_GET['route'] ?? '';
        $routes = require_once __DIR__ . '/../src/routes.php';

//        echo  $_GET['route'];

        $foundRoute = false;
        foreach ($routes as $pattern => $controllerAndAction){
            preg_match($pattern,$route,$matches);
            if(!empty($matches)){
                $foundRoute = true;
                break;
            }
        }

        if(!$foundRoute){
            throw new \MyProject\Exceptions\NotFoundExeption();
        }
        unset($matches[0]);


        $controllerName = $controllerAndAction[0];
        $actionName = $controllerAndAction[1];

        $controller = new $controllerName();
        $controller->$actionName(...$matches);
    }
    catch (\MyProject\Exceptions\DbException $e){
        $view = new \MyProject\View\View(__DIR__ . '/../templates');
        $view->renderHTML('errors/500.php',['error'=>$e->getMessage()]);
    }
    catch (\MyProject\Exceptions\NotFoundExeption $e){
        $view = new \MyProject\View\View(__DIR__ . '/../templates');
        $view->renderHTML('errors/404.php',[],404);
    }
    catch (\MyProject\Exceptions\UnauthorizedException $e){
        $view = new \MyProject\View\View(__DIR__ . '/../templates');
        $view->renderHTML('errors/401.php',['error'=>$e->getMessage()],401);

}





/*
echo '<pre>';
var_dump($matches);
echo '</pre>';
*/