<style type="text/css">
	textarea.form-control {
		height: 125px;
	}
</style>
<?php
$row  = $this->db->query('SELECT max(user_id) as maxSEL FROM users');
$users = $row->result();
$kodeSEL = $users[0]->maxSEL;

$noUrut = (int) substr($kodeSEL, 3, 3);
$noUrut++;
$char = "USR";
$RM = $char . sprintf("%1s", $noUrut);


$query = $this->db->query('SELECT max(profile_id) as maxPRO FROM users');
$result = $query->result();
$kodePRO = $result[0]->maxPRO;

$noPRO = (int) substr($kodePRO, 3, 3);
$noPRO++;
$charPRO = "PRO";
$profile_id = $charPRO . sprintf("%1s", $noPRO);

// var_dump($RM, $profile_id);
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

<form method="POST" action="<?= base_url(); ?>users/buyer_add">
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="card mt-2">
				<div class="card-header">
					User Account
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="hidden" name="userid" class="form-control" value="<?= $RM; ?>">
						<input type="hidden" name="profileid" class="form-control" value="<?= $profile_id; ?>">
						<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" required="">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat Email" required="">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
					</div>
					<div class="form-group">
						<label>Ulangi Password</label>
						<input type="password" name="password2" class="form-control" id="password2" placeholder="Ulangi" required="">
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
						<input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Nama Lengkap" required="">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">No. Hp/WA</label>
						<input type="text" class="form-control" id="exampleInputEmail1" name="hp" placeholder="No. Hp/WA" required="">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Alamat Lengkap</label>
						<textarea name="alm" class="form-control" placeholder="Alamat Lengkap" required=""></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="submit" name="submit" value="Save" class="btn btn-primary form-control mt-3 mb-4">
</form>