<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Quotation Summary</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Quotation Summary
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
                                                <th>ID Quotation</th>
                                                <th>Rev</th>
                                                <th>Date</th>
                                                <th>Subtotal</th>
                                                <th>Discount</th>
                                                <th>After Discount</th>
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
                                            <td><?php echo $d['id_quotation']?></td>
                                            <td><?php echo $d['rev']?></td>
                                            <td><?php echo $d['qdate']?></td>
                                            <td><?php echo $d['subtotal1']?></td>
                                            <td><?php echo $d['discount']?></td>
                                            <td><?php echo $d['subtotal2']?></td>
                                            <td>
                                            <a href="<?php echo base_url()."index.php/SalesAdmin/qreview/".$d['id_rev']; ?>"><i class="fa fa-eye" aria-hidden="true" title="Preview"></i></a> | 
                                            <a href="<?php echo base_url()."index.php/SalesAdmin/qprint/".$d['id_rev']; ?>"><span class="lnr lnr-printer" title="Print"></span></a> | 
                                            <a href="<?php echo base_url()."index.php/SalesAdmin/sendquotation/".$d['id_quotation']?>"><i class="fa fa-share-square" aria-hidden="true" title="Send"></i></td></a>
                                            </td>
                                        <?php } ?>
                                        </tr>
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