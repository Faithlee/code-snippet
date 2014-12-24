<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="/media/css/select2_metro.css" />
<link rel="stylesheet" href="/media/css/DT_bootstrap.css" />
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			Content Loading via Ajax <small>loading page content via ajax</small>
		</h3>
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="index.html">Home</a>
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="#"></a></li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box light-grey">
			<div class="portlet-title">
				<div class="caption"><i class="icon-globe"></i>Managed Table</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="clearfix">
					<div class="btn-group">
						<button id="sample_editable_1_new" class="btn green">
						Add New <i class="icon-plus"></i>
						</button>
					</div>
					<div class="btn-group pull-right">
						<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right">
							<li><a href="#">Print</a></li>
							<li><a href="#">Save as PDF</a></li>
							<li><a href="#">Export to Excel</a></li>
						</ul>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th style="width:8px;"><div class="checker">
									<span><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></span></div></th>
							<th>Username</th>
							<th class="hidden-480">Email</th>
							<th class="hidden-480">Points</th>
							<th class="hidden-480">Joined</th>
							<th ></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END PAGE CONTENT-->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/media/js/select2.min.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/media/js/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/media/js/table-managed.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
	jQuery(document).ready(function() {
		//todo 需要重新封装		
		TableManaged.init();
	});
</script>

