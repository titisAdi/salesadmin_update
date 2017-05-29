<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sales Admin | Login</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/vendor/"?>login/css/style.css">
	<link href="<?php echo base_url()."assets/vendor/";?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()."assets/vendor/";?>login/css/style.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()."assets/img/";?>building.png ?>">

</head>


<body>
	<div class="wrapper">
	<form class="login" action="<?php echo base_url()."index.php/login/process_login"; ?>" method="POST">
		<p class="admin"><b>Sales</b>Admin</p>
		<hr>
		<p class="title">Log in</p>
		<h6 align="center"><?php echo $err_message;?></h6>
		<input type="text" placeholder="Username" name="username" id="username" autofocus required autocomplete="off" />
		<i class="fa fa-user"></i>
		<input type="password" placeholder="Password" name="password" id="password" required autocomplete="off" />
		<i class="fa fa-key"></i>
		<button>
			<i class="spinner"></i>
			<span class="state">Log in</span>

		</button>
		<a href="<?php echo base_url()."index.php/Login/signup"; ?>">Register a new User</a>
	</form>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="<?php echo base_url()."assets/vendor"?>login/js/index.js"></script>
	<script src="<?php echo base_url()."assets/vendor"?>prefixfree-gh-pages/prefixfree.min.js"></script>
</body>
</html>
