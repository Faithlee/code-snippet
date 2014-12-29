<!-- BEGIN THEME STYLES --> 
<link href="media/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
<link href="media/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="media/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="media/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="media/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->

<!-- BEGIN PAGE -->
<!-- BEGIN PAGE HEADER-->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			Dashboard <small>statistics and more</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a> 
				<i class="fa fa-angle-right"></i>
			</li>
			<li><a href="#">Dashboard</a></li>
			<li class="pull-right">
				<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
					<i class="fa fa-calendar"></i>
					<span></span>
					<i class="fa fa-angle-down"></i>
				</div>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<!-- END PAGE HEADER-->
<div class="row">
	<div class="col-md-6 col-sm-6">
		<!-- BEGIN PORTLET-->
		<div class="portlet solid bordered light-grey">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-bar-chart-o"></i>Site Visits</div>
				<div class="tools">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn default btn-sm active">
						<input type="radio" name="options" class="toggle" id="option1">Users
						</label>
						<label class="btn default btn-sm">
						<input type="radio" name="options" class="toggle" id="option2">Feedbacks
						</label>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<div id="site_statistics_loading">
					<img src="media/img/loading.gif" alt="loading"/>
				</div>
				<div id="site_statistics_content" class="display-none">
					<div id="site_statistics" class="chart"></div>
				</div>
			</div>
		</div>
		<!-- END PORTLET-->
	</div>
	<div class="col-md-6 col-sm-6">
		<!-- BEGIN PORTLET-->
		<div class="portlet solid light-grey bordered">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-bullhorn"></i>Activities</div>
				<div class="tools">
					<div class="btn-group pull-right" data-toggle="buttons">
						<a href="" class="btn blue btn-sm active">Users</a>
						<a href="" class="btn blue btn-sm">Orders</a>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<div id="site_activities_loading">
					<img src="media/img/loading.gif" alt="loading"/>
				</div>
				<div id="site_activities_content" class="display-none">
					<div id="site_activities" style="height: 100px;"></div>
				</div>
			</div>
		</div>
		<!-- END PORTLET-->
		<!-- BEGIN PORTLET-->
		<div class="portlet solid bordered light-grey">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-signal"></i>Server Load</div>
				<div class="tools">
					<div class="btn-group pull-right" data-toggle="buttons">
						<a href="" class="btn red btn-sm active">Database</a>
						<a href="" class="btn red btn-sm">Web</a>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<div id="load_statistics_loading">
					<img src="media/img/loading.gif" alt="loading" />
				</div>
				<div id="load_statistics_content" class="display-none">
					<div id="load_statistics" style="height: 108px;"></div>
				</div>
			</div>
		</div>
		<!-- END PORTLET-->
	</div>
</div>
<div class="clearfix"></div>
<div class="row ">
	<div class="col-md-6 col-sm-6">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-bell-o"></i>Recent Activities</div>
				<div class="actions">
					<div class="btn-group">
						<a class="btn btn-sm default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						Filter By
						<i class="fa fa-angle-down"></i>
						</a>
						<div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
							<label><input type="checkbox" /> Finance</label>
							<label><input type="checkbox" checked="" /> Membership</label>
							<label><input type="checkbox" /> Customer Support</label>
							<label><input type="checkbox" checked="" /> HR</label>
							<label><input type="checkbox" /> System</label>
						</div>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
					<ul class="feeds">
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">                        
											<i class="fa fa-check"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 4 pending tasks.
											<span class="label label-sm label-warning ">
											Take action 
											<i class="fa fa-share"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									Just now
								</div>
							</div>
						</li>
						<li>
							<a href="#">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">                        
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												Finance Report for year 2013 has been released.   
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										20 mins
									</div>
								</div>
							</a>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-danger">                      
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 5 pending membership that requires a quick review.                       
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									24 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">                        
											<i class="fa fa-shopping-cart"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											New order received with <span class="label label-sm label-success">Reference Number: DR23923</span>             
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									30 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">                      
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 5 pending membership that requires a quick review.                       
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									24 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">                        
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											Web server hardware needs to be upgraded. 
											<span class="label label-sm label-default ">Overdue</span>             
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									2 hours
								</div>
							</div>
						</li>
						<li>
							<a href="#">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default">                        
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												IPO Report for year 2013 has been released.   
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										20 mins
									</div>
								</div>
							</a>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">                        
											<i class="fa fa-check"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 4 pending tasks.
											<span class="label label-sm label-warning ">
											Take action 
											<i class="fa fa-share"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									Just now
								</div>
							</div>
						</li>
						<li>
							<a href="#">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">                        
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												Finance Report for year 2013 has been released.   
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										20 mins
									</div>
								</div>
							</a>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">                      
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 5 pending membership that requires a quick review.                       
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									24 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">                        
											<i class="fa fa-shopping-cart"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											New order received with <span class="label label-sm label-success">Reference Number: DR23923</span>             
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									30 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">                      
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 5 pending membership that requires a quick review.                       
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									24 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-warning">                        
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											Web server hardware needs to be upgraded. 
											<span class="label label-sm label-default ">Overdue</span>             
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									2 hours
								</div>
							</div>
						</li>
						<li>
							<a href="#">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">                        
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												IPO Report for year 2013 has been released.   
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										20 mins
									</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="scroller-footer">
					<div class="pull-right">
						<a href="#">See All Records <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp;
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="portlet box green tasks-widget">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-check"></i>Tasks</div>
				<div class="tools">
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="" class="reload"></a>
				</div>
				<div class="actions">
					<div class="btn-group">
						<a class="btn default btn-xs" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						More
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a href="#"><i class="i"></i> All Project</a></li>
							<li class="divider"></li>
							<li><a href="#">AirAsia</a></li>
							<li><a href="#">Cruise</a></li>
							<li><a href="#">HSBC</a></li>
							<li class="divider"></li>
							<li><a href="#">Pending <span class="badge badge-important">4</span></a></li>
							<li><a href="#">Completed <span class="badge badge-success">12</span></a></li>
							<li><a href="#">Overdue <span class="badge badge-warning">9</span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<div class="task-content">
					<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="1">
						<!-- START TASK LIST -->
						<ul class="task-list">
							<li>
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""  />                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">Present 2013 Year IPO Statistics at Board Meeting</span>
									<span class="label label-sm label-success">Company</span>
									<span class="task-bell"><i class="fa fa-bell-o"></i></span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""/>                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">Hold An Interview for Marketing Manager Position</span>
									<span class="label label-sm label-danger">Marketing</span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""/>                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">AirAsia Intranet System Project Internal Meeting</span>
									<span class="label label-sm label-success">AirAsia</span>
									<span class="task-bell"><i class="fa fa-bell-o"></i></span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""  />                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">Technical Management Meeting</span>
									<span class="label label-sm label-warning">Company</span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""  />                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">Kick-off Company CRM Mobile App Development</span>
									<span class="label label-sm label-info">Internal Products</span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""  />                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">
									Prepare Commercial Offer For SmartVision Website Rewamp 
									</span>
									<span class="label label-sm label-danger">SmartVision</span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""  />                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">Sign-Off The Comercial Agreement With AutoSmart</span>
									<span class="label label-sm label-default">AutoSmart</span>
									<span class="task-bell"><i class="fa fa-bell-o"></i></span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""  />                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">Company Staff Meeting</span>
									<span class="label label-sm label-success">Cruise</span>
									<span class="task-bell"><i class="fa fa-bell-o"></i></span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li class="last-line">
								<div class="task-checkbox">
									<input type="checkbox" class="liChild" value=""  />                                       
								</div>
								<div class="task-title">
									<span class="task-title-sp">KeenThemes Investment Discussion</span>
									<span class="label label-sm label-warning">KeenThemes</span>
								</div>
								<div class="task-config">
									<div class="task-config-btn btn-group">
										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
										</ul>
									</div>
								</div>
							</li>
						</ul>
						<!-- END START TASK LIST -->
					</div>
				</div>
				<div class="task-footer">
					<span class="pull-right">
					<a href="#">See All Tasks <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp;
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="row ">
	<div class="col-md-6 col-sm-6">
		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-calendar"></i>General Stats</div>
				<div class="actions">
					<a href="javascript:;" class="btn btn-sm yellow easy-pie-chart-reload"><i class="fa fa-repeat"></i> Reload</a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-4">
						<div class="easy-pie-chart">
							<div class="number transactions" data-percent="55"><span>+55</span>%</div>
							<a class="title" href="#">Transactions <i class="m-icon-swapright"></i></a>
						</div>
					</div>
					<div class="margin-bottom-10 visible-sm"></div>
					<div class="col-md-4">
						<div class="easy-pie-chart">
							<div class="number visits" data-percent="85"><span>+85</span>%</div>
							<a class="title" href="#">New Visits <i class="m-icon-swapright"></i></a>
						</div>
					</div>
					<div class="margin-bottom-10 visible-sm"></div>
					<div class="col-md-4">
						<div class="easy-pie-chart">
							<div class="number bounce" data-percent="46"><span>-46</span>%</div>
							<a class="title" href="#">Bounce <i class="m-icon-swapright"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-calendar"></i>Server Stats</div>
				<div class="tools">
					<a href="" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="" class="reload"></a>
					<a href="" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-4">
						<div class="sparkline-chart">
							<div class="number" id="sparkline_bar"></div>
							<a class="title" href="#">Network <i class="m-icon-swapright"></i></a>
						</div>
					</div>
					<div class="margin-bottom-10 visible-sm"></div>
					<div class="col-md-4">
						<div class="sparkline-chart">
							<div class="number" id="sparkline_bar2"></div>
							<a class="title" href="#">CPU Load <i class="m-icon-swapright"></i></a>
						</div>
					</div>
					<div class="margin-bottom-10 visible-sm"></div>
					<div class="col-md-4">
						<div class="sparkline-chart">
							<div class="number" id="sparkline_line"></div>
							<a class="title" href="#">Load Rate <i class="m-icon-swapright"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="media/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="media/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="media/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="media/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="media/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>     
<script src="media/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="media/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="media/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="media/plugins/jquery.sparkline.min.js" type="text/javascript"></script>  
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="media/scripts/index.js" type="text/javascript"></script>
<script src="media/scripts/tasks.js" type="text/javascript"></script>        
<!-- END PAGE LEVEL SCRIPTS -->  
<script>
	jQuery(document).ready(function() {    
	   Index.init();
	   Index.initCalendar(); // init index page's custom scripts
	   Index.initCharts(); // init index page's custom scripts
	   Index.initMiniCharts();
	   Index.initDashboardDaterange();
	   Tasks.initDashboardWidget();
	});
</script>
<!-- END JAVASCRIPTS -->

