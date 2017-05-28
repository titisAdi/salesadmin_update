<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Adjustment Progress</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Adjustment Progress
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
					  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th style="width: 45%">ID Lead</th>
				                <th style="width: 45%">Customer</th>
				                <th style="width: 10%;">Action</th>
				            </tr>
				        </thead>
				        <tbody>
				            <?php foreach ($data as $d) { ?>
				            <tr>
				                <td><?php echo $d['id_lead'] ?></td>
				                <td><?php echo $d['customer'] ?></td>
				                <td><a href="<?php echo base_url()."index.php/SalesAdmin/adjusmentProgress/".$d['id_lead']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				            </tr>
				            <?php } ?>
				        </tbody>
				    </table>
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