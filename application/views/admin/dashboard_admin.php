<?php
if ($this->session->userdata('level') == 1) {
	?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css'); ?>"></link>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url(); ?>users/dashboard_admin">Dashboard Admin</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link text-white" href="?content=home">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Kelola Data User
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="?content=buyer_read">User Buyer (Umum)</a>
							<a class="dropdown-item" href="?content=seller_read">User Seller (Penyedia)</a>
						</div>
					</li>
				</ul>
				<div class="form-inline my-2 my-lg-0">
					<a href="<?= base_url(); ?>/users/logout" class="btn btn-outline-light btn-sm my-2 my-sm-0">Logout</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
			<?php if($this->session->flashdata('sukses')) echo $this->session->flashdata('sukses'); ?>
			. Anda login sebagai <?= $this->session->userdata('username'); ?>
			<!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>

	<div class="container">
		<?php $this->load->view('admin/dashboard_content'); $this->session->set_flashdata('sukses', '') ?>
	</div>

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.5.1.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.5.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
</body>
</html>
<?php
} else {
	?>
	Access Denied. 404<br>
	<button onclick="goBack()">Go Back</button>

	<script>
		function goBack() {
			window.history.back();
		}
	</script>
	<?php
}
?>