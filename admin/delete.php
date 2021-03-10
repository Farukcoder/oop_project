<?php
require_once "../vendor/autoload.php";
$category = new \App\classes\Category();

// $categoris = $category->all_category();

    if(isset($_GET['category'])){
        $id = $_GET['id'];
        $category->delete($id);
        header('location:manage_category.php');
    }
?>