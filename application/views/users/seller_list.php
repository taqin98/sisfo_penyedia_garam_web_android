<?php
$userid = $_GET['userid'];
$query 	= $this->db->query('SELECT * from users join profile using(profile_id) where users.level=2');
$data 	= $query->result();

?>


<?php foreach ($data as $key): ?>
<div class="section mt-2">
	<div class="card">
		<div class="card-body m-1">
			<div class="row">
				<div class="col">
					<h6 class="card-subtitle">
						<ion-icon name="location-outline"></ion-icon>
						<?= $key->address ?>
					</h6>
					<p><strong><?= $key->full_name ?></strong></p>
				</div>
				<div class="col-3">
					<a href="?content=seller_detail&userid=<?= $key->user_id ?>" class="btn btn-primary col">Detail</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>