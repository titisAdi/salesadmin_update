<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">POC Reporting Form</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> POC
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo base_url()."index.php/SalesAdmin/pro_poc/"?>"enctype="multipart/form-data" enctype="multipart/form-data">
						<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
							 <div class="form-group" name="lead">
			                      <label>Lead ID / Customer : </label>
			                      <select class="form-control" name="lead">
			                        <?php foreach($data as $patner){ ?>
			                            <option value="<?php echo $patner['id_lead']?>"><?php echo $patner['id_lead']?> || <?php echo $patner['customer']?></option>
			                        <?php } ?>
			                    </select>
			                    </div>
							<div class="form-group">
		                      <label>POC Date : </label>
		                      <input type="date" class="form-control" id="datepick" name="fu_date" required="required">
		                    </div>
							<div class="form-group" name="lead">
								<label>Location </label>
								<input type="text" type="text" class="form-control" id="datepick" name="loc" >	
							</div>
							<div class="form-group" name="lead">
								<label>POC By : </label>
								<input type="text" type="text" class="form-control" id="datepick" name="by" >	
							</div>
							<div class="form-group" name="lead">
								<table width="350px" class="table table-hover">
									<tr>
										<th style="width: 10px">#</th>
										<th>Issue</th>
										<th style="width: 100px">Proven</th>
										<th> </th>
									</tr>
									<tbody id="dataTable">
										<tr>
											<td><input type="checkbox" name="chk[]"></td>
											<td><input class="form-control input-sm" type="text" name="txt[]"></td>
											<td><select name="value[]" class="form-control input-sm">
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</td>
											<td><a href="#" onclick="addRow('dataTable')">Add</a></td>
										</tr>
									</tbody>
								</table>
								<a href="#" onclick="deleteRow('dataTable')">Remove</a>
							</div>

							<div class="form-group">
								<label>Upload File</label>
								<?php echo form_open_multipart('upload/do_upload');?>
								<?php echo form_upload('document'); ?>
							</div>
							
							<div class="form-group">
                                <label>Comment and Respond</label>
                                <textarea class="form-control" rows="10" cols="80" name="editor1">
								</textarea>
                            </div>
               				<div>
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</form>
					</div>
		<script type="text/javascript">
	$(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
		//datepicker/
		$('#datepick').datepicker({
		format: "yyyy/mm/dd",
		todayBtn: "linked",
		language: "id",
		autoclose: true,
		todayHighlight: true
		});
	  function addRow(tableID)
		{var table=document.getElementById(tableID);
		var rowCount=table.rows.length;
		var row=table.insertRow(rowCount);
		var colCount=table.rows[0].cells.length;
		for(var i=0;i<colCount;i++){var newcell=row.insertCell(i);
		newcell.innerHTML=table.rows[0].cells[i].innerHTML;
		switch(newcell.childNodes[0].type){case"text":newcell.childNodes[0].value="";break;case"checkbox":newcell.childNodes[0].checked=false;break;case"select-one":newcell.childNodes[0].selectedIndex=0;break;}}}
	function deleteRow(tableID){
			try{var table=document.getElementById(tableID);
			var rowCount=table.rows.length;
			for(var i=0;i<rowCount;i++){var row=table.rows[i];
			var chkbox=row.cells[0].childNodes[0];
			if(null!=chkbox&&true==chkbox.checked){
				if(rowCount<=1){alert("Cannot delete all the rows.");break;}
				table.deleteRow(i);
				rowCount--;
				i--;}
			}
		}
	catch(e){
		alert(e);
		}
	}

	$('#notifications').slideDown('slow').delay(3000).slideUp('slow');
	$(function () {
        CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();
      });
	</script>
