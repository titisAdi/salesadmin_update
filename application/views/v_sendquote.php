<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Quotation Summary</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Quotation Summary
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
		<form role="form" action="<?php echo base_url()."index.php/SalesAdmin/qSendProcess/"?>" method="post">
			<div class="form-group">
		                                    <label>Select Customer : </label>
		                                    <input type="text" name="id" class="form-control" value="<?php echo $id_rev?>" readonly>
		                                    <input type="hidden" name="lead" class="form-control" value="<?php echo $id_lead?>">
		                            </div>
		                            <div class="form-group">
		                                <label>Follow up date : </label>
		                                <input type="date" class="form-control" id="datepick" name="fu_date" required="required" value="<?php echo $qdate?>">
		                            </div>

		                            <div class="form-group">
		                                <label>Remark</label>
		                                <textarea class="form-control" rows="3" name="remark" value="<?php echo $remark?>"></textarea>
		                            </div>
		                            <button type="submit" class="btn btn-default">Submit</button>

		</form>