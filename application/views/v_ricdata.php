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
		                             <li>
		                                <i class="fa fa-edit"></i> Inquiry Contact Data
		                            </li>
		                            <li class="active">
		                                <i class="fa fa-edit"></i> Inquiry Contact Data Detail
		                            </li>
		                        </ol>
	                    </p>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
					    <thead>
					        <tr>
					           	<th>Customer</th>
								<th>PIC</th>
								<th>Position</th>
								<th>Telepon</th>
								<th>E-Mail</th>
					            <th>Remark</th>
					        </tr>
					    </thead>
					    <tbody>
					        <tr>
								<td><?php echo $customer; ?></td>
								<td><?php echo $pic; ?></td>
								<td><?php echo $pos; ?></td>
								<td><?php echo $phone; ?></td>
								<td><?php echo $email; ?></td>
								<td><?php echo $remark; ?></td>           
					        </tr>
					    </tbody>
					</table>
				</div>
			</div>
