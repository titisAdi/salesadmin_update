<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">POC Data</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Select Customer
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="example1">
						 <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
							<thead>
								<tr>
									<th>No. </th>
									<th>ID Lead</th>
									<th>Customer</th>
								</tr>
							</thead>
							<tbody>
							<?php 
                                $no=1;
                                foreach($data as $d){ ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><a href="<?php echo base_url()."index.php/SalesAdmin/pocreport/".$d['id_lead']; ?>" style="text-decoration: none"><?php echo $d['id_lead']?></a></td>
									<td><a href="<?php echo base_url()."index.php/SalesAdmin/pocreport/".$d['id_lead']; ?>" style="text-decoration: none"><?php echo $d['customer']?></a></td>
								</tr>
							<?php } ?>
							</tbody>
					</table>
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
	$('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>