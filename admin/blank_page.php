<?php
require_once "templete/head.php";
require_once "templete/header.php";
require_once "templete/leftmenu.php";
require_once "../vendor/autoload.php";

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
                        <!-- //content -->
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