<?php
$userid = $_GET['userid'];
$query 	= $this->db->query('SELECT * from users join profile using(profile_id) join garam_stock where users.user_id="'.$userid.'"');
$data 	= $query->row();
$array['data'] = $data;
$sql = $this->db->get_where('garam_stock', array('user_id' => $userid));
$stokdata = $sql->result()[0];
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
		<div class="card mt-2">
			<div class="card-header">
				Profile
			</div>
			<div class="card-body">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3">Alamat</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->address ?></li>
				</ul>
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3">Nomor Hp</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->telepon ?></li>
				</ul>
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3">Email</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->email ?></li>
				</ul>
			</div>
		</div>
		<div class="card mt-2">
			<div class="card-header">
				Stok Persediaan Garam
			</div>
			<div class="card-body">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3">Stok</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $stokdata->stok ?> ton</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6 mb-4">
		<div class="card mt-2">
			<div class="card-header">
				Maps
			</div>
			<div id="googleMap" class="card-body" style="width:100%;height:450px;"></div>
			<div class="card-body">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3" id="lat">Latitude</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->lat ?></li>
				</ul>
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item col-3" id="long">Longtitude</li>
					<li class="list-group-item">:</li>
					<li class="list-group-item col-lg"><?= $data->lng ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>


<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA94aScWkfcSPZ-4BTEwLEN71k3UF60WdA&callback=initMap">
    </script>
<script type="text/javascript">
	var myLatLng = {lat: <?= $data->lat ?>, lng: <?= $data->lng ?>};
	var uluru = {lat: -6.681583, lng: 110.658920};
</script>
<script type="text/javascript">
	function initMap() {
		var propertiPeta = {
			center:new google.maps.LatLng(-6.681583, 110.658920),
			zoom:13,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

		var marker = new google.maps.Marker({
				position: myLatLng,
				map: peta
			});
		

	}



	// google.maps.event.addDomListener(window, 'load', initMap);
</script>