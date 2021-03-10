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
                <li><a <?= $page == 'index.php' ? 'class="active"' : '' ?> href="index.php"><i class="lnr lnr-home"></i>                    <span>Dashboard</span></a></li>

                <li>
                    <a class="<?= $page == 'add_category.php' ?'active' : 'collapsed' ?> <?= $page == 'manage_category.php' ?'active' : 'collapsed' ?>"  href="#subPages"
                       data-toggle="collapse" class="collapsed"><i class="lnr                        lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="<?= $page == 'add_category.php' ?'collapsed collapse in' : 'collapsed collapse' ?> <?= $page == 'manage_category.php' ?'collapsed collapse in' : 'collapsed collapse' ?>">
                        <ul class="nav">
                            <li ><a <?= $page == 'add_category.php' ? 'class="active"' : '' ?>  href="add_category.php"                                   class="">Add
                                    Category</a></li>
                            <li ><a <?= $page == 'manage_category.php' ? 'class="active"' : '' ?>
                                        href="manage_category.php" class="">Manage Category</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->