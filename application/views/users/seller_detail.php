<?php
$userid = $_GET['userid'];
$query 	= $this->db->query('SELECT * from users join profile using(profile_id) where users.user_id="'.$userid.'"');
$data 	= $query->row();
$array['data'] = $data;

$sql = $this->db->get_where('garam_stock', array('user_id' => $userid));
$stokdata = $sql->result()[0];

?>

<div class="card p-0" id="cardContent">
	<div class="card-body" id="bodyContent">
		<div class="section mt-2">
			<div class="profile-head">
				<div class="avatar">
					<img src="https://mobilekit.bragherstudio.com/view7/assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
				</div>
				<div class="in">
					<h3 class="name"><?= $data->full_name ?></h3>
					<h5 class="subtext">Penyedia Garam</h5>
				</div>
			</div>
		</div>
		<!-- <div class="section mt-1 mb-2">
            <div class="profile-info">
                <div class=" bio">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa.
                </div>
                <div class="link">
                    <a href="#">Paris</a>,
                    <a href="#">France</a>
                </div>
            </div>
        </div> -->
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
        		<li>
        			<div class="item">
        				<span class="iconedbox">
        					<ion-icon name="location"></ion-icon>
        				</span>
        				<div class="in ml-3">
        					<div>Lokasi</div>
        				</div>
        			</div>
        		</li>
        		<li>
        			<div class="item">
        				<span class="iconedbox" style="color: white">
        					<ion-icon name="compass"></ion-icon>
        				</span>
        				<div class="in ml-3">
        					<div>Latitude</div>
        					<?= $data->lat ?>
        				</div>
        			</div>
        		</li>
        		<li>
        			<div class="item">
        				<span class="iconedbox" style="color: white">
        					<ion-icon name="compass"></ion-icon>
        				</span>
        				<div class="in ml-3">
        					<div>Longtitude</div>
        					<?= $data->lng ?>
        				</div>
        			</div>
        		</li>
        		<li>
        			<div class="item">
        				<span class="iconedbox">
        					<ion-icon name="basket"></ion-icon>
        				</span>
        				<div class="in ml-3">
        					<div>Jumlah Persediaan</div>
        					<span class="badge badge-primary"><?= $stokdata->stok ?> Ton</span>
        				</div>
        			</div>
        		</li>
        	</ul>
        </div>
        <div class="section mb-2">
        	<a href="https://wa.me/<?= $data->telepon ?>" class="btn btn-primary col"><ion-icon name="send"></ion-icon> Send</a>
        </div>
	</div>
</div>

