<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Lead Product Change</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li>
	                                <i class="fa fa-edit"></i> Product Option
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Lead Product Change
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					 <form role="form" method="post" action="<?php echo base_url()."index.php/SalesAdmin/leadChangeUpdate/"?>">
					 	
	                    <div class="form-group">
	                      <label for="recipient-name" class="form-control-label">ID Lead</label>
	                      <input type="text" class="form-control" name="id_lead" id="id_lead" value="<?php echo $id_lead ?>"  readonly>
	                    </div>
	                    <div class="form-group">
	                      <label for="recipient-name" class="form-control-label">Customer</label>
	                      <input type="text" class="form-control" name="customer" id="customer" value="<?php echo $customer ?>"  readonly>
	                    </div>
	                    <div class="form-group">
	                      <label for="recipient-name" class="form-control-label">Product</label>
	                      <input type="text" class="form-control" name="productcode" id="productcode" value="<?php echo $productcode ?>" >
	                    </div>
	                    <div class="form-group">
	                      <label for="recipient-name" class="form-control-label">Description</label>
	                      <input type="text" class="form-control" name="productname" id="productname" value="<?php echo $productname ?>" >
	                    </div>
	                    <div class="form-group">
	                      <label for="recipient-name" class="form-control-label">Price</label>
	                      <input type="text" class="form-control" name="lead_sales" id="lead_sales" value="<?php echo $lead_sales ?>" >
	                    </div>
	                    <div class="modal-footer">
	                    <button type="submit" class="btn btn-default">Submit</button>
	                  </div>
	                </form>