<?php


spl_autoload_register(function (string $className)
{
    require_once __DIR__ . '/../src/' . str_replace('\\','/', $className) . '.php';
});

$author = new MyProject\Models\Users\User('Loh');
$article = new MyProject\Models\Articles\Article('Bitch','Lorem ipsum',$author);
$controller = new \MyProject\Controllers\MainController();
/*
if(!empty($_GET['name'])) {
    $controller->sayHello($_GET['name']);
}  else {
    $controller -> main();
}
*/
$route = $_GET['route'] ?? '';
$pattern = "/^hello\/(.*)$/";
preg_match($pattern,$route,$matches);

if(!empty($matches)){
    $controller = new \MyProject\Controllers\MainController();
    $controller ->sayHello($matches[1]);
}

$pattern = "/^$/";
preg_match($pattern,$_GET['route'],$matches);

if(!empty($matches)){
    $controller =1;
}

echo '<pre>';
var_dump($matches);
echo '</pre>';
echo "Bitch nigga " . $article->getAuthor()->getName();