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
		<input type="text" placeholder="Name" name="name" autofocus required/>
		<i class="fa fa-user"></i>
		<input type="text" placeholder="Username" name="username" required />
		<i class="fa fa-user"></i>
		<input type="password" placeholder="Password" name="password" id="pass" required />
		<i class="fa fa-key"></i>
		<span id="passstrength"></span>
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
<script>

$(document).ready(function() {



    $('#pass').keyup(function(e) {

        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");

        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");

        var enoughRegex = new RegExp("(?=.{6,}).*", "g");

        if (false === enoughRegex.test($(this).val())) {

            $('#passstrength').addClass( "label label-important" );

            $('#passstrength').html('Lemah Sekali');

            

        } else if (strongRegex.test($(this).val())) {            

           

            $('#passstrength').addClass( "label label-success" );

            $('#passstrength').html('Wow!');

        } else if (mediumRegex.test($(this).val())) {

          

            $('#passstrength').addClass( "label label-warning" );

            $('#passstrength').html('Lumayan!');

        } else {

           

            $('#passstrength').addClass( "label label-important" );

            $('#passstrength').html('Lemah!');

        }

        return true;

    });
});

</script>
</html>