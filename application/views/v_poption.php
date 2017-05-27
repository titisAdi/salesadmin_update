<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Product Option</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Product Option
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
				                <td><a href="<?php echo base_url()."index.php/SalesAdmin/leadChange/".$d['id_lead']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				            </tr>
				            <?php } ?>
				        </tbody>
				    </table>