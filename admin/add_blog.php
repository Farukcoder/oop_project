<?php

use App\classes\blog;

require_once "templete/head.php";
require_once "templete/header.php";
require_once "templete/leftmenu.php";
require_once "../vendor/autoload.php";

$blog = new  \App\classes\blog();
$category = new  \App\classes\Category();

$all_active_category= $category->all_active_category();
// $row = mysqli_fetch_assoc($all_active_category);
// print_r($row);
// exit();

if(isset($_POST['add_blog'])){
	$insert_msg = $blog->add_blog($_POST);
}
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
           <!-- OVERVIEW -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Add Blog</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-md-6">
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="panel">
									<?php
									if (isset($insert_msg)) {
									?>
										<div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<i class="fa fa-check-circle"></i><?= $insert_msg;?>
										</div>
									<?php
									}
									unset($insert_msg);
									?>
									<?php
									if (isset($insert_msg_err)) {
									?>
										<div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<i class="fa fa-check-circle"></i><?= $insert_msg_err;?>
										</div>
									<?php
									}
									unset($insert_msg_err);
									?>

									<div class="panel-body">
                                        <label for="category">Category Select</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option>select</option>
											<?php
												while($value=mysqli_fetch_assoc($all_active_category) ){
												?>
												 <option value="<?= $value['id'] ?>"><?= $value['category_name']; ?></option>
											<?php
												}
											?>
                                           
                                        </select>
                                        <br>

                                            <label for="photo">Photo</label>
                                            <input type="file" class="form-control" id="photo" name="photo" placeholder="title">

										<br>

                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="title" required>

                                        <br>
                                            <label for="content">Blog Content</label>
                                            <textarea class="form-control" placeholder="Blog content" name="content" rows="4" required></textarea>
                                        <br>
										<label class="from-control">Status</label>
										<label class="fancy-radio">
											<input name="status" value="1" type="radio">
											<span><i></i>Active</span>
										</label>
										<label class="fancy-radio">
											<input name="status" value="0" type="radio">
											<span><i></i>Inactive</span>
										</label>
										<br>
										<button type="submit" class="btn btn-primary" name="add_blog">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<script>
	setTimeout(function() {
		let alert = document.querySelector('.alert');
		alert.remove();
	}, 3000);
</script>
<?php
require_once "templete/foot.php";
require_once "templete/footer.php"
?>