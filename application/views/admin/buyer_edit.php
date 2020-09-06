<style type="text/css">
	textarea.form-control {
		height: 125px;
	}
</style>
<?php
$userid = $_GET['userid'];
$query 	= $this->db->query('SELECT * from users join profile using(profile_id) where users.user_id="'.$userid.'"');
$data 	= $query->row();

$array['data'] = $data;
?>
<?php 
	if($this->session->flashdata('validation')){
		?>
		<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
			<?= $this->session->flashdata('validation'); ?>
			<!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Kelola Data User</li>
        <li class="breadcrumb-item active" aria-current="page">Form Edit Data Buyer (Umum)</li>
    </ol>
</nav>

<form method="POST" action="<?= base_url(); ?>users/buyer_update">
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="card mt-2">
				<div class="card-header">
					User Account
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="hidden" name="userid" class="form-control" value="<?= $data->user_id; ?>">
						<input type="hidden" name="profileid" class="form-control" value="<?= $data->profile_id; ?>">
						<input type="hidden" name="level" class="form-control" value="<?= $data->level; ?>">
						<input type="hidden" name="info" class="form-control" value="<?= $data->information; ?>">
						<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" required="" value="<?= $data->username; ?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat Email" required="" value="<?= $data->email; ?>">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="" value="<?= $data->password; ?>">
					</div>
					<div class="form-group">
						<label>Ulangi Password</label>
						<input type="password" name="password2" class="form-control" id="password2" placeholder="Ulangi" required="" value="<?= $data->password; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card mt-2">
				<div class="card-header">
					Profile
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Lengkap</label>
						<input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Nama Lengkap" required="" value="<?= $data->full_name; ?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">No. Hp/WA</label>
						<input type="text" class="form-control" id="exampleInputEmail1" name="hp" placeholder="No. Hp/WA" required="" value="<?= $data->telepon; ?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Alamat Lengkap</label>
						<textarea name="alm" class="form-control" placeholder="Alamat Lengkap" required=""><?= $data->address ?></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="submit" name="submit" value="Save" class="btn btn-primary form-control mt-3 mb-4">
</form>