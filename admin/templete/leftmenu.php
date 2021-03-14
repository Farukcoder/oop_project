<?php
$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);
// echo $page;
// exit();

?>
<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a <?= $page == 'index.php' ? 'class="active"' : '' ?> href="index.php"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

                <li>
                    <a class="<?= $page == 'add_category.php' ? 'active' : 'collapsed' ?> <?= $page == 'manage_category.php' ? 'active' : 'collapsed' ?>" href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr                        lnr lnr-inbox"></i> <span>Category</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="<?= $page == 'add_category.php' ? 'collapsed collapse in' : 'collapsed collapse' ?> <?= $page == 'manage_category.php' ? 'collapsed collapse in' : 'collapsed collapse' ?>">
                        <ul class="nav">
                            <li><a <?= $page == 'add_category.php' ? 'class="active"' : '' ?> href="add_category.php" class="">Add Category</a></li>
                            <li><a <?= $page == 'manage_category.php' ? 'class="active"' : '' ?> href="manage_category.php" class="">Manage Category</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="<?= $page == 'add_blog.php' ? 'active' : 'collapsed' ?> <?= $page == 'manage_blog.php' ? 'active' : 'collapsed' ?>" href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-map"></i> <span>Blog</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages1" class="<?= $page == 'add_blog.php' ? 'collapsed collapse in' : 'collapsed collapse' ?> <?= $page == 'manage_blog.php' ? 'collapsed collapse in' : 'collapsed collapse' ?>">
                        <ul class="nav">
                            <li><a <?= $page == 'add_blog.php' ? 'class="active"' : '' ?> href="add_blog.php" class="">Add Blog</a></li>
                            <li><a <?= $page == 'manage_blog.php' ? 'class="active"' : '' ?> href="manage_blog.php" class="">Manage Blog</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
                    <!-- END LEFT SIDEBAR -->