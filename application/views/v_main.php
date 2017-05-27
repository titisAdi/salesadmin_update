<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Overview</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">
												<?php 
		                                            $inq = $this->db->query('select * from tinq where year (idate) = year (curdate())');
		                                            echo $inq->num_rows();
                                        		?>
                                            </span>
											<span class="title">Inquiries</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">
												<?php 
	                                                $lead = $this->db->query('select * from tlead where status="aktif"');
	                                                echo $lead->num_rows();
	                                            ?>
											</span>
											<span class="title">Lead Active</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Tables -->
					<div class="row">
						<div class="col-md-6">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><span class="lnr lnr-star-half"></span>  Progress</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Lead</th>
												<th>Customer</th>
												<th>Location</th>
												<th>Patner</th>
												<th>Amount (Rp.)</th>
												<th>Progress</th>
											</tr>
										</thead>
										<tbody>
                                            <?php foreach($data as $d){?>
											<tr>
												<td><?php echo $d['id_lead']?></td>
												<td><?php echo $d['customer']?></td>
												<td><?php echo $d['city']?></td>
												<td><?php echo $d['supp_code1']?></td>
												<td><?php 
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
                                               echo number_format($profit,0,',','.');?></td>
												<td>
                                                    <?php echo $progress; ?>%
                                                </td>
											<?php } ?>
											</tr>
                                        </tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Progress</a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><span class="lnr lnr-list"></span>  Task List</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Lead</th>
												<th>Customer</th>
												<th>Last Followup</th>
												<th>Overdue</th>
												<th>Priority</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($datatasks as $dt){?>
											<tr>
													<td><?php echo $dt['id_lead']?></td>
													<td><?php echo $dt['customer']?></td>
													<td><?php echo $dt['followup_date']?></td>
													<td><?php $lastdate = $dt['followup_date'];
                                                                $curDate = date("Y-m-d");
                                                                $strdate = date($lastdate);
                                                                $diff = abs(strtotime($lastdate)-strtotime($curDate));
                                                                $overdue = floor($diff / (60*60*24) );
                                                                echo $overdue;
                                                    ?> Days</td>
													<td><?php 
                                                    if ($overdue >= 0 && $overdue <= 4) {
                                                        $prior = 'label label-success';
                                                        $tag = 'low';
                                                    }else if ($overdue > 4 && $overdue <= 7) {
                                                        $prior = 'label label-warning';
                                                        $tag = 'mid';
                                                       }   else if ($overdue > 7) {
                                                            $prior = 'label label-danger';
                                                            $tag = 'high';
                                                            }
                                                    ?>
                                                        <span class="<?php echo $prior; ?>"><?php echo $tag; ?></span> 
                                                    </td>
												<?php } ?>
											</tr>
                                        </tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Task List</a></div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-calendar-o" aria-hidden="true"></i>  Last Event</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Lead</th>
												<th>Customer</th>
												<th>Last Followup</th>
												<th>Event</th>
												<th>Remark</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($lastevent as $le){?>
											<tr>
													<td><?php echo $le['id_lead']?></td>
													<td><?php echo $le['customer']?></td>
													<td><?php echo $le['followup_date']?></td>
													<td><?php echo $le['via']; ?></td>
													<td><span class="<?php echo $prior; ?>"><?php echo $tag; ?></span></td>
												<?php } ?>
											</tr>
                                        </tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View Last Event</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
