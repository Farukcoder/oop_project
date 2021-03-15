<?php
require_once "templete/head.php";
require_once "templete/header.php";
require_once "templete/leftmenu.php";
require_once "../vendor/autoload.php";

$category = new \App\classes\Category();

$categoris = $category->all_category();

// $data = mysqli_fetch_assoc($categoris);

if (isset($_GET['active'])) {

	$id = $_GET['active'];
	$category->active($id);
}
if (isset($_GET['inactive'])) {

	$id = $_GET['inactive'];
	$category->inactive($id);
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
					<h3 class="panel-title">Manage Category</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered" id="table_id">
						<thead>
							<tr>
								<th>SL</th>
								<th>Category Name</th>
								<th>Status</th>
								<th style="width: 250px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($categoris as $value) {
							?>
								<tr>
									<td><?= $i++; ?></td>
									<td><?= $value['category_name'] ?></td>
									<td><?= $value['status']==1 ? 'Active':'Inactive';?></td>
									<td>
										<?php
										if ($value['status'] == 1) {
										?>
											<a class="btn btn-danger" href="?inactive=<?= $value['id']; ?>">Inactive</a>
										<?php
										} else {
										?>
											<a class="btn btn-success" href="?active=<?= $value['id']; ?>">Active</a>
										<?php
										}
										?>
										<button class="btn btn-success">Edit</button>
										<a href="delete.php?id=<?= $value['id']?>&
										cat = cat"><button class="btn
										btn-danger">Delete</button></a>
									</td>
								</tr>
							<?php
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
			<!-- END OVERVIEW -->
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php
require_once "templete/foot.php";
require_once "templete/footer.php"
?>
<script>
	$(document).ready(function() {
		$('#table_id').DataTable();
	});
</script>