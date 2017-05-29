<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Profile</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i>Edit Profile
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<div class="panel-heading">
		              <h3 class="panel-title"><?php echo $_SESSION['username']; ?></h3>
		            </div>
		            <div class="panel-body">
		            	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
		              <div class="row">
		                <div class="col-md-3 col-lg-3 " align="center"> 
		                	<img alt="User Pic" class="img-circle img-responsive profile" data-name="<?php echo $_SESSION['username']; ?>" class="profile" /> 
		                </div>
		                <div class=" col-md-9 col-lg-9 "> 
			                <table class="table table-user-information">
			                    <tbody>
			                      <tr>
			                        <td>Full Name : </td>
			                        <td><?php echo $namalengkap ?></td>
			                      </tr>
			                      <tr>
			                        <td>Level : </td>
			                        <td><?php echo $level ?></td>
			                      </tr>
			                      <tr>
			                        <td>Date Of Join</td>
			                        <td><?php echo $dateofjoin ?></td>
			                      </tr>
			                      <tr>
			                      	<td></td>
			                      	<td><a href="#" data-toggle="modal" data-target="#exampleModal" id="myBtn">Change Password</a></td>
			                      </tr>
			                    </tbody>
			                </table>
		                </div>
		        </div>

		        <!-- Modal -->
		        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      	<div class="modal-header">
					        <h2 class="modal-title" id="exampleModalLabel">Change Password</h2>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					    <div class="modal-body">
					      		<form role="form" method="post" action="<?php echo base_url()."index.php/Login/changePassword/"?>">
						      		<div class="form-group">
		                                <label>Current Password</label>
		                                <input class="form-control" name="curpassword" type="password">
		                            </div>

		                            <div class="form-group">
		                                <label>New Password </label>
		                                <input class="form-control" name="newpassword" type="password">
		                            </div>

		                            <div class="form-group">
		                                <label>Confirm New Password</label>
		                                <input class="form-control" name="confpassword" type="password">
		                            </div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Change Password</button>
						</div>
					      		</form>
					    </div>
					</div>
				</div>
<script>
    $('.profile').initial();
	$(document).ready(function(){
	    $("#myBtn").click(function(){
	        $("#myModal").modal();
	    });
	});
	$('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>