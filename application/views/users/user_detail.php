<?php
$userid = $_GET['userid'];
$query 	= $this->db->query('SELECT * from users join profile using(profile_id) where users.user_id="'.$userid.'"');
$data 	= $query->row();
$array['data'] = $data;

// var_dump($data);
if ($data == NULL) {
	?>
	<div class="alert alert-info alert-dismissible fade show" role="alert">
		Silahkan lengkapi data profile anda.
		<a href="?content=user_edit&userid=<?= $userid ?>">Klik Disini</a>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<?php
	$sql 		= $this->db->get_where('users', array('user_id' => $userid));
	$getData 	= $sql->result()[0];
	// var_dump($getData);
	?>

	<div class="card p-0" id="cardContent">
		<div class="card-body" id="bodyContent">
			<div class="section mt-2">
				<div class="profile-head">
					<div class="avatar">
						<img src="https://mobilekit.bragherstudio.com/view7/assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
					</div>
					<div class="in">
						<h3 class="name"><?= $getData->username ?></h3>
						<h5 class="subtext"><?= $getData->email ?></h5>
					</div>
				</div>
			</div>

		</div>
	</div>
	<?php
} else {
	?>
	<div class="card p-0" id="cardContent">
		<div class="card-body" id="bodyContent">
			<div class="section mt-2">
				<div class="profile-head">
					<div class="avatar">
						<img src="https://mobilekit.bragherstudio.com/view7/assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
					</div>
					<div class="in">
						<h3 class="name"><?= $data->username ?></h3>
						<h5 class="subtext"><?= $data->full_name ?></h5>
					</div>
				</div>
			</div>
			<div class="section mt-1 mb-2">
				<ul class="listview image-listview">
					<li>
						<div class="item">
							<span class="iconedbox">
								<ion-icon name="call"></ion-icon>
							</span>
							<div class="in ml-3">
								<div>Hp/WhatsApp</div>
							</div>
						</div>
					</li>
					<li>
						<div class="item">
							<span class="iconedbox" style="color: white">
								<ion-icon name="compass"></ion-icon>
							</span>
							<div class="in ml-3">
								<?= $data->telepon ?>
							</div>
						</div>
					</li>
					<li>
						<div class="item">
							<span class="iconedbox">
								<ion-icon name="compass"></ion-icon>
							</span>
							<div class="in ml-3">
								<div>Alamat</div>
							</div>
						</div>
					</li>
					<li>
						<div class="item">
							<span class="iconedbox" style="color: white">
								<ion-icon name="compass"></ion-icon>
							</span>
							<div class="in ml-3">
								<?= $data->address ?>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php
}
?>

