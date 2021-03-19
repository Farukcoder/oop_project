<?php
require_once 'header.php';
require_once 'vendor/autoload.php';

$category = new \App\classes\Category();
// $blog = new \App\classes\blog();

// $blog_post =  $blog->all_active_blog();

$categoris = $category->all_active_category();

$cat_id = $_GET['id'];
$cat_post = $category->cat_post($cat_id);

// $result = mysqli_fetch_assoc($cat_post);
// print_r($cat_post);
// exit;
?>
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
      </h1>

      <?php
      while($value= mysqli_fetch_assoc($cat_post)){
      ?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="admin/assets/img/blog/<?= $value['photo'] ?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?= $value['title']?></h2>
            <p class="card-text"><?= substr($value['content'],0,200) ?>...</p>
            <a href="post.php?id=<?= $value['id']?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?=$value['creat_time']?>
            <a href="#"><?= $value['name'] ?></a>
          </div>
        </div>
      <?php
      }
      ?>


      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>

    </div>

    <?php require_once 'widget.php' ?>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<?php
require_once 'footer.php';
?>