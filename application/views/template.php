<!doctype html>
<html lang="en">

<head>
	<title>Restoran</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?=base_url()?>">RESTORAAAAN:)</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url() ?>assets/img/user.png" class="img-circle" alt="Avatar"> <span><?= $this->session->userdata('nama_pelanggan') ? $this->session->userdata('nama_pelanggan') : $this->session->userdata('nama_user') ; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('login/logout')?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<?php if ($this->session->userdata('level') == 0) { ?>
							<li><a href="<?= base_url(); ?>menu" class=""><i class="lnr lnr-dinner"></i> <span>Menu Pemesanan</span></a></li>						
						<?php } else if($this->session->userdata('level') == 1) { ?>
							<li><a href="<?= base_url(); ?>menu" class=""><i class="lnr lnr-dinner"></i> <span>Menu Pemesanan</span></a></li>
							<li><a href="<?= base_url(); ?>pelanggan" class=""><i class="lnr lnr-user"></i> <span>Pelanggan</span></a></li>
							<li><a href="<?= base_url(); ?>kategori" class=""><i class="lnr lnr-list"></i> <span>Kategori</span></a></li>
							<li><a href="<?= base_url(); ?>pembelian" class=""><i class="lnr lnr-list"></i> <span>Pembelian</span></a></li>	
						<?php } else if($this->session->userdata('level') == 2) { ?>
							<li><a href="<?= base_url(); ?>pembelian" class=""><i class="lnr lnr-list"></i> <span>Pembelian</span></a></li>
						<?php } ?>
						
					</ul>
				</nav>
			</div>
        </div>
        <!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">

                <?php $this->load->view( $content);?>
    
            </div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() ?>assets/scripts/klorofil-common.js"></script>
</body>

</html>
