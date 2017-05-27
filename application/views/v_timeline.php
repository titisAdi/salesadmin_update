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
	                            <li>
	                                <i class="fa fa-edit"></i> Customer List
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Follow Up Timeline
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<div class="panel-heading">
									<h3 class="panel-title">Status : <?php echo $status ?></h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Date</th>
												<th>Event</th>
												<th>By</th>
												<th>PIC</th>
												<th>POS</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Comment</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$i = 0;
											$color = array('danger','warning','primary','success');
										?>
											<tr>
												<td><?php echo $date ?></td>
												<td><span class="label label-<?php echo $color[$i++%4];?>"><?php echo $via ?></span></td>
												<td><?php echo $fu_by ?></td>
												<td><?php echo $pic ?></td>
												<td><?php echo $pos ?></td>
												<td><?php echo $phone ?></td>
												<td><?php echo $email ?></td>
												<td><?php echo $comment ?></td>
											</tr>
										</tbody>
									</table>
								</div>
					</div>
