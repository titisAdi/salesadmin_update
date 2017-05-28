<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Proposal Summary</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
		                            <li>
		                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
		                            </li>
		                            <li class="active">
		                                <i class="fa fa-edit"></i> Proposal Summary
		                            </li>
		                        </ol>
	                    </p>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Lead</th>
                                                <th>Customer</th>
                                                <th>ID Proposal</th>
                                                <th>Rev</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                             $no=1;
                                             foreach($data as $d){

                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['id_lead']?></td>
                                                <td><?php echo $d['customer']?></td>
                                                <td><?php echo $d['idproposal']?></td>
                                                <td><?php echo $d['rev']?></td>
                                                <td><?php echo $d['date']?></td>
                                                <td>
                                                    <a href="<?php echo base_url()."index.php/ConvertPDF/index/".$d['idproposal'].$d['rev'] ?>"><i class="material-icons md-18" title="Save as PDF">picture_as_pdf</i> </a>|
                                                    <a href="<?php echo base_url()."index.php/SalesAdmin/revProposal/".$d['idproposal'].$d['rev'] ?>"><i class="material-icons md-18" title="Revision">mode_edit</i></a> |
                                                    <a href="<?php echo base_url()."index.php/SalesAdmin/sendPropose/".$d['idproposal'].$d['rev'] ?>"><i class="material-icons md-18" title="Send">send</i></a>
                                                </td>
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
</script>