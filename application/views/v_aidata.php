<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Add Inquiry Data</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Add Inquiry Data
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					 <form role="form" action="<?php echo base_url()."index.php/SalesAdmin/addaidata/"?>" method="post">
						<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 						
                            <div class="form-group" name="lead">
                                    <label>Select Customer : </label>
                                    <select class="form-control" name="lead">
                                        <?php foreach($data as $d){ ?>
                                        <option value="<?php echo $d['id_lead']?>"><?php echo $d['id_lead']?> || <?php echo $d['customer']?></option>
                                        <?php } ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label>PIC</label>
                                <input class="form-control" name="pic">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone">
                            </div>

                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" name="email" type="email">
                            </div>

                            <div class="form-group">
                                <label>Position</label>
                                <input class="form-control" name="position">
                            </div>
                            <div class="form-group">
                                <label>Via</label>
                                <input class="form-control" name="via">
                            </div>
							
							<div class="form-group">
                                <label>Remark</label>
                                <textarea class="form-control" rows="3" name="remark"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>
                           
				</div>
			</div>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>