<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Send Quotation</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i>Send Quotation
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<form role="form" action="<?php echo base_url()."index.php/SalesAdmin/qSendProcess/"?>" method="post">
						<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>						
                            <div class="form-group">
                                    <label>Select Customer : </label>
                                    <select class="form-control" name="id">
                                        <?php foreach($data as $d){ ?>
                                        <option value="<?php echo $d['id_rev']?>"><?php echo $d['id_rev']?> || <?php echo $d['customer']?></option>
                                        <?php } ?>
                                        <input type="hidden" name="lead" value=" ">
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
                            <button type="submit" class="btn btn-default">Submit</button>

                    </form>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>