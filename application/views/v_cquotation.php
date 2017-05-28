<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Create Quotation</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i>Create Quotation
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					 <form role="form" action="<?php echo base_url()."index.php/SalesAdmin/cquotation_process/"?>" method="post">
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
                                <label>Subject</label>
                                <input class="form-control" placeholder="Subject" name="subject">
                            </div>
							
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="address"></textarea>
                            </div>
							
							<div class="form-group">
                                <label>Quotation Data : </label>
								<table class="table table-striped">
									<tr class="bg-aqua-active color-palette">
										<th style="width:3%"></th>
										<th style="width:8%">No.</th>
										<th style="width:20%">Type</th>
										<th style="width:9%">Item</th>
										<th style="width:20%">Price</th>
										<th style="width:10%">Qty </th>
										<th style="width:10%">UM</th>
										<th style="width:20%">Total Price</th>
										<th></th>
									</tr>
									<tr>
										<td><input class="case" type="checkbox" name="chk"></td>
										<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="1"></td>
										<td><select class="form-control" name="type[]">
											<option value="Item">Item</option>
											<option value="Workdays">Workdays</option>
											<option value="Custom">Custom</option>
											<option value="Other">Other</option>
											</select>
										</td>
										<td>
											<input type="Text" class="form-control" name="item[]" maxlength="45" value="">
										</td>
										<td>
											<input type="text" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
										</td>
										<td>
											<input type="text" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
										</td>
										<td>
											<input type="Text" class="form-control" name="um[]" maxlength="3" value="">
										</td>
										<td>
											<input type="text" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
										</td>
									</tr>
								</table>
								<button type="button" name="addmore" class="addmore btn btn-primary">Add</button>
									||
								<button type="button" name="delete" class="delete btn btn-danger">Delete</button>
                            </div>
							
							<div class='col-xs-4'>
								<div class="form-group">
									<label>Subtotal: &nbsp;</label>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" name="subtotal" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
									</div>
								</div>
							</div>
							
							<div class='col-xs-4'>
								<div class="form-group">
									<label>Discount: &nbsp;</label>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" id="discount" name="discount" placeholder="discount" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
									</div>
								</div>
							</div>
							
							<div class="col-cs-4">
								<div class="form-group">
									<label>After Discount: &nbsp;</label>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" name="subtotal2" id="afterdiscount" placeholder="After Discount" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
									</div>
								</div>
							</div>
							
							<div class="col-xs-4">
								<div class="form-group">
									<label>Total: &nbsp;</label>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
									</div>
								</div>
							</div>
							
							<div class="col-xs-4">
								<div class="form-group">
									<label>PPn 10%: &nbsp;</label>
									<div class="input-group">
									<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" id="taxAmount" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
									</div>
								</div>
							</div>
							
							</br></br></br></br>
							<div class="form-group">
                                <label>Remark</label>
                                <textarea class="form-control" rows="10" cols="80" name="editor1">
										Term of Payment License JPayroll adalah DP 50% dan sisanya setelah aktivasi produk.
										Pembayaran implementasi software : 100% dari nilai jumlah workdays yang digunakan
								</textarea>
								
                            </div>
                            <div>
                            	<button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </form>
    <script type="text/javascript">
		var i=$('table tr').length;
		$(".addmore").on('click',function(){			  
			html = '<tr>';
			html += '<td><input class="case" type="checkbox" name="chk"></td>';
			html += '<td><input type="Text" class="form-control" name="line" maxlength="3" value="'+i+'"></td>';
			html += '<td><select class="form-control" name="type"><option value="Item">Item</option><option value="Workdays">Workdays</option><option value="Custom">Custom</option><option value="Other">Other</option>';
			html += '<td><input type="Text" class="form-control" name="item[]" maxlength="45" value=""></td>';
			html += '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
			html += '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
			html += '<tds><input type="Text" class="form-control" name="um[]" maxlength="3" value=""></td>';
			html += '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
			html += '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
			html += '</tr>';
			$('table').append(html);
			i++;
		});
		$(".delete").on('click', function() {
			$('.case:checkbox:checked').parents("tr").remove();
			$('#check_all').prop("checked", false); 
		});
		$(function () {
        CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();
      });
		 $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    </script>