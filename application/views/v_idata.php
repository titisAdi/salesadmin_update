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
					<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
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
                                    ||   <a href="#" data-url="<?php echo base_url()."index.php/SalesAdmin/remove/".$bInq['inq_no']; ?>" onclick="return konfirmasi()" data-toggle="modal" data-target="#modal-konfirmasi"  class="confirm_delete"><i class="fa fa-trash" aria-hidden="true" title="Remove"></i> </td>
                            <?php }?>
                        </tbody>
					</table>
					</div>
				</div>
			</div>

	<div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"> 
             	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body btn-info">
                    Are you sure to Delete this Data ?
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Yes</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
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
		    
		    $(document).ready(function(){
				$('.confirm_delete').on('click', function(){
		
				var delete_url = $(this).attr('data-url');

				swal({
					title: " Are you sure to Delete this Data ?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes",
					cancelButtonText: "Cancel",
					closeOnConfirm: false			
				}, function(){
					window.location.href = delete_url;
				});

				return false;
				});
			});
			$('#notifications').slideDown('slow').delay(3000).slideUp('slow');

		</script>
		    