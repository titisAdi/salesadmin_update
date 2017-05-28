<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Inquiry Contact</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
		                            <li>
		                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
		                            </li>
		                            <li class="active">
		                                <i class="fa fa-edit"></i> Inquiry Contact
		                            </li>
		                        </ol>
	                    </p>
				</div>
				<div class="panel-body">
					<div class="box-body table-responsive">
                  	<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Customer</th>
								<th>City</th>
								<th>PIC</th>
								<th>Position</th>
								<th>Number of Staff</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Message</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                                $no=1;
                                foreach($data as $bInq){ ?>
                                <tr>
                                    <td><?php echo $no++; ?> </td>
                                    <td><?php echo $bInq['company']?></td>
                                    <td><?php echo $bInq['city']?></td>
                                    <td><?php echo $bInq['fname']?></td>
                                    <td><?php echo $bInq['pos']?></td>
                                    <td><?php echo $bInq['employee']?></td>
                                    <td><?php echo $bInq['phone']?></td>
                                    <td><?php echo $bInq['email']?></td>
                                    <td><?php echo $bInq['message']?></td>
                                    <td><?php echo $bInq['idate']?></td>
                                    <td><i class="fa fa-flag-checkered" aria-hidden="true"></i>   
                                    ||   <i class="fa fa-trash" aria-hidden="true" title="Remove"></i> </td>
                            <?php }?>
                        </tbody>
					</table>
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
		    