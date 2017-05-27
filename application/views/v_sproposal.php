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
                                    <select class="form-control" name="id">
                                        <?php foreach($data as $d){ ?>
                                        <option value="<?php echo $d['idproposal'].$d['rev'].$d['id_lead'] ?>"><?php echo $d['idproposal'].$d['rev']?> || <?php echo $d['customer']?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Follow up date : </label>
                                <input type="date" class="form-control" id="datepick" name="fu_date" required="required">
                            </div>

                            <div class="form-group">
                                <label>Remark</label>
                                <textarea class="form-control" rows="3" name="remark"></textarea>
                            </div>
                            <div>
                            	<button type="submit" class="btn btn-default">Submit</button>
                            </div>

                        </form>
