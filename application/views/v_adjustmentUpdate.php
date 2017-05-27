<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Adjustment Progress Form</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li>
	                                <i class="fa fa-edit"></i> Adjustment Progress
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Adjustment Progress Form
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo base_url()."index.php/SalesAdmin/adjusmentUpdate/"?>">
				        <div class="form-group">
				            <label for="recipient-name" class="form-control-label">ID Lead</label>
				            <input type="text" class="form-control" name="id_lead" id="id_lead" value="<?php echo $id_lead ?>"  readonly>
				        </div>
				        <div class="form-group">
				            <label for="recipient-name" class="form-control-label">Customer</label>
				            <input type="text" class="form-control" name="customer" id="customer" value="<?php echo $customer ?>"  readonly>
				        </div>
				         <table class="table table-hover">
				            <thead>
				                <th style="width:15%">Current %</th>
				                <th>Adjustment</th>
				            </thead>
				            <tr>
				                <td><?php echo $total=$iq+$fu+$pre+$pro+$poc+$adj ?></td>
				                <td>
				                    <div class="input-group col-md-3">
				                    <input type="text" class="form-control" name="adjustment" maxlength="3" value="">
				                    <input type="hidden" class="form-control" name="total" maxlength="3" value="<?php echo $total=$iq+$fu+$pre+$pro+$poc+$adj ?>">
				                    <input type="hidden" class="form-control" name="adj" maxlength="3" value="<?php echo $adj ?>">
				                    <span class="input-group-addon">%</span>
				                    </div>
				                </td>
				            </tr>
				        </table>
				       <div class="col-md-12">
				            <div class="col-lg-12">
				                    <h3>Remark</small></h3>
				                    <textarea id="remark" name="remark" rows="10" cols="80" maxlength="200">
				                    </textarea>
				            </div>
				            </div>
				            <div class="col-md-12">
				            <div class="col-lg-12">
				                  <br>
				                    <button type="submit" class="btn btn-default">Update</button>
				            </div>
				            </div>
				    </form>