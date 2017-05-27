<!DOCTYPE html>
<html>
<head>
	<title>Sales Admin | Quotation Preview</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap/"?>css/AdminLTE.min.css">
	
</head>
<body>
	<div class="wrapper" id="testcase" style="padding-top: 0mm; padding-right: 10mm; padding-bottom: 10mm; padding-left: 10mm;">
		 <section class="invoice">
		 	<div class="row">
				<div class="col-xs-9">
				<br>
					<img src="<?php echo base_url()."assets/img/";?>header.png" style="width: 80%" alt="User Image"/>
				</div>
				<div class="col-xs-3">
			  	<br>
			  	<small>
              		<h3 align="right" class="text-light-blue" style="line-height: 50%">QUOTATION </h3>
			  		<p align="right" class="text-light-blue" style="line-height: 30%"><?php echo $id_quotation ?>/<?php echo $rev ?></p>
			  		<p align="right" class="text-light-blue" style="line-height: 50%"><?php echo $qdate ?></p>
			  	</small>
			  	</div>
			  	<div class="col-xs-12 page-header">
			  	</div>
			</div>
			<div class="row invoice-info">
          		<div class="col-sm-6">
	          		To
	            <address>
	              <strong><?php echo $customer ?></strong><br>
	             <?php echo $address ?> <br>
	             <br><br><br>
	             Subject : <?php echo $subject ?>
	            </address>
          		</div>
          		<div class="col-sm-4 invoice-col">
         		</div>
          		<div class="col-sm-4 invoice-col">
          		</div>
          	</div>
          	<div class="row">
				<div class="col-xs-12">
					<p> Berdasarkan Kebutuhan perusahaan anda berikut ini kami sampaikan penawaran harga terkait
						dengan License dan workdays implementation JPayroll System Application :</p>
				</div>
				<div class="col-xs-12">
            		<table class="table" width="100%"  height="25%">
              			<thead class="bg-aqua-active color-palette">
                			<tr>
                				<th>No.</th>
				                <th>Type</th>
				                <th>Description</th>
				                <th style="width:20%">Price (Rp.)</th>
				                <th>Qty</th>
				                <th>UM</th>
								<th style="width:20%">Total Price (Rp.)</th>
                			</tr>
                		</thead>
                		<tbody>
                			<tr>
                				<td><?php echo $line ?></td>
			                  	<td><?php echo $type ?></td>
			                  	<td><?php echo $description ?></td>
			                  	<td><?php echo number_format($price,'2',',','.') ?></td>
			                  	<td><?php echo $qty ?></td>
			                  	<td><?php echo $um ?></td>
							  	<td><?php echo number_format($total,'2',',','.') ?></td>
                			</tr>
                		</tbody>
                		<thead class="bg-aqua-active color-palette" height="25%">
                			<tr>
                				<th colspan="6">Subtotal</th>
				  				<th align="center" style="width:15%"><?php echo number_format($subtotal1,'2',',','.') ?></th>
                			</tr>
                		</thead>
                		<thead class="bg-aqua-active color-palette">
                			<tr>
                				<th colspan="6">Discount</th>
                				<th align="center" style="width:15%"><?php echo number_format($discount,'2',',','.') ?></th>
                			</tr>
                			<tr>
                				<th colspan="6">After Discount</th>
                				<th align="center" style="width:15%"><?php echo number_format($subtotal2,'2',',','.') ?></th>
                			</tr>
                			<tr>
                				<th colspan="6">PPn</th>
				  				<th align="center" style="width:15%"><?php echo number_format($ppn,'2',',','.') ?></th>
                			</tr>
                			<tr>
                  				<th colspan="6">Total</th>
				  				<th align="center" style="width:15%"><?php $total=$ppn+$subtotal2;
				  					echo number_format($total,'2',',','.') ?></th>
                			</tr>
                		</thead>
                	</table>
                </div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<p class="lead" style="line-height: 10%">Remarks</p>
					<?php echo $remark?>
					
				</div>
				<div class="col-xs-12">
					<p> Apabila anda setuju dengan penawaran kami, silahkan menandatangani penawaran ini dan mohon untuk dikirimkan ke kami melalui FAX : 031 – 752 0793 atau Email : info@jpayroll.com
					Demikian penawaran ini kami sampaikan atas perhatianya kami ucapkan terima kasih banyak</p>
				</div>
				<div class="col-xs-12">
				<table>
					<tr>
						<td width="100px"></td>
						<td>
							<p align="center"> Hormat Kami,</p>
							<p align="center"> PT Java Consulting Indonesia </p>
							<br><br><br>
							<p align="center"> Hendra Litoyo   </p>
							<p align="center"> Operational Director </p>
						</td>
						<td width="470px"></td>
						<td>
							<p align="center"> Disetujui Oleh</p>
							<p align="center"> <?php echo $customer ?> </p>
							<br><br><br>
							<p align="center">   ...........................   </p>
							<p align="center">   ........................... </p>
						</td>
					</tr>
				</table>
				</div>
			</div>
        </div>
		 </section>
	</div>
</body>
</html>