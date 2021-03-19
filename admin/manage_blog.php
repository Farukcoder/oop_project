<?php
require_once "templete/head.php";
require_once "templete/header.php";
require_once "templete/leftmenu.php";
require_once "../vendor/autoload.php";

$blog = new \App\classes\blog();

$all_blog = $blog->all_blog();

// $data = mysqli_fetch_assoc($categoris);

// if (isset($_GET['active'])) {

// 	$id = $_GET['active'];
// 	$category->active($id);
// }
// if (isset($_GET['inactive'])) {

// 	$id = $_GET['inactive'];
// 	$category->inactive($id);
// }


?>
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Manage Blog</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered" id="table_id">
						<thead>
							<tr>
								<th>SL</th>
								<th>Category Name</th>
								<th>Title</th>
								<th>Photo</th>
								<th>Content</th>
								<th>Status</th>
								<th style="width: 250px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($all_blog as $value) {
							?>
								<tr>
									<td><?= $i++; ?></td>
									<td><?= $value['category_name'] ?></td>
									<td><?= $value['title'] ?></td>
									<td>
										<img src="assets/img/blog/<?= $value['photo'] ?>" alt="" height=50px" width="50px">
									</td>
									<td><?= substr($value['content'],0,100) ?>...</td>
									<td>
										<?php
										if ($value['status'] == 1) {
										?>
											<a class="btn btn-danger" href="status.php?id=<?= $value['id']; ?>&blog=blog&inactive=inactive">Inactive</a>
										<?php
										} else {
										?>
											<a class="btn btn-success" href="status.php?id=<?= $value['id']; ?>&blog=blog&active=active">Active</a>
										<?php
										}
										?>
									</td>
									<td>
										<!-- <a href="edit_blog.php?id=<?= $value['id'] ?>"><button class="btn btn-warning">View</button></a> -->

										<a href="edit_blog.php?id=<?= $value['id'] ?>"><button class="btn btn-info">Edit</button></a>

										<a href="delete.php?id=<?= $value['id'] ?>&blog=blog&filename=<?=$value['photo']?>"><button class="btn
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