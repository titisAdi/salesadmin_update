<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Manual Inquiry</h3>
					<p class="panel-subtitle">
						<ol class="breadcrumb">
		                    <li>
		                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
		                    </li>
		                    <li class="active">
		                        <i class="fa fa-edit"></i> Manual Inquiry
		                    </li>
		                </ol>
	                </p>
				</div>
				<div class="panel-body">
				<form role="form" method="post" action="<?php echo base_url()."index.php/SalesAdmin/manualinq/"?>">
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" name="fname">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" name="lname">
                            </div>

                            <div class="form-group">
                                <label>Company</label>
                                <input class="form-control" name="company">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Position in Company</label>
                                <input class="form-control" name="pos">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" name="city">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							<div class="form-group">
                                <label>Zip Code</label>
                                <input class="form-control" name="zip">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Fax</label>
                                <input class="form-control" name="fax">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>

							<div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>

							<div class="form-group">
                                <label>Number Employee</label>
                                <input class="form-control" name="employee">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" rows="3" name="message"></textarea>
                            </div>
							
                            <button type="submit" class="btn btn-default">Submit</button>

                        </form>

				</div>
			</div>