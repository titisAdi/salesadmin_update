<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Sales Lead Report</h3>
						<p class="panel-subtitle">
							<ol class="breadcrumb">
	                            <li>
	                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
	                            </li>
	                            <li class="active">
	                                <i class="fa fa-edit"></i> Sales Report
	                            </li>
	                        </ol>
                        </p>
				</div>
				<div class="panel-body">
					<table class="table" id="example1">
                                        <thead>
                                            <tr>
                                                <th width="2px">Lead</th>
                                                <th>Customer</th>
                                                <th>Employee</th>
                                                <th>Location</th>
												<th>Product</th>
												<th>Description</th>
                                                <th>Partner</th>
                                                <th>Sell Amount</th>
                                                <th>Buy Amount</th>
                                                <th>Gross Profit</th>
                                                <th>Tax Estimation</th>
												<th>Profit</th>
												<th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no=1; foreach($sales as $d){
                                            $iq = $d['iq'];
                                            $fu = $d['fu'];
                                            $pre = $d['pre'];
                                            $pro = $d['pro'];
                                            $poc = $d['poc'];
                                            $adj = $d['adj'];
                                            $progress = $iq + $fu + $pre + $pro + $poc + $adj;
                                            $sell = $d['lead_sales'];
                                            $buy = $sell * $d['supp_commision'];
                                            $grossprofit = $sell - $buy;
                                            $tax = $sell * 0.01;
                                            $profit = $grossprofit - $tax;
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?> </td>
                                                <td><?php echo $d['customer']?></td>
                                                <td><?php echo $d['employee']?></td>
                                                <td><?php echo $d['city']?></td>
                                                <td><?php echo $d['productcode']?></td>
												<td><?php echo $d['productname']?></td>
												<td><?php echo $d['supp_code1']?></td>
												<td><?php echo number_format($sell,0,',','.');?></td>    
                                                <td><?php echo number_format($buy,0,',','.'); ?></td> 
                                                <td><?php echo number_format($grossprofit,0,',','.'); ?></td> 
                                                <td><?php echo number_format($tax,0,',','.'); ?></td> 
                                                <td><?php echo number_format($profit,0,',','.'); ?></td> 
												<td><span class="badge bg-yellow"><?php echo $progress; ?>%</td>
                                        <?php }?>
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