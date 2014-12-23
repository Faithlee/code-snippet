<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?=$baseUri?>/media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?=$baseUri?>/media/css/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="<?=$baseUri?>/media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?=$baseUri?>/media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?=$baseUri?>/media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div id="portlet-config" class="modal hide">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button"></button>
		<h3>Widget Settings</h3>
	</div>
	<div class="modal-body">
		Widget settings form goes here
	</div>
</div>
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
	<!-- BEGIN PAGE HEADER-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				Dashboard <small>statistics and more</small>
			</h3>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
				<li class="pull-right no-text-shadow">
					<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>
						<span></span>
						<i class="icon-angle-down"></i>
					</div>
				</li>
			</ul>
			<!-- END PAGE TITLE & BREADCRUMB-->
		</div>
	</div>
	<!-- END PAGE HEADER-->
	<div id="dashboard">
		<!-- BEGIN DASHBOARD STATS -->
		<!-- END DASHBOARD STATS -->
		<div class="clearfix"></div>
		<div class="row-fluid">
			<div class="span6">
				<!-- BEGIN PORTLET-->
				<div class="portlet solid bordered light-grey">
					<div class="portlet-title">
						<div class="caption"><i class="icon-bar-chart"></i>Site Visits</div>
						<div class="tools">
							<div class="btn-group pull-right" data-toggle="buttons-radio">
								<a href="" class="btn mini">Users</a>
								<a href="" class="btn mini active">Feedbacks</a>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div id="site_statistics_loading">
							<img src="<?=$baseUri?>/media/image/loading.gif" alt="loading" />
						</div>
						<div id="site_statistics_content" class="hide">
							<div id="site_statistics" class="chart"></div>
						</div>
					</div>
				</div>
				<!-- END PORTLET-->
			</div>
			<div class="span6">
				<!-- BEGIN PORTLET-->
				<div class="portlet solid light-grey bordered">
					<div class="portlet-title">
						<div class="caption"><i class="icon-bullhorn"></i>Activities</div>
						<div class="tools">
							<div class="btn-group pull-right" data-toggle="buttons-radio">
								<a href="" class="btn blue mini active">Users</a>
								<a href="" class="btn blue mini">Orders</a>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div id="site_activities_loading">
							<img src="<?=$baseUri?>/media/image/loading.gif" alt="loading" />
						</div>
						<div id="site_activities_content" class="hide">
							<div id="site_activities" style="height:100px;"></div>
						</div>
					</div>
				</div>
				<!-- END PORTLET-->
				<!-- BEGIN PORTLET-->
				<div class="portlet solid bordered light-grey">
					<div class="portlet-title">
						<div class="caption"><i class="icon-signal"></i>Server Load</div>
						<div class="tools">
							<div class="btn-group pull-right" data-toggle="buttons-radio">
								<a href="" class="btn red mini active">
								<span class="hidden-phone">Database</span>
								<span class="visible-phone">DB</span></a>
								<a href="" class="btn red mini">Web</a>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div id="load_statistics_loading">
							<img src="<?=$baseUri?>/media/image/loading.gif" alt="loading" />
						</div>
						<div id="load_statistics_content" class="hide">
							<div id="load_statistics" style="height:108px;"></div>
						</div>
					</div>
				</div>
				<!-- END PORTLET-->
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row-fluid">
			<div class="span6">
				<div class="portlet box purple">
					<div class="portlet-title">
						<div class="caption"><i class="icon-calendar"></i>General Stats</div>
						<div class="actions">
							<a href="javascript:;" class="btn yellow easy-pie-chart-reload"><i class="icon-repeat"></i> Reload</a>
						</div>
					</div>
					<div class="portlet-body">
						<div class="row-fluid">
							<div class="span4">
								<div class="easy-pie-chart">
									<div class="number transactions"  data-percent="55"><span>+55</span>%</div>
									<a class="title" href="#">Transactions <i class="m-icon-swapright"></i></a>
								</div>
							</div>
							<div class="margin-bottom-10 visible-phone"></div>
							<div class="span4">
								<div class="easy-pie-chart">
									<div class="number visits"  data-percent="85"><span>+85</span>%</div>
									<a class="title" href="#">New Visits <i class="m-icon-swapright"></i></a>
								</div>
							</div>
							<div class="margin-bottom-10 visible-phone"></div>
							<div class="span4">
								<div class="easy-pie-chart">
									<div class="number bounce"  data-percent="46"><span>-46</span>%</div>
									<a class="title" href="#">Bounce <i class="m-icon-swapright"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption"><i class="icon-calendar"></i>Server Stats</div>
						<div class="tools">
							<a href="" class="collapse"></a>
							<a href="#portlet-config" data-toggle="modal" class="config"></a>
							<a href="" class="reload"></a>
							<a href="" class="remove"></a>
						</div>
					</div>
					<div class="portlet-body">
						<div class="row-fluid">
							<div class="span4">
								<div class="sparkline-chart">
									<div class="number" id="sparkline_bar"></div>
									<a class="title" href="#">Network <i class="m-icon-swapright"></i></a>
								</div>
							</div>
							<div class="margin-bottom-10 visible-phone"></div>
							<div class="span4">
								<div class="sparkline-chart">
									<div class="number" id="sparkline_bar2"></div>
									<a class="title" href="#">CPU Load <i class="m-icon-swapright"></i></a>
								</div>
							</div>
							<div class="margin-bottom-10 visible-phone"></div>
							<div class="span4">
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
	</div>
</div>
<!-- END PAGE CONTAINER-->
<!-- END PAGE -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=$baseUri?>/media/js/jquery.vmap.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.flot.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.flot.resize.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/date.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/daterangepicker.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.gritter.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?=$baseUri?>/media/js/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=$baseUri?>/media/js/index.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
	jQuery(document).ready(function() {
	   Index.init();
	   Index.initCalendar(); // init index page's custom scripts
	   Index.initCharts(); // init index page's custom scripts
	   Index.initMiniCharts();
	   Index.initDashboardDaterange();

	   //App.init(); // initlayout and core plugins
	   //Index.initJQVMAP(); // init index page's custom scripts
	   //Index.initIntro();
	   //Index.initChat();
	});
</script>

