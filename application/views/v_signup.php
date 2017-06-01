<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sales Admin | Sign Up </title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url()."assets/vendor/";?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link href="<?php echo base_url()."assets/vendor/";?>login/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>login/css/magic-check.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()."assets/img/";?>building.png ?>">
</head>
<body>
	<div class="wrapper">
	<form class="login" action="<?php echo base_url()."index.php/Login/addUser";?>" method="POST">
		<p class="admin"><b>Sales</b>Admin</p>
		<hr>
		<p class="title">Sign Up</p>
		<h6 align="center"><?php echo $err_message;?></h6>
		<input type="text" placeholder="Name" name="name" autofocus required/>
		<i class="fa fa-user"></i>
		<input type="text" placeholder="Username" name="username" required />
		<i class="fa fa-user"></i>
		<input type="text" placeholder="Address" name="address" required />
		<i class="fa fa-globe"></i>
		<input type="email" placeholder="Email" name="email" required />
		<i class="fa fa-envelope"></i>
		<input type="text" placeholder="Phone" name="phone" required />
		<i class="fa fa-phone"></i>
		<input type="password" placeholder="Password" name="password" id="pass" required />
		<i class="fa fa-key"></i>
		<button>
			<i class="spinner"></i>
			<span class="state">Sign Up</span>
		</button>
	</form>
	</div>
	<script src="<?php echo base_url()."assets/vendor"?>jquery/jquery.min.js"></script>
	<script src="<?php echo base_url()."assets/vendor"?>jquery/jquery.js"></script>
	<script src="<?php echo base_url()."assets/vendor"?>login/js/index.js"></script>
	<script src="<?php echo base_url()."assets/vendor"?>prefixfree-gh-pages/prefixfree.min.js"></script>
</body>
</html>