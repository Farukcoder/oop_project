<?php
require_once "templete/head.php";
require_once "templete/header.php";
require_once "templete/leftmenu.php";
require_once "../vendor/autoload.php";

$category = new \App\classes\Category();
$id = $_GET['id'];
$result= $category->select_row($id);

$row= mysqli_fetch_assoc($result);

if (isset($_POST['update_category'])) {
	$update_msg = $category->update_category($_POST);
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
									if (isset($update_msg)) {
									?>
										<div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<i class="fa fa-check-circle"></i><?= $update_msg;?>
										</div>
									<?php
									}
									?>
									<?php unset($update_msg);?>
									<?php
										if(isset($update_msg_errr)){
											?>
											<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<i class="fa fa-check-circle"></i><?= $update_msg_errr;?>
										</div>
											<?php
										}
									?>
									<?php unset($update_msg_errr);?>

									<div class="panel-body">
										<label class="from-control">Category Name</label>
                                        <input type="hidden" name="id" value="<?= $row['id'];?>"> 
										<input type="text" class="form-control" name="category_name" placeholder="Category name" required value="<?= $row['category_name'];?>">

										<br>
										<label class="from-control">Status</label>
										<label class="fancy-radio">
											<input name="status" type="radio" value="1" <?= $row['status']=='1' ? 'checked':'';?>>
											<span><i></i>Active</span>
										</label>
										<label class="fancy-radio">
											<input name="status" type="radio" value="0" <?= $row['status']=='0' ? 'checked':'';?> >
											<span><i></i>Inactive</span>
										</label>
										<br>
										<button type="submit" class="btn btn-primary" name="update_category">Update</button>
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