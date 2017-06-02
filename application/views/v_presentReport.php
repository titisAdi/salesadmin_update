<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Presentation Data</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li>
	                                <i class="fa fa-edit"></i> Customer List
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Presentation Data
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"># Date : <?php echo $pre_date?></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<hr>
									<h5><strong>Location : </strong><?php echo $location?></h5>
									<h5><strong>By : </strong><?php echo $by?></h5>
									<h5><strong>Participant : </strong></h5>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Name </th>
												<th>Position </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $name ?></td>
												<td><?php echo $pos?></td>
											</tr>
										</tbody>
									</table>
									<br>
							  		<b>Result :</b> <?php echo $comment ?>
							  		<br>
							  		<b><a href="<?php echo base_url()."index.php/SalesAdmin/downloadPresent/".$id_lead; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download</a></b>
								</div>

							</div>

	