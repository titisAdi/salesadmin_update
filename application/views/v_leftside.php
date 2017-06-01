	<link href="<?php echo base_url()."assets/css";?>material.css" rel="stylesheet">
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?php echo base_url()."index.php/SalesAdmin/adminMasuk"; ?>" class="active"><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
						<li>
							<a href="#inquiry" data-toggle="collapse" class="collapsed"><i class="fa fa-briefcase" aria-hidden="true"></i> <span>Inquiry</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="inquiry" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url()."index.php/SalesAdmin/idata"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Inquiry Data</a></li>
									<li><a href="<?php echo base_url()."index.php/SalesAdmin/aidata"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Add Inquiry Data</a></li>
									<li><a href="<?php echo base_url()."index.php/SalesAdmin/icdata"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Inquiry Contact Data</a></li>
									<li><a href="<?php echo base_url()."index.php/SalesAdmin/minquiry"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Manual Inquiry</a></li>
									<li><a href="<?php echo base_url()."index.php/SalesAdmin/mlead"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Manual Lead</a></li>

								</ul>
							</div>
						</li>
						<li>
							<a href="#lead" data-toggle="collapse" class="collapsed"><i class="fa fa-flag-checkered" aria-hidden="true"></i> <span>Lead</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="lead" class="collapse ">
								<ul class="nav">
									<li><a href="#action" data-toggle="collapse" class="collapsed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>&nbsp;Action </span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="action" class="collapse">
											<ul class="nav">
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/fuform"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Follow Up Form</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/passign"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Partner Assignmet</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/present"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Presentation</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/poc"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;POC</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/poption"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Product Option</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/aprogress"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Adjustment Progress</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/dprospect"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Drop Prospect</a>
												</li>
											</ul>
										</div>
									</li>
									<li><a href="#report" data-toggle="collapse" class="collapsed"><i class="fa fa-file-o" aria-hidden="true"></i><span>&nbsp;Report </span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="report" class="collapse ">
											<ul class="nav">
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/futimeline"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Follow Up Timeline</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/presentport"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Presentation Report</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/pocport"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;POC Report</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/prgreport"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Progress Report</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/slreport"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Sales Lead Report</a>
												</li>
											</ul>
										</div>
									</li>
									<li><a href="#quotation" data-toggle="collapse" class="collapsed"><i class="fa fa-quote-right" aria-hidden="true"></i><span>&nbsp;Quotation </span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="quotation" class="collapse ">
											<ul class="nav">
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/cquotation"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Create Quotation</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/qsummary"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Quotation Summary</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/squotation"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Send Quotation</a>
												</li>
											</ul>
										</div>
									</li>
									<li><a href="#proposal" data-toggle="collapse" class="collapsed"><i class="fa fa-book" aria-hidden="true"></i><span>&nbsp;Proposal </span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="proposal" class="collapse ">
											<ul class="nav">
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/cproposal"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Create Proposal</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/psummary"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Proposal Summary</a>
												</li>
												<li>
												<a href="<?php echo base_url()."index.php/SalesAdmin/sproposal"; ?>" class=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;Send Proposal</a>
												</li>
												<li>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>