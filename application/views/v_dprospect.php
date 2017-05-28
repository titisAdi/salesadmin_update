<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Drop Prospect</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Drop Prospect
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<form role="form" name="drop_update" action="<?php echo base_url()."/index.php/SalesAdmin/drop_update/"?>" method="post">
						<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
							<div class="form-group">
									<label>Lead ID / Customer : </label>
									<select class="form-control" name="lead">
                                    <?php foreach($data as $patner){ ?>
                                        <option value="<?php echo $patner['id_lead']?>"><?php echo $patner['id_lead']?> || <?php echo $patner['customer']?></option>
                                    <?php } ?>
									</select>
							</div>
							<div class="form-group">
									<label>Action Date : </label>
									<input type="date" class="form-control" id="datepick" name="fu_date" required="required">
							</div>
							<div class="form-group">
								<label>Select Status :</label>
									<select class="form-control" name="status">
										<option value="" placeholder="-Select Data-" required="required">-Select Data-</option>
										<option value="drop" placeholder="-Select Data-" required="required">Drop</option>
										<option value="aktif" placeholder="-Select Data-" required="required">Aktif</option>						
									</select>
							</div>
							<div class="col-md-12">
				            <div class="col-lg-12">
				                    <label>Reason</label>
                                <textarea id="remark" name="comment" rows="10" cols="80" maxlength="200">
				                    </textarea>
				            </div>
				            </div>
							<div>
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</form>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>