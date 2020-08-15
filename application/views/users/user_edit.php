<?php
$userid = $_GET['userid'];
$query 	= $this->db->query('SELECT * from users join profile using(profile_id) where users.user_id="'.$userid.'"');
$data 	= $query->row();
$array['data'] = $data;
// var_dump($data->username);
?>

<div class="appCapsule">
	<div class="section full mt-2 mb-2">
		<div class="section-title">Melengkapi Data Profile</div>
		<div class="wide-block pb-1 pt-2">

			<form method="POST" action="<?= base_url('users/user_update_detail'); ?>">
				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="name5">Nama Lengkap</label>
						<input type="hidden" name="userid" value="<?= $data->user_id  ?>">
						<input type="hidden" name="profileid" value="<?= $data->profile_id  ?>">
						<input type="text" class="form-control" id="name5" placeholder="Enter your name" name="fullname" required="" value="<?= $data->full_name ?>">
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>

				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="phone5">Hp/WA</label>
						<input type="tel" class="form-control" id="phone5" placeholder="Enter your phone number" name="hp" required="" value="<?= $data->telepon ?>">
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>

				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="address5">Address</label>
						<textarea id="address5" rows="2" class="form-control" name="alm" required=""><?= $data->telepon ?></textarea>
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>
				<div class="form-group boxed">
					<div class="input-wrapper">
						<input type="submit" name="" value="Update" class="btn btn-primary form-control">
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>