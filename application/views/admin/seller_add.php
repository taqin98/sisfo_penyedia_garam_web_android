<style type="text/css">
	textarea.form-control {
		height: 106px;
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

<form method="POST" action="<?= base_url(); ?>users/seller_add">
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
		<div class="col-md-6">
			<div class="card mt-2">
				<div class="card-header">
					Maps
				</div>
				<div id="googleMap" class="card-body" style="width:100%;height:500px;"></div>
			</div>
			<div class="card mt-2">
				<div class="card-body">
					<div class="form-group">
						<label>Latitude</label>
						<input type="text" name="lat" id="lat" class="form-control" placeholder="Latitude" required="">
					</div>
					<div class="form-group">
						<label>Longtitude</label>
						<input type="text" name="lng" id="lng" class="form-control" placeholder="Longtitude" required="">
					</div>
					<div class="form-group">
						<label>Stok Garam</label>
						<input type="text" name="stok" id="lng" class="form-control" placeholder="Jumlah Stok" required="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="submit" name="submit" value="Save" class="form-control btn btn-primary mt-2 mb-4">
</form>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5PFwjCKMLJR-uSQ9Ijg8LLgBKteINOqE&callback=initMap"
type="text/javascript"></script>
<script type="text/javascript">
	var peta;
	function initMap() {
		var propertiPeta = {
			center:new google.maps.LatLng(-6.681583, 110.658920),
			zoom:13,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

		google.maps.event.addListener(peta, 'click', function(event) {
			taruhMarker(this, event.latLng);
		});
		

	}
	var marker;
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