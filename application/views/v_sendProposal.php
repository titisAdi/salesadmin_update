<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Proposal Send Form</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
		                            <li>
		                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
		                            </li>
		                            <li class="active">
		                                <i class="fa fa-edit"></i> Proposal Send
		                            </li>
		                        </ol>
	                    </p>
				</div>
				<div class="panel-body">
				
					 <form role="form" action="<?php echo base_url()."index.php/SalesAdmin/sendProposal"; ?>" method="post">
												
                            <div class="form-group" name="lead">
                                    <label>Select Customer : </label>
		                                    <input type="text" name="id" class="form-control" value="<?php echo $idproposal.$rev?> || <?php echo $customer?>" readonly>
		                                    <input type="hidden" name="lead" class="form-control" value="<?php echo $id_lead?>">
                            </div>
                            <div class="form-group">
		                                <label>Follow up date : </label>
		                                <input type="date" class="form-control" id="datepick" name="fu_date" required="required" value="<?php echo $date?>">
		                            </div>

		                            <div class="form-group">
		                                <label>Remark</label>
		                                <textarea class="form-control" rows="10" name="remark" value="<?php $term?>"></textarea>
		                            </div>
                            <div>
                            	<button type="submit" class="btn btn-default">Submit</button>
                            </div>

                        </form>
