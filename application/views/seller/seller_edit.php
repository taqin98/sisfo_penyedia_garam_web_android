<?php
$userid = $_GET['userid'];
$query 	= $this->db->query('SELECT * from users join profile using(profile_id) where users.user_id="'.$userid.'"');
$data 	= $query->row();

$array['data'] = $data;

$sql = $this->db->get_where('garam_stock', array('user_id' => $userid));
$stokdata = $sql->result()[0];
// var_dump($data, $stokdata->stok);
?>

<div class="appCapsule">
	<form method="POST" action="<?= base_url('users/seller_update_detail'); ?>">
		<div class="section full mt-2 mb-2">
			<div class="section-title">User Account</div>
			<div class="wide-block pb-1 pt-2">
				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="name5">Email</label>
						<input type="hidden" name="userid" class="form-control" value="<?= $data->user_id; ?>">
						<input type="hidden" name="profileid" class="form-control" value="<?= $data->profile_id; ?>">
						<input type="hidden" name="level" class="form-control" value="<?= $data->level; ?>">
						<input type="hidden" name="info" class="form-control" value="<?= $data->information; ?>">
						<input type="text" class="form-control" id="name5" placeholder="Enter your name" name="email" required="" value="<?= $data->email ?>">
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>
				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="name5">Username</label>
						<input type="text" class="form-control" id="name5" placeholder="Enter your name" name="username" required="" value="<?= $data->username ?>">
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>
				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="name5">Passowrd</label>
						<input type="password" class="form-control" id="name5" placeholder="Enter your passowrd" name="password" required="" value="<?= $data->password ?>">
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>

			</div>
		</div>
		<div class="section full mt-2 mb-2">
			<div class="section-title">Melengkapi Data Profile</div>
			<div class="wide-block pb-1 pt-2">
				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="name5">Nama Lengkap</label>
						<!-- <input type="text" name="userid" value="<?= $data->user_id  ?>"> -->
						<!-- <input type="text" name="profileid" value="<?= $data->profile_id  ?>"> -->
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
						<textarea id="address5" rows="2" class="form-control" name="alm" required=""><?= $data->address ?></textarea>
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>
				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="name5">Jumlah Persediaan</label>
						<input type="text" class="form-control" id="name5" placeholder="Stok Persediaan" name="stok" required="" value="<?= $stokdata->stok ?>">
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>
				<div class="form-group boxed">
					<div class="input-wrapper">
						<div id="googleMap" class="card-body" style="width:100%;height:500px;"></div>
					</div>
				</div>
				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="name5">Latitude</label>
						<input type="text" class="form-control" id="lat" placeholder="Enter your lat" name="lat" required="" value="<?= $data->lat ?>">
						<i class="clear-input">
							<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
						</i>
					</div>
				</div>
				<div class="form-group boxed">
					<div class="input-wrapper">
						<label class="label" for="name5">Longtitude</label>
						<input type="text" class="form-control" id="lng" placeholder="Enter your lng" name="lng" required="" value="<?= $data->lng ?>">
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

			</div>
		</div>
	</form>
</div>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5PFwjCKMLJR-uSQ9Ijg8LLgBKteINOqE&callback=initMap"
type="text/javascript"></script>
<script type="text/javascript">
	var myLatLng = {lat: <?= $data->lat ?>, lng: <?= $data->lng ?>}, marker;
	function initMap() {
		var propertiPeta = {
			center:new google.maps.LatLng(-6.681583, 110.658920),
			zoom:13,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

		google.maps.event.addListener(peta, 'click', function(event) {
			taruhMarker(this, event.latLng);
		});

		marker = new google.maps.Marker({
				position: myLatLng,
				map: peta
			});

		
		

	}
	function taruhMarker(peta, posisiTitik){

		if(marker){
			marker.setPosition(posisiTitik);
		} else {
			marker = new google.maps.Marker({
				position: posisiTitik,
				map: peta
			});
		}

		document.getElementById("lat").value = posisiTitik.lat();
		document.getElementById("lng").value = posisiTitik.lng();
	}



	google.maps.event.addDomListener(window, 'load', initMap);
</script>