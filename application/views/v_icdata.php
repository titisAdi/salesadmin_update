<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Inquiry Contact Data</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Inquiry Contact Data
	                            </li>
	                        </ol>
                        </p>
				</div>
			<div class="panel-body">
				<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Customer</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                                $no=1;
                                foreach($data as $d){ ?>
                                <tr>
                                    <td><?php echo $no++; ?> </td>
                                    <td><a href="<?php echo base_url()."index.php/SalesAdmin/ricdata/".$d['customer']; ?>" style="text-decoration: none"><?php echo $d['customer']?></a></td>
                            <?php }?>
                        </tbody>
					</table>
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