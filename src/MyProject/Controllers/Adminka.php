<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidDataException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Hosts\Host;
use MyProject\Models\Posts\Post;
use MyProject\Models\Validators\FormValidator;

class Adminka extends AbstractController
{

    protected function authenticate()
    {
        if($this->user === null or !$this->user->isAdmin()){
            throw new UnauthorizedException();
        }
    }

    public function showAdminkaMain()
    {
        $this->authenticate();
        $this->view->renderHTML('admin/adminMain.php');
    }

    /**/
    public function posts()
    {
        $this->authenticate();
        $posts = Post::findAll();

        $this->view->renderHTML('admin/posts.php', ['posts'=>$posts]);
    }
    public function addPosts() :void
    {
        if(!empty($_POST)){
            try{
                $validator =new FormValidator( ['name'], ['name' => ['isNotEmpty']]);
                $validator->validate($_POST);


                $post = Post::createFromArray($_POST);
            }
            catch (InvalidDataException $e){
                $posts = Post::findAll();
                $this->view->renderHTML('admin/posts.php', ['posts'=>$posts, 'error'=>$e->getMessage()]);
                return;
            }
            header('Location: /posts' ,true,302);
            exit;
        }

        $this->view->renderHTML('admin/posts.php');
    }

    /**/

    public function guestBookUpload()
    {
        $this->authenticate();
        $this->view->renderHTML('admin/guestBookUpload.php');
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

    /**/

    public function showStat(int $statId)
    {
        $this->authenticate();
        // количество записей, выводимых на странице
        $per_page=3;

        $page = $statId;

        $start=abs($page*$per_page);
        $limitedQuery = Host::limitedQuery($start, $per_page);
        $total_rows = Host::countEntries();
        $num_pages = ceil($total_rows/$per_page);


        $this->view->renderHTML('admin/statistics.php', [
            'statistics'=>$limitedQuery,
            'num_pages'=>$num_pages,
            'page'=>$page
        ]);
    }
}