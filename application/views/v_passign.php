<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Partner Asignment Form</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Partner Asignment
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo base_url()."index.php/SalesAdmin/passign_process/"?>">
						<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
							<div class="form-group" name="lead">
									<label>Lead ID / Customer : </label>
									<select class="form-control" name="lead">
                                    <?php foreach($data as $patner){ ?>
                                        <option value="<?php echo $patner['id_lead']?>"><?php echo $patner['id_lead']?> || <?php echo $patner['customer']?></option>
                                    <?php } ?>
									</select>
							</div>
							<div class="form-group">
									<label>Assignment Date : </label>
									<input type="date" class="form-control" id="datepick" name="fu_date" required="required">
							</div>
							<div class="form-group">
								<label>Assign To: </label>
                                <select class="form-control" name="partner">
                                    <?php foreach($assign as $as){ ?>
                                        <option value="<?php echo $as['supp_code']?>"><?php echo $as['supp_code']?> || <?php echo $as['suppname']?></option>
                                    <?php } ?>
                                </select>
							</div>
							
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
				</div>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>