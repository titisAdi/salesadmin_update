<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Progress Report</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Progress Report
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-striped" id="example1">
                        <thead>
                            <tr>
                                <th style="width:10%">Lead</th>
                                <th style="width:30%">Customer</th>
                                <th>Progress</th>
                                <th style ="text-align: center; width:5%;">%</th>
                            </tr>
                        </thead>
                        <tbody>
							<form>
							<?php foreach($progress as $d){ 
		                        $iq = $d['iq'];
		                        $fu = $d['fu'];
		                        $pre = $d['pre'];
		                        $pro = $d['pro'];
		                        $poc = $d['poc'];
		                        $adj = $d['adj'];
		                        $total = $iq + $fu + $pre + $pro + $poc + $adj;
		                    ?>
			                    <tr>
			                        <td><?php echo $d['id_lead']; ?></td>
			                        <td><?php echo $d['customer']; ?></td>
			                        <td><div class="progress progress-xs progress-striped active">
			                        	<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $total; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total; ?>%" height="10px"></div>
			                        </div></td>
			                        <td><span class="badge bg-yellow"><?php echo $total; ?>%</span></td>              
			                    </tr>
			                <?php }?>
							</form>
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
</script>