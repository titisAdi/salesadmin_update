<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Quotation Revision</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
		                            <li>
		                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
		                            </li>
		                            <li class="active">
		                                <i class="fa fa-edit"></i> Quotation Revision
		                            </li>
		                        </ol>
	                    </p>
				</div>
				<div class="panel-body">
					<form role="form" action="<?php echo base_url()."index.php/Sales/quoterev/"?>" method="post">

                             <div class="form-group" name="lead">
                                    <label>ID Quotation : </label>
                   					<input type="text" class="form-control" value="<?php echo $id_quotation?>" name="quote" required="required" readonly>
                            </div>

                            <div class="form-group">
								<label>Follow up date : </label>
								<input type="date" class="form-control" id="datepick" name="date" value="<?php echo $qdate?>" required="required">
							</div>	

                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control" placeholder="Subject" name="subject" value="<?php echo $subject?>">
                            </div>
							
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="address" value="<?php echo $address?>"></textarea>
                            </div>
							
							<div class="form-group">
                                <label>Quotation Data : </label>
								<table class="table table-striped">
									<tr class="bg-aqua-active color-palette">
										<th style="width:5%"></th>
										<th style="width:8%">No.</th>
										<th style="width:20%">Type</th>
										<th style="width:20%">item</th>
										<th style="width:15%">Price</th>
										<th style="width:10%">Qty </th>
										<th style="width:10%">UM</th>
										<th style="width:25%">Total Price</th>
									</tr>
									<tr>
										<td><input class="case" type="checkbox" name="chk"></td>
										<td><input type="Text" class="form-control" name="line" maxlength="3" value="<?php echo $line?>"></td>
										<td><select class="form-control" name="type" value="<?php echo $type?>">
											<option value="Item">Item</option>
											<option value="Workdays">Workdays</option>
											<option value="Custom">Custom</option>
											<option value="Other">Other</option>
											</select>
										</td>
										<td>
											<input type="Text" class="form-control" name="item[]" maxlength="45" value="<?php echo $description?>">
										</td>
										<td>
											<input type="text" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $price?>">
										</td>
										<td>
											<input type="text" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $qty?>">
										</td>
										<td>
											<input type="Text" class="form-control" name="um[]" maxlength="3" value="<?php echo $um?>">
										</td>
										<td>
											<input type="text" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $total?>">
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
										<input type="text" class="form-control" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $subtotal1?>">
									</div>
								</div>
							</div>
							
							<div class='col-xs-4'>
								<div class="form-group">
									<label>Discount: &nbsp;</label>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" id="discount" name="discount" placeholder="discount" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $discount?>">
									</div>
								</div>
							</div>
							
							<div class="col-cs-4">
								<div class="form-group">
									<label>After Discount: &nbsp;</label>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" id="afterdiscount" placeholder="After Discount" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $subtotal2?>">
									</div>
								</div>
							</div>
							
							<div class="col-xs-4">
								<div class="form-group">
									<label>Total: &nbsp;</label>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $total?>">
									</div>
								</div>
							</div>
							
							<div class="col-xs-4">
								<div class="form-group">
									<label>PPn 10%: &nbsp;</label>
									<div class="input-group">
									<div class="input-group-addon">Rp.</div>
										<input type="text" class="form-control" id="taxAmount" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $ppn?>">
									</div>
								</div>
							</div>
							
							</br></br></br></br>
							<div class="form-group">
                                <label>Remark</label>
                                <textarea class="form-control" rows="10" cols="80" value="<?php echo $remark?>" name="editor1">
										Term of Payment License JPayroll adalah DP 50% dan sisanya setelah aktivasi produk.
										Pembayaran implementasi software : 100% dari nilai jumlah workdays yang digunakan
								</textarea>
								
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>

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
    </script>