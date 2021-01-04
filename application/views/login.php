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
        body { background: #ffffff }

    </style>
</head>
<body>
    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
        </div>
        <div class="pageTitle text-white"></div>
        <div class="right">
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
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="https://mobilekit.bragherstudio.com/view8/assets/img/sample/photo/vector4.png" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>Get started</h1>
                <h4>Fill the form to log in</h4>
            </div>
            <div class="section mt-1 mb-5">
            	<?php
            	if($this->session->flashdata('sukses')){
            		?>
            		<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" style="text-align: left;">
            			<?= $this->session->flashdata('sukses'); ?>
            			<!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
            			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            				<span aria-hidden="true">&times;</span>
            			</button>
            		</div>
            		<?php
            	}
            	if($this->session->flashdata('logout')){
            		?>
            		<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="text-align: left;">
            			<?= $this->session->flashdata('logout'); ?>
            			<!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
            			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            				<span aria-hidden="true">&times;</span>
            			</button>
            		</div>
            		<?php
            	}
            	?>
                <form method="POST" action="<?= base_url('users/login') ?>">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required="">
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" name="password" class="form-control" id="password1" placeholder="Password" required="">
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <div>
                            <a href="<?= base_url('users/register') ?>">Register Now</a>
                        </div>
                        <!-- <div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div> -->
                    </div>

                    <div class="form-button-group">
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="login">
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    
    <!-- * App Sidebar -->

    <!-- welcome notification  -->
    
    <?php
    $this->session->set_flashdata('logout','');
    $this->session->set_flashdata('sukses','');
    ?>
    
    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
    <!-- Horizontal Ads -->
    <!-- <ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-9016802650667695"
    data-ad-slot="9675159011"
    data-ad-format="auto"
    data-full-width-responsive="true"></ins>
    <script>
       (adsbygoogle = window.adsbygoogle || []).push({});
   </script> -->
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
    <script>
		function goBack() {
			window.history.back();
		}
	</script>
</body>
</html>