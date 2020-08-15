<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 0px;">
	Anda login sebagai <?= $this->session->userdata('username') ?>. Status : User Penyedia Garam
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div id="map" style="height: 550px; width: 100%;"></div>

<script>
    	var uluru = {lat: -6.6767248, lng: 110.631418};
    	function initMap() {
    		var propertiPeta = {
    			center:new google.maps.LatLng(-6.681583, 110.658920),
    			zoom:13,
    			mapTypeId:google.maps.MapTypeId.ROADMAP
    		};

    		var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);
    		var infowindow = new google.maps.InfoWindow(), marker, i;

    		<?php
    		$sql 	= $this->db->query('SELECT * from users join profile using(profile_id) join garam_stock using(user_id)');
    		$query 	= $sql->result();
    		for ($i=0; $i < count($query); $i++) { 
    			?>
    			console.log('<?= $query[$i]->lat ?>');
    			var marker = new google.maps.Marker({
    				position: {lat: <?= $query[$i]->lat ?>, lng: <?= $query[$i]->lng ?>},
    				map: peta
    			});

    			google.maps.event.addListener(marker, 'click', (function(marker, i) {
    				return function() {
    					infowindow.setContent('Name : <strong><?= $query[$i]->full_name ?></strong><br>' +
    						'Alamat : <?= $query[$i]->address ?><br' +
    						'Persediaan : <?= $query[$i]->stok ?> ton<br>' +
    						'<a href="?content=seller_detail&userid=<?= $query[$i]->user_id ?>" class="btn btn-primary btn-sm mt-3 form-control">Detail</a>');
    					infowindow.open(map, marker);
    				}
    			})(marker, i));
    			<?php
    		}
    		?>

    	}

    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA94aScWkfcSPZ-4BTEwLEN71k3UF60WdA&callback=initMap">
	</script>