<?php
require_once "templete/head.php";
require_once "templete/header.php";
require_once "templete/leftmenu.php";
require_once "../vendor/autoload.php";

$category = new \App\classes\Category();

if (isset($_POST['add_category'])) {
	$insert_msg = $category->add_category($_POST);
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
					<h3 class="panel-title">Add Category</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-md-6">
							<form action="" method="POST">
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
										<label class="from-control">Category Name</label>
										<input type="text" class="form-control" name="category_name" placeholder="Category name" required>

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
										<button type="submit" class="btn btn-primary" name="add_category">Submit</button>
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