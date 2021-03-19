<?php
require_once 'header.php';

require_once 'vendor/autoload.php';
$blog = new \App\classes\blog();

$blog_post =  $blog->all_active_blog();
// print_r($blog_post);
// exit;
$get_id = $_GET['id'];

$single_post = $blog->single_post($get_id);
$row = mysqli_fetch_assoc($single_post);
// print_r($row);
?>
<!-- Blog Post -->
<div class="col-sm-12">

    <div class="card col-sm-6">
        <img class="card-img-top" src="admin/assets/img/blog/<?= $row['photo'] ?>" alt="Card image cap" width="200px" height="200px">
        <div class="card-body">
            <h2 class="card-title"><?= $row['title'] ?></h2>
            <p class="card-text"><?= $row['content'] ?></p>

        </div>
        <div class="card-footer text-muted">
            Posted on <?= $row['creat_time'] ?>
            <a href="#"><?= $row['name'] ?></a>
        </div>
    </div>

</div>