<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Manual Lead</h3>
					<p class="panel-subtitle">
						<ol class="breadcrumb">
		                    <li>
		                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
		                    </li>
		                    <li class="active">
		                        <i class="fa fa-edit"></i> Manual Lead
		                    </li>
		                </ol>
	                </p>
				</div>
				<div class="panel-body">
				 <form role="form" method="post" action="<?php echo base_url()."index.php/SalesAdmin/manualLead/"?>">
            <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
							<div class="form-group">
								<label>Follow up date : </label>
								<input type="date" class="form-control" id="datepick" name="fu_date" required="required">
							</div>								
							
							<div class="form-group">
								<label>Follow Up Via : </label>
								<select class="form-control" name="via">
								<option>Telepon</option>
								<option>Email</option>
								<option>Chat</option>
							  </select>
							</div>
							
                            <div class="form-group">
                                <label>Select Customer Data : </label>
                                <input type="Text" class="form-control" name="customer" maxlength="25">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>

                            <div class="form-group">
                               <label>City : </label>
                                <input type="Text" class="form-control" name="city" maxlength="25" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>PIC : </label>
                                <input type="Text" class="form-control" name="pic" value="" maxlength="25" autocomplete="off">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Phone : </label>
                    <input type="Text" class="form-control" name="phone" value="" maxlength="13" autocomplete="off">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                               <label>Email : </label>
                    <input type="email" class="form-control" name="email" value="" maxlength="100" autocomplete="off">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                 <label>position</label>
                      <input type="Text" class="form-control" name="pos" value="" maxlength="20" autocomplete="off">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Industry Type</label>
                      <input type="Text" class="form-control" name="industry" placeholder="Specify Industry" maxlength="45" autocomplete="off">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                 <label>Number of Employee</label>
                      <input type="Text" class="form-control" name="employee" value="" maxlength="6" placeholder="Number of Employee" autocomplete="off">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Number of Site</label>
                      <input type="Text" class="form-control" name="site" placeholder="Number of Site" autocomplete="off">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
							
							<div class="form-group">
                                <label>Number of Company</label>
                      <input type="Text" class="form-control" name="cabang" placeholder="Number of Company" autocomplete="off">
                            </div>
                             <div class="checkbox">
                      <label>
                        <input type="checkbox" name="multinpwp" value="Yes"> Multi NPWP
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="multipolicy" value="Yes"> Multi Policy
                      </label>
                      </div>
                        <h3>Comment & <small>Question</small></h3>
                    <textarea id="editor1 class="form-control" name="editor1" rows="10" cols="80" maxlength="255"></textarea>
						<div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                        </form>
				</div>
			</div>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>