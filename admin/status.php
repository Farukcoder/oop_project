<?php
require_once "../vendor/autoload.php";
$category = new \App\classes\Category();
$blog = new \App\classes\blog();

if (isset($_GET['active']) && isset($_GET['category'])) {

	$id = $_GET['id'];
	$category->active($id);
    header('location:manage_category.php');
}
if (isset($_GET['inactive']) && isset($_GET['category'])) {

	$id = $_GET['id'];
	$category->inactive($id);
    header('location:manage_category.php');
}

if (isset($_GET['active']) && isset($_GET['blog'])) {

	$id = $_GET['id'];
	$blog->active($id);
    header('location:manage_blog.php');
}
if (isset($_GET['inactive']) && isset($_GET['blog'])) {

	$id = $_GET['id'];
	$blog->inactive($id);
    header('location:manage_blog.php');
}


?>