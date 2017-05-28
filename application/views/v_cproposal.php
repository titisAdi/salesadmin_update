<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Create Proposal</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
		                            <li>
		                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
		                            </li>
		                            <li class="active">
		                                <i class="fa fa-edit"></i> Create Proposal
		                            </li>
		                        </ol>
	                    </p>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Customer Data &amp; License</h3>
					</div>
					
					<div class="panel-body">
					<form name="proposal" action="<?php echo base_url()."index.php/SalesAdmin/cproposal_process"; ?>" method="post">
						<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
						<div class="form-group">
                            <label>Select Customer : </label>
                            <select class="form-control" name="idlead">
                                <?php foreach($data as $d){ ?>
                                	<option value="<?php echo $d['id_lead']?>"><?php echo $d['id_lead']?> || <?php echo $d['customer']?></option>
                           		<?php } ?>
                            </select>
                    	</div>
                    	<div class="form-group">
							<label>Follow up date : </label>
							<input type="date" class="form-control" id="datepick" name="date" required="required">
						</div>
						<br>
						<div class="form-group">
                                <label>Quotation Data : </label>
								<table class="table table-striped" id="tablelic">
									<tr class="bg-aqua-active color-palette">
										<th style="width:3%"></th>
										<th style="width:7%">No.</th>
										<th style="width:42%">Type</th>
										<th style="width:25%">Custom Limit (leave blank if want default)</th>
										<th style="width:25%">Discount</th>
									</tr>
									<tr>
										<td><input class="case" type="checkbox" name="chk" class="fancy-checkbox"></td>
										<td><input type="text" class="form-control" name="lic_line[]" maxlength="3" value="1"></td>
										<td>
											<select class="form-control" name="type[]">
				                                <?php foreach($product as $d){ ?>
				                                	<option value="<?php echo $d['productcode']?>"><?php echo $d['productcode']?> || <?php echo $d['productname']?> || <?php echo $d['employeelimit']?> || <?php echo $d['price']?></option>
				                           		<?php } ?>
				                            </select>
										</td>
										<td><input type="Text" class="form-control" name="limit[]" maxlength="6" placeholder="Leave Blank if Want Default" value="0"></td>
										<td><input type="Text" class="form-control" name="discount[]" maxlength="10" placeholder="Leave Blank if no discount" value="0"></td>
									</tr>
								</table>
								<button type="button" name="addmore" class="addmore btn btn-primary">Add</button>
									||
								<button type="button" name="delete" class="delete btn btn-danger">Delete</button>
                            </div>	
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Workdays</h3>
					</div>
					<div class="panel-body">
						<table class="table table-striped" id="tablewd">
				            <tr class="bg-aqua-active color-palette">
				                <th style="width:4%"></th>
				                <th style="width:6%">No.</th>
								<th style="width:50%">Description</th>
				                <th style="width:6%">Estimation</th>
				                <th style="width:15%">Rate </th>
				                <th style="width:20%">Total (Rp.)</th>
				            </tr>
				            <tr>
				            <?php $wd=0 ?>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Assestment"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				            <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Installation"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				           <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Technical & Reporting Training"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				            <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Upload Data for Training"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				            <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Training Application"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				            <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Upload Data for Simulation"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				            <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Simulation"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				            <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Upload Data for Live"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				            <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="Support Live"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
				            <tr>
				              	<td><input class="case" type="checkbox" name="chk"></td>
                  				<td><input type="Text" class="form-control" name="line[]" maxlength="3" value="<?php echo $wd++?>"></td>	
				              	<td><input type="Text" class="form-control" name="wddesc[]" maxlength="100" value="First Payroll Process Support"></td>
				              	<td><input type="text" name="wdquantity[]" id="quantity_<?php echo $wd; ?>" class="form-control totalLineWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>
				                <td><input type="text" name="wdrate[]" id="price_<?php echo $wd; ?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="2000000"></td>
								<td><input type="text" name="wdtotal[]" id="total_<?php echo $wd; ?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
				            </tr>
			            </table>
			            <table class="table table-striped">
				            <tr class="bg-aqua-active color-palette">
				                <th style="width:4%">Total</th>
				                <th style="width:6%"> </th>
								<th style="width:50"> </th>
				                <th style="width:8%"><input type="text" class="form-control" id="wdTotal" name="wdTotal" placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></th>
			                  	<th style="width:15%"></th>
			                  	<th style="width:18%"><input type="text" class="form-control" id="subTotal" name="subtotal" placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></th>
				            </tr>
						</table>
						<button type="button" name="delete" class="delete btn btn-danger">Delete</button>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Custom Workdays</h3>
					</div>
					<div class="panel-body">
						<table class="table table-striped" id="tablecwd">
					        <tr class="bg-aqua-active color-palette">
					            <th style="width:4%"></th>
					            <th style="width:6%">No.</th>
								<th style="width:50%">Description</th>
					            <th style="width:5%">Estimation</th>
					            <th style="width:15%">Rate </th>
					            <th style="width:20%">Total (Rp.)</th>
					        </tr>
					        <tr>
								<td><input class="case" type="checkbox" name="chk"></td>
				                <td><input type="Text" class="form-control" name="cwdline[]" maxlength="3" value="1"></td>			  
				                <td><input type="Text" class="form-control" name="cwddesc[]" maxlength="100"></td>
								<td><input type="text" name="cwdquantity[]" id="cwdquantity_1" class="form-control totalLineCWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="0"></td>
				                <td><input type="text" name="cwdrate[]" id="cwdprice_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="0"></td>
								<td><input type="text" name="cwdtotal[]" id="cwdtotal_1" class="form-control cwdtotalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="0"></td>
				            </tr>
					    </table>
					    <table class="table table-striped">
			              	<tr class="bg-aqua-active color-palette">
			                	<th style="width:4%">Total</th>
			                  	<th style="width:6%"> </th>
							  	<th style="width:50%"> </th>
			                  	<th style="width:8%"><input type="text" class="form-control" id="cwdTotal" name="cwdTotal" placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></th>
			                  	<th style="width:15%"></th>
			                  	<th style="width:18%"><input type="text" class="form-control" id="cwdsubTotal" name="cwdsubtotal" placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></th>
			              	</tr>
						</table>
						<button type="button" name="addmore2" class="addmore2 btn btn-primary">Add</button> || <button type="button" name="delete" class="delete btn btn-danger">Delete</button>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Term &amp; Update</h3>
					</div>
					<div class="panel-body">
						<textarea id="editor1" name="editor1" rows="50" cols="100">
								<ol>
								<li> Harga belum termasuk PPN 10%.</li>
								<li> Harga license hanya berlaku untuk multiple site yang terinstall di 1 (satu)<br> server sesuai dengan nama perusahaan yang tercantum di dalam kontrak.</li>
								<li> Penggunaan untuk site yang terinstall di server yang berbeda akan<br> dikenakan biaya 50% dari harga license.</li>
								<li> Harga belum termasuk hardware / perangkat keras, infrastruktur dan<br> license database (bila diperlukan).</li>
								<li> Biaya transportasi dan akomodasi ditanggung oleh Customer.</li>
								<li> Pihak PT. Java Consulting Indonesia akan membantu mengintegrasikan<br> SDK yang ada di fingerprint yang digunakan dengan aplikasi PT. Java Consulting Indonesia</li>
								<li> Optional : Service Maintenance Contract  pertahun, sebesar 20% dari harga<br> license. Meliputi : <i>(Dibayar di awal tahun kedua)</i><br>
								     -  Update version software (misalnya : perubahan peraturan pemerintah, dll)<br>
								     -  Update new features<br>
								     -  On call support 8 (jam) x 5 (hari)
								</li>
								<li> Harga license sudah termasuk maintenance selama 1 tahun terhitung<br> setelah produk software terinstall. </li>
								<li> Tahapan dalam pembayaran produk Software :<br>
								     -  50 % dari nilai project pada saat Sign Kontrak.<br>
								     -  50 % dari nilai project setelah software terinstall di server.
								</li>
								<li> Tahapan dalam pembayaran implementasi Software : <br>
								     -  100 % dari nilai jumlah workdays yang digunakan.<br>
								</li>
								</ol>
                    	</textarea>
                    		<br><br><br>
                    		<label>Signer : </label>			  
							<div class="input-group">
								<input type="text" class="form-control" name="signer" value="" required="required" maxlength="20">
								</input>
							</div>
						</div>
					</div>
					<button type="submit" name="submit" value="Simpan" class="btn btn-default">Submit</button>
				</div>

	<script type="text/javascript">
		var i=$('#tablelic tr').length;
		$(".addmore").on('click',function(){			  
			html = '<tr>';
			html += '<td><input class="case" type="checkbox" name="chk"></td>';
			html += '<td><input type="Text" class="form-control" name="lic_line[]" maxlength="3" value="'+i+'"></td>';
			html += '<td><select class="form-control" name="type[]"><?php foreach($product as $d){ ?> <option value="<?php echo $d['productcode']?>"><?php echo $d['productcode']?> || <?php echo $d['productname']?> || <?php echo $d['employeelimit']?> || <?php echo $d['price']?></option> <?php } ?></select></td>';
			html += '<td><input type="Text" class="form-control" name="limit[]" maxlength="6" placeholder="Leave Blank if Want Default" value="0"></td>';
			html += '<td><input type="Text" class="form-control" name="discount[]" maxlength="10" placeholder="Leave Blank if no discount" vaue="0"></td>';
			html += '</tr>';
			$('#tablelic').append(html);
			i++;
		});
		var cw=$('#tablecwd tr').length;
			$(".addmore2").on('click',function(){			  
				html = '<tr>';
				html += '<td><input class="case" type="checkbox" name="chk"></td>';
				html += '<td><input type="Text" class="form-control" name="cwdline[]" maxlength="3" value="'+cw+'"></td>';
				html += '<td><input type="Text" class="form-control" name="cwddesc[]" maxlength="100"></td>';
				html += '<td><input type="text" name="cwdquantity[]" id="cwdquantity_'+cw+'" class="form-control totalLineCWD changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>';
				html += '<td><input type="text" name="cwdrate[]" id="cwdprice_'+cw+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value=""></td>';
				html += '<td><input type="text" name="cwdtotal[]" id="cwdtotal_'+cw+'" class="form-control cwdtotalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
				html += '</tr>';
				$('#tablecwd').append(html);
				cw++;
			});
		$(document).on('focus','.autocomplete_txt',function(){
			type = $(this).data('type');
			
			if(type =='productCode' )autoTypeNo=0;
			if(type =='productName' )autoTypeNo=1; 	
			
			$(this).autocomplete({
				source: function( request, response ) {
					$.ajax({
						url : 'ajax.php',
						dataType: "json",
						method: 'post',
						data: {
						   name_startsWith: request.term,
						   type: type
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
							 	var code = item.split("|");
								return {
									label: code[autoTypeNo],
									value: code[autoTypeNo],
									data : item
								}
							}));
						}
					});
				},
				autoFocus: true,	      	
				minLength: 0,
				select: function( event, ui ) {
					var names = ui.item.data.split("|");						
					id_arr = $(this).attr('id');
			  		id = id_arr.split("_");
					$('#itemNo_'+id[1]).val(names[0]);
					$('#itemName_'+id[1]).val(names[1]);
					$('#quantity_'+id[1]).val(1);
					$('#price_'+id[1]).val(names[2]);
					$('#total_'+id[1]).val( 1*names[2] );
					calculateTotal();
				}		      	
			});
		});
		$(".delete").on('click', function() {
			$('.case:checkbox:checked').parents("tr").remove();
			$('#check_all').prop("checked", false); 
		});
		$(document).on('change keyup blur','.changesNo',function(){
			id_arr = $(this).attr('id');
			id = id_arr.split("_");
			quantity = $('#quantity_'+id[1]).val();
			price = $('#price_'+id[1]).val();
			if( quantity!='' && price !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );	
			calculateTotal();
		});

		$(document).on('change keyup blur','#tax',function(){
			calculateTotal();
		});
		$(document).on('change keyup blur','#discount',function(){
			calculateTotal();
		});
		function calculateTotal(){
			wdTotal = 0 ; subTotal = 0 ; total = 0; 
			$('.totalLineWD').each(function(){
				if($(this).val() != '' )wdTotal += parseFloat( $(this).val() );
			});
			$('#wdTotal').val( wdTotal.toFixed(2) );	
			$('.totalLinePrice').each(function(){
				if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
			});
			$('#subTotal').val( subTotal.toFixed(2) );
		}
		$(document).on('focus','.autocomplete_txt',function(){
			type = $(this).data('type');
			
			if(type =='productCode' )autoTypeNo=0;
			if(type =='productName' )autoTypeNo=1; 	
			
			$(this).autocomplete({
				source: function( request, response ) {
					$.ajax({
						url : 'ajax.php',
						dataType: "json",
						method: 'post',
						data: {
						   name_startsWith: request.term,
						   type: type
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
							 	var code = item.split("|");
								return {
									label: code[autoTypeNo],
									value: code[autoTypeNo],
									data : item
								}
							}));
						}
					});
				},
				autoFocus: true,	      	
				minLength: 0,
				select: function( event, ui ) {
					var names = ui.item.data.split("|");						
					id_arr = $(this).attr('id');
			  		id = id_arr.split("_");
					$('#itemNo_'+id[1]).val(names[0]);
					$('#itemName_'+id[1]).val(names[1]);
					$('#cwdquantity_'+id[1]).val(1);
					$('#cwdprice_'+id[1]).val(names[2]);
					$('#cwdtotal_'+id[1]).val( 1*names[2] );
					calculatecwdTotal();
				}		      	
			});
		});
		$(document).on('change keyup blur','.changesNo',function(){
			cwdid_arr = $(this).attr('id');
			cwdid = id_arr.split("_");
			cwdquantity = $('#cwdquantity_'+id[1]).val();
			cwdprice = $('#cwdprice_'+id[1]).val();
			if( cwdquantity!='' && cwdprice !='' ) $('#cwdtotal_'+id[1]).val( (parseFloat(cwdprice)*parseFloat(cwdquantity)).toFixed(2) );	
			calculatecwdTotal();
		});
		function calculatecwdTotal(){
			cwdTotal = 0 ; cwdsubTotal = 0 ; cdtotal = 0; 
			$('.totalLineCWD').each(function(){
				if($(this).val() != '' )cwdTotal += parseFloat( $(this).val() );
			});
			$('#cwdTotal').val( cwdTotal.toFixed(2) );	
			$('.cwdtotalLinePrice').each(function(){
				if($(this).val() != '' )cwdsubTotal += parseFloat( $(this).val() );
			});
			$('#cwdsubTotal').val( cwdsubTotal.toFixed(2) );
		}
		$(function () {
	        CKEDITOR.replace('editor1');
	        $(".textarea").wysihtml5();
      	});
		 $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
	</script>