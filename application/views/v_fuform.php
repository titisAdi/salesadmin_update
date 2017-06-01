<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Follow Up Form</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Follow Up Form
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<form role="form" action="<?php echo base_url()."index.php/SalesAdmin/followup/"?>" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
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
                                <input class="form-control" name="pos">
                            </div>
							
							<div class="form-group">
                                <label>Upload File</label>
								<?php echo form_open_multipart('upload/do_upload');?>
								<?php echo form_upload('document'); ?>
                            </div>
							
							<h3>Comment & <small>Question</small></h3>
	                        <textarea id="editor1" class="form-control" name="editor1" rows="10" cols="80" maxlength="255">
							</textarea>
											
	                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                           </div>

                        </form>
				</div>
			</div>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    $(function () {
            CKEDITOR.replace('editor1');
            $(".textarea").wysihtml5();
        });
</script>
