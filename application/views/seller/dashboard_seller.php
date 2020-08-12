<?php
if ($this->session->userdata('level') == 2) {
	?>

<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<style>
		/* Set the size of the div element that contains the map */
		#map {
			height: 400px;  /* The height is 400 pixels */
			width: 100%;  /* The width is the width of the web page */
		}
	</style>
</head>
<body>
	<?php
	if($this->session->flashdata('sukses')) {
		echo $this->session->flashdata('sukses');
	}

	echo '<br>' . $this->session->userdata('username');
	echo '<br>' . $this->session->userdata('id_login');
	?>
	<a href="<?php echo base_url(); ?>/users/logout">Logout</a>
	<h3>My Google Maps Demo</h3>
	<!--The div element for the map -->
	<div id="map"></div>
	<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -6.6767248, lng: 110.631418};
  // The map, centered at Uluru
  var map = new google.maps.Map(
  	document.getElementById('map'), {zoom: 13, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
-->
<script defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA94aScWkfcSPZ-4BTEwLEN71k3UF60WdA&callback=initMap">
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