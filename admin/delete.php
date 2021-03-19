<?php
require_once "../vendor/autoload.php";
$category = new \App\classes\Category();
$blog = new \App\classes\blog();

// $categoris = $category->all_category();

// category delete
    if(isset($_GET['category'])){
        $id = $_GET['id'];
        $category->delete($id);
        header('location:manage_category.php');
    }

// blog delete
    if(isset($_GET['blog'])){
        $id = $_GET['id'];
        $blog->delete($id);
        $file = $_GET['filename'];
        unlink('assets/img/blog/'.$file);
        header('location:manage_blog.php');
    }

?>