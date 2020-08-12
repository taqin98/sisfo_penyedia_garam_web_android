<?php
$userid = $_GET['userid'];
$query 	= $this->db->query('SELECT * from users join profile using(profile_id) where users.user_id="'.$userid.'"');
$data 	= $query->row();
$array['data'] = $data;
?>
<div class="row mt-2">
	<div class="col-md-6">
		<div class="card mt-2">
			<div class="card-header">
				User Account
			</div>
			<div class="card-body">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3">Email</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->email ?></li>
				</ul>
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3">Username</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->username ?></li>
				</ul>
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3">Password</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->password ?></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6 mb-4">
		<div class="card mt-2">
			<div class="card-header">
				Profile
			</div>
			<div class="card-body">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-4">Nama Lengkap</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->full_name ?></li>
				</ul>
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-4">Nomor Hp</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->telepon ?></li>
				</ul>
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-4">Alamat</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->address ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>