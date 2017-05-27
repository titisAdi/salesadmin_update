<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Follow Up Timeline</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Customer List
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
						<table class="table table-hover">
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
									<td><a href="<?php echo base_url()."index.php/SalesAdmin/timeline/".$d['id_lead']; ?>" style="text-decoration: none"><?php echo $d['id_lead']?></a></td>
									<td><a href="<?php echo base_url()."index.php/SalesAdmin/timeline/".$d['id_lead']; ?>" style="text-decoration: none"><?php echo $d['customer']?></a></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
				</div>