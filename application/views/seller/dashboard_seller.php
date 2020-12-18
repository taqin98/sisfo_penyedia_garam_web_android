<?php
if ($this->session->userdata('level') == 2) {
	?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Mobilekit Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/icon/192x192.png">
    <link rel="preload" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:400,500,700&amp;display=swap" async>
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>" async>
    <!-- <link rel="stylesheet" href="https://res.cloudinary.com/taqin/raw/upload/v1586263241/assets/css/style_i2j0lr.css"> -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/helper.css') ?>" async>
    <!-- <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js" data-stencil-namespace="ionicons"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js" data-stencil-namespace="ionicons"></script> -->
    <!-- <link rel="manifest" href="/__manifest.json"> -->
    <style type="text/css">
        .p-5px{padding:5px}.card .card-body{padding:5px;line-height:1.4em}.bg-white{background:#fff}
        body.dark-mode-active .appHeader.scrolled.bg-primary.is-active {
            background: #16417f !important;
        }
        body.dark-mode-active .bg-primary {
            background: #16417f !important;
            color: #FFF;
        }
        body.dark-mode-active .profileBox {
            background: #16417f !important;
        }
        body.dark-mode-active .dark-mode-image {
            filter:invert(1);mix-blend-mode:screen
        }
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .profile-head {
        	display: flex;
        	align-items: center;
        }
        .profile-head .avatar {
        	margin-right: 16px;
        }

    </style>
</head>
<body>
    <!-- App Header -->
    <div class="appHeader bg-success scrolled is-active text-white">
    	<div class="left">
    		<a href="#" class="headerButton" hidden="" data-toggle="modal" data-target="#sidebarPanel">
    			<ion-icon name="menu-outline"></ion-icon>
    		</a>
    	</div>
    	<div class="pageTitle">
    		<!-- Rotib Al Hadad -->
    		GaramApp
    	</div>
    	<div class="right">
    		<a href="javascript:;" class="headerButton toggle-searchbox" hidden="">
    			<ion-icon name="search-outline"></ion-icon>
    		</a>
    	</div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->
    <div id="search" class="appHeader">
    	<form class="search-form" hidden="">
    		<div class="form-group searchbox">
    			<input type="text" class="form-control" placeholder="Search...">
    			<i class="input-icon">
    				<ion-icon name="search-outline"></ion-icon>
    			</i>
    			<a href="javascript:;" class="ml-1 close toggle-searchbox">
    				<ion-icon name="close-circle"></ion-icon>
    			</a>
    		</div>
    	</form>
    </div>
    <!-- * Search Component -->

    <!-- App Capsule --> <!-- Content -->
    <div id="appCapsule">
    	<?php $this->load->view('seller/dashboard_content'); ?>
        <div class="section mb-0 p-0">
            
            <!-- <div class="card p-0" id="cardContent">
                <div class="card-body main-content p-5px d-flex justify-content-between align-items-end" id="bodyContent">
                </div>
            </div> -->
        </div>
        <div id="toast-4" class="toast-box toast-top">
            <div class="in">
                <div class="text">
                    Auto closing in 2 seconds.
                </div>
            </div>
        </div>


        <!-- app footer -->

        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <div class="appBottomMenu bg-success">
    	<a href="?content=seller_detail&userid=<?= $this->session->userdata('user_id') ?>" class="item" id="__prevPage">
    		<div class="col">
    			<ion-icon name="person-circle-outline"></ion-icon>
    		</div>
    	</a>
    	<a href="?content=seller_list" class="item" id="__prevPage">
            <div class="col">
                <ion-icon name="list-outline"></ion-icon>
            </div>
        </a>
    	<a href="<?= base_url('users/dashboard_seller') ?>" class="item">
    		<div class="col">
    			<ion-icon name="map-outline"></ion-icon>
    		</div>
    	</a>
    	<a href="<?= base_url('users/logout') ?>" class="item" id="__nextPage">
    		<div class="col">
    			<ion-icon name="log-out-outline"></ion-icon>
    		</div>
    	</a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-body p-0">

    				<!-- profile box -->
    				<div class="profileBox">
    					<div class="image-wrapper">
    					</div>
    					<div class="in">
    						<strong>Julian Gruber</strong>
    						<div class="text-muted">
    							<ion-icon name="location"></ion-icon>
    							California
    						</div>
    					</div>
    					<a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
    						<ion-icon name="close"></ion-icon>
    					</a>
    				</div>
    				<ul class="listview image-listview flush transparent no-line">
    					<li>
    						<div class="item">
    							<div class="icon-box bg-primary">
    								<ion-icon name="moon-outline"></ion-icon>
    							</div>
    							<div class="in">
    								<div>Dark Mode</div>
    								<div class="custom-control custom-switch">
    									<input type="checkbox" class="custom-control-input dark-mode-switch"
    									id="darkmodesidebar">
    									<label class="custom-control-label" for="darkmodesidebar"></label>
    								</div>
    							</div>
    						</div>
    					</li>
    				</ul>
    			</div>

    			<!-- sidebar buttons -->
    			<div class="sidebar-buttons">
    				<a href="javascript:;" class="button">
    					<ion-icon name="person-outline"></ion-icon>
    				</a>
    				<a href="javascript:;" class="button">
    					<ion-icon name="archive-outline"></ion-icon>
    				</a>
    				<a href="javascript:;" class="button">
    					<ion-icon name="settings-outline"></ion-icon>
    				</a>
    				<a href="javascript:;" class="button">
    					<ion-icon name="log-out-outline"></ion-icon>
    				</a>
    			</div>
    			<!-- * sidebar buttons -->
    		</div>
    	</div>
    </div>
    <!-- * App Sidebar -->

    <!-- welcome notification  -->
    <div id="notification-welcome" class="notification-box">
        <div class="notification-dialog android-style">
            <div class="notification-header">
                <div class="in">
                    <img src="/assets/img/icon/72x72.png" alt="image" class="imaged w24">
                    <strong>Mobilekit</strong>
                    <span>just now</span>
                </div>
                <a href="#" class="close-button">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">Welcome to Mobilekit</h3>
                    <div class="text">
                        Mobilekit is a PWA ready Mobile UI Kit Template.
                        Great way to start your mobile websites and pwa projects.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * welcome notification -->
    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.5.1.min.js'); ?>"></script>
    <!-- Bootstrap-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- Ionicons -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.0.0/dist/ionicons/ionicons.esm.js" async></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@5.0.0/dist/ionicons/ionicons.js" async></script>
    <script type="text/javascript">
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