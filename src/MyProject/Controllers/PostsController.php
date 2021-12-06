<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidDataException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Posts\Post;
use MyProject\Models\Validators\FormValidator;

class PostsController extends AbstractController
{
    public function main()
    {
        $posts = Post::findAll();

        $this->view->renderHTML('main/posts.php', ['posts'=>$posts]);
    }



    public function blog(int $blogId)
    {

        // количество записей, выводимых на странице
        $per_page=3;
        // получаем номер страницы

        $page = $blogId;
        // вычисляем первый операнд для LIMIT
        $start=abs($page*$per_page);

        $limitedQuery = Post::limitedQuery($start, $per_page);

        $total_rows = Post::countEntries();
        // Определяем общее количество страниц
        $num_pages = ceil($total_rows/$per_page);


//        $posts = Post::findAll();
        $this->view->renderHTML('main/blog.php', [
            'posts'=>$limitedQuery,
            'num_pages'=>$num_pages,
            'page'=>$page
            ]);
    }
}