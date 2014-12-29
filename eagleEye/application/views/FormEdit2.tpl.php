<!-- BEGIN PAGE LEVEL STYLES --> 
<link rel="stylesheet" type="text/css" href="/media/plugins/select2/select2_metro.css" />
<link rel="stylesheet" type="text/css" href="/media/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="/media/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN PAGE -->  
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				Widget settings form goes here
			</div>
			<div class="modal-footer">
				<button type="button" class="btn blue">Save changes</button>
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="theme-panel hidden-xs hidden-sm">
	<div class="toggler"></div>
	<div class="toggler-close"></div>
	<div class="theme-options">
		<div class="theme-option theme-colors clearfix">
			<span>THEME COLOR</span>
			<ul>
				<li class="color-black current color-default" data-style="default"></li>
				<li class="color-blue" data-style="blue"></li>
				<li class="color-brown" data-style="brown"></li>
				<li class="color-purple" data-style="purple"></li>
				<li class="color-grey" data-style="grey"></li>
				<li class="color-white color-light" data-style="light"></li>
			</ul>
		</div>
		<div class="theme-option">
			<span>Layout</span>
			<select class="layout-option form-control input-small">
				<option value="fluid" selected="selected">Fluid</option>
				<option value="boxed">Boxed</option>
			</select>
		</div>
		<div class="theme-option">
			<span>Header</span>
			<select class="header-option form-control input-small">
				<option value="fixed" selected="selected">Fixed</option>
				<option value="default">Default</option>
			</select>
		</div>
		<div class="theme-option">
			<span>Sidebar</span>
			<select class="sidebar-option form-control input-small">
				<option value="fixed">Fixed</option>
				<option value="default" selected="selected">Default</option>
			</select>
		</div>
		<div class="theme-option">
			<span>Footer</span>
			<select class="footer-option form-control input-small">
				<option value="fixed">Fixed</option>
				<option value="default" selected="selected">Default</option>
			</select>
		</div>
	</div>
</div>
<!-- END BEGIN STYLE CUSTOMIZER -->            
<!-- BEGIN PAGE HEADER-->   
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			Form Validation <small>form validation</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li class="btn-group">
				<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
				<span>Actions</span> <i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu pull-right" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
				</ul>
			</li>
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a> 
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Form Stuff</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li><a href="#">Form Validation</a></li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-reorder"></i>Validation States</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" class="form-horizontal">
					<div class="form-body">
						<h3 class="form-section">Basic validation States</h3>
						<div class="form-group has-warning">
							<label class="control-label col-md-3" for="inputWarning">Input with warning</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="inputWarning" />
								<span class="help-block">Something may have gone wrong</span>
							</div>
						</div>
						<div class="form-group has-error">
							<label class="control-label col-md-3" for="inputError">Input with error</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="inputError" />
								<span class="help-block">Please correct the error</span>
							</div>
						</div>
						<div class="form-group has-success">
							<label class="control-label col-md-3" for="inputSuccess">Input with success</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="inputSuccess" />
							</div>
						</div>
						<h3 class="form-section">Validation States With Icons</h3>
						<div class="form-group has-warning">
							<label class="control-label col-md-3">Input with warning</label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa fa-exclamation" data-original-title="please write a valid email"></i>   
									<input type="text" class="form-control" />                                 
								</div>
							</div>
						</div>
						<div class="form-group has-error">
							<label class="control-label col-md-3">Input with error</label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa fa-warning" data-original-title="please write a valid email"></i>   
									<input type="text" class="form-control" />                                 
								</div>
							</div>
						</div>
						<div class="form-group has-success">
							<label class="control-label col-md-3">Input with success</label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa fa-check" data-original-title="success input!"></i>   
									<input type="text" class="form-control" />                                 
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green">Submit</button>
							<button type="button" class="btn default">Cancel</button>                              
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END VALIDATION STATES-->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-reorder"></i>Basic Validation</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" id="form_sample_1" class="form-horizontal">
					<div class="form-body">
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							Your form validation is successful!
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Name<span class="required">*</span></label>
							<div class="col-md-4">
								<input type="text" name="name" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Email<span class="required">*</span></label>
							<div class="col-md-4">
								<input name="email" type="text" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">URL<span class="required">*</span></label>
							<div class="col-md-4">
								<input name="url" type="text" class="form-control"/>
								<span class="help-block">e.g: http://www.demo.com or http://demo.com</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Number<span class="required">*</span></label>
							<div class="col-md-4">
								<input name="number" type="text" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Digits<span class="required">*</span></label>
							<div class="col-md-4">
								<input name="digits" type="text" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Credit Card<span class="required">*</span></label>
							<div class="col-md-4">
								<input name="creditcard" type="text" class="form-control"/>
								<span class="help-block">e.g: 5500 0000 0000 0004</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Occupation&nbsp;&nbsp;</label>
							<div class="col-md-4">
								<input name="occupation" type="text" class="form-control"/>
								<span class="help-block">optional field</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Category<span class="required">*</span></label>
							<div class="col-md-4">
								<select class="form-control" name="category" class="select2me">
									<option value="">Select...</option>
									<option value="Category 1">Category 1</option>
									<option value="Category 2">Category 2</option>
									<option value="Category 3">Category 5</option>
									<option value="Category 4">Category 4</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green">Submit</button>
							<button type="button" class="btn default">Cancel</button>                              
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END VALIDATION STATES-->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-reorder"></i>Validation Using Icons</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" id="form_sample_2" class="form-horizontal">
					<div class="form-body">
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							Your form validation is successful!
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Name<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa"></i>   
									<input type="text" class="form-control" name="name"/>                                 
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Email<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa"></i>   
									<input type="text" class="form-control" name="email"/>                                 
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">URL<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa"></i>   
									<input type="text" class="form-control" name="url"/>                                 
								</div>
								<span class="help-block">e.g: http://www.demo.com or http://demo.com</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Number<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa"></i>   
									<input type="text" class="form-control" name="number"/>                                 
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Digits<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa"></i>   
									<input type="text" class="form-control" name="digits"/>                                 
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Credit Card<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-icon right">                                       
									<i class="fa"></i>   
									<input type="text" class="form-control" name="creditcard"/>                                 
								</div>
								<span class="help-block">e.g: 5500 0000 0000 0004</span>
							</div>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green">Submit</button>
							<button type="button" class="btn default">Cancel</button>                              
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END VALIDATION STATES-->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-reorder"></i>Advance Validation</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" id="form_sample_3" class="form-horizontal">
					<div class="form-body">
						<h3 class="form-section">Advance validation.   <small>Custom radio buttons, checkboxes and Select2 dropdowns</small></h3>
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							Your form validation is successful!
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Name<span class="required">*</span></label>
							<div class="col-md-4">
								<input type="text" name="name" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email Address<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" name="email" class="form-control" placeholder="Email Address">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Occupation&nbsp;&nbsp;</label>
							<div class="col-md-4">
								<input name="occupation" type="text" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Category<span class="required">*</span></label>
							<div class="col-md-4">
								<select class="form-control" name="category">
									<option value="">Select...</option>
									<option value="Category 1">Category 1</option>
									<option value="Category 2">Category 2</option>
									<option value="Category 3">Category 5</option>
									<option value="Category 4">Category 4</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Select2 Dropdown<span class="required">*</span></label>
							<div class="col-md-4">
								<select id="form_2_select2" class="form-control select2me" name="options2">
									<option value="">Select...</option>
									<option value="Option 1">Option 1</option>
									<option value="Option 2">Option 2</option>
									<option value="Option 3">Option 3</option>
									<option value="Option 4">Option 4</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Membership<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="radio-list" data-error-container="#form_2_membership_error">
									<label>
									<input type="radio" name="membership" value="1" />
									Fee
									</label>
									<label>
									<input type="radio" name="membership" value="2" />
									Professional
									</label> 
								</div>
								<div id="form_2_membership_error"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Services<span class="required">*</span></label>
							<div class="col-md-4">
								<div class="checkbox-list" data-error-container="#form_2_services_error">
									<label>
									<input type="checkbox" value="1" name="service"/> Service 1
									</label>
									<label>
									<input type="checkbox" value="2" name="service"/> Service 2
									</label>
									<label>
									<input type="checkbox" value="3" name="service"/> Service 3
									</label>
								</div>
								<span class="help-block">(select at least two)</span>
								<div id="form_2_services_error"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Markdown</label>
							<div class="col-md-9">
								<textarea name="markdown" data-provide="markdown" rows="10" data-error-container="#editor_error"></textarea>
								<div id="editor_error"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">WYSIHTML5 Editor<span class="required">*</span></label>
							<div class="col-md-9">
								<textarea class="wysihtml5 form-control" rows="6" name="editor1" data-error-container="#editor1_error"></textarea>
								<div id="editor1_error"></div>
							</div>
						</div>
						<div class="form-group last">
							<label class="control-label col-md-3">CKEditor<span class="required">*</span></label>
							<div class="col-md-9">
								<textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
								<div id="editor2_error"></div>
							</div>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green">Submit</button>
							<button type="button" class="btn default">Cancel</button>                              
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
			<!-- END VALIDATION STATES-->
		</div>
	</div>
</div>
<!-- END PAGE CONTENT--> 
<!-- END PAGE -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/media/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="/media/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="/media/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/media/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script type="text/javascript" src="/media/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="/media/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/media/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="/media/plugins/bootstrap-markdown/lib/markdown.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="/media/scripts/form-validation.js"></script> 
<!-- END PAGE LEVEL STYLES -->    
<script>
	jQuery(document).ready(function() {   
	   // initiate layout and plugins
	   FormValidation.init();
	});
</script>
<!-- END JAVASCRIPTS -->
