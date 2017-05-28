<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Presentation Summary Form</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Presentation
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo base_url()."index.php/SalesAdmin/pro_presentation/"?>">
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
                      <label>Presentation Date : </label>
                      <input type="date" class="form-control" id="datepick" name="fu_date" required="required">
                    </div>

                    <div class="form-group">
                        <label>Location : </label>
                        <input type="Text" class="form-control" name="loc" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Presentation By : </label>
                        <input type="Text" class="form-control" name="by"  autocomplete="off">
                    </div>

                    <label>Participant</label>
                      <table width="300px" class="table table-hover">
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th style="width: 180px">Position</th>
                            <th> </th>
                          </tr>
                        <tbody id="dataTable">
                          <tr>
                            <td><input type="checkbox" name="chk[]"></td>
                            <td>
                              <input class="form-control input-sm" type="text" name="txt[]">
                            </td>
                            <td>
                              <input class="form-control input-sm" type="text" name="txt2[]">
                            </td>
                            <td><a href="#" onclick="addRow('dataTable')">Add</a></td>
                          </tr>
                      </tbody>
                    </table>
                    <a href="#" onclick="deleteRow('dataTable')">Remove</a>

                    <h3>Comment & <small>Question</small></h3>
                    <textarea id="editor1" name="editor1" rows="10" cols="80" maxlength="255">
                     
                    </textarea>
                    <div>
                     <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
				</div>
				</form>
				<div class="row">
					<div class="col-lg-6">
					</div>
				</div>
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
    </script>
    <script>
      function addRow(tableID){
        var table=document.getElementById(tableID);
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
        if(null!=chkbox&&true==chkbox.checked){if(rowCount<=1){alert("Cannot delete all the rows.");break;}
        table.deleteRow(i);rowCount--;i--;}}}catch(e){alert(e);}}

        $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    </script>