<?php
require __DIR__ . '/../src/MyProject/Models/Articles/Article.php';
require __DIR__ . '/../src/MyProject/Models/Users/User.php';


echo __DIR__;

$author = new User('Loh');
$article = new Article('Bitch','Lorem ipsum',$author);

echo '<pre>';
var_dump($article);
echo '</pre>';
echo "Bitch nigga" . $article->getAuthor()->getName();