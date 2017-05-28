<!DOCTYPE html>
<html>
<head>
	<title>Sales Admin | Dashboard</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>bootstrap/css/bootstrap.min.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>font-awesome/css/font-awesome.min.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>linearicons/style.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>chartist/css/chartist-custom.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>css/main.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>css/demo.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>css/material.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>css/stepperdemo.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>css/normalize.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>datatables/dataTables.bootstrap.css ?>" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>css/jquery.steps.css ?>" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()."assets/img/";?>building.png ?>">

</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?php echo base_url()."index.php/SalesAdmin/adminMasuk"; ?>"><img src="<?php echo base_url()."assets/img/";?>salesadmin.png ?>" alt="SalesAdmin Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img data-name="<?php echo $_SESSION['username']; ?>" id="profile" class="img-circle" alt="Avatar" width="40px" height="32px"/><span><?php echo $_SESSION['username']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url()."index.php/Login/profile/"?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="<?php echo base_url()."index.php/Login/logout/"?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<script src="<?php echo base_url()."assets/vendor/";?>jquery/jquery.min.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>jquery/jquery.steps.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>jquery/jquery.steps.min.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>jquery/initial.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>jquery/jquery.stepper.src.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>datatables/dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>datatables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>chartist/js/chartist.min.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url()."assets/scripts/";?>klorofil-common.js"></script>
		<script src="<?php echo base_url()."assets/vendor/";?>datatables/dataTables.bootstrap.js"></script>
		
		<script>
        $('#profile').initial(); 
    	</script>
    	
</body>
</html>