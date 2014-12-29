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
<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Form Controls <small>form controls and more</small>
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
            <li><a href="#">Form Controls</a></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> Horizontal Form
                </div>
                <div class="tools">
                    <a href="" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="" class="reload"></a>
                    <a href="" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Text</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  placeholder="Enter text">
                                <span class="help-block">A block of help text.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Email Address</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="password" class="form-control"  placeholder="Password">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Left Icon</label>
                            <div class="col-md-9">
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" class="form-control"  placeholder="Left icon">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Right Icon</label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa fa-microphone"></i>
                                    <input type="text" class="form-control"  placeholder="Right icon">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Input With Spinner</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control spinner"  placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Static Control</label>
                            <div class="col-md-9">
                                <p class="form-control-static">email@example.com</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Disabled</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control"  placeholder="Disabled" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Readonly</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control"  placeholder="Readonly" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Dropdown</label>
                            <div class="col-md-9">
                                <select  class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Multiple Select</label>
                            <div class="col-md-9">
                                <select multiple class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Textarea</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" class="col-md-3 control-label">File input</label>
                            <div class="col-md-9">
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">some help text here.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Checkboxes</label>
                            <div class="col-md-9">
                                <div class="checkbox-list">
                                    <label>
                                        <input type="checkbox"> Checkbox 1
                                    </label>
                                    <label>
                                        <input type="checkbox"> Checkbox 1
                                    </label>
                                    <label>
                                        <input type="checkbox" disabled> Disabled
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Inline Checkboxes</label>
                            <div class="col-md-9">
                                <div class="checkbox-list">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox21" value="option1"> Checkbox 1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox22" value="option2"> Checkbox 2
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox23" value="option3" disabled> Disabled
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Radio</label>
                            <div class="col-md-9">
                                <div class="radio-list">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios22" value="option1" checked> Option 1
                                    </label>
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios23" value="option2" checked> Option 2
                                    </label>
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios24" value="option2" disabled> Disabled
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-3 control-label">Inline Radio</label>
                            <div class="col-md-9">
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadios" id="optionsRadios25" value="option1" checked> Option 1
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadios" id="optionsRadios26" value="option2" checked> Option 2
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadios" id="optionsRadios27" value="option3" disabled> Disabled
                                    </label>
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
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box purple ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> Horizontal Form Height Sizing
                </div>
                <div class="tools">
                    <a href="" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="" class="reload"></a>
                    <a href="" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Large Input</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-lg"  placeholder="Large Input">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Default Input</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  placeholder="Default Input">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Small Input</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-sm"  placeholder="Default Input">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Large Select</label>
                            <div class="col-md-9">
                                <select  class="form-control input-lg">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Default Select</label>
                            <div class="col-md-9">
                                <select  class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Small Select</label>
                            <div class="col-md-9">
                                <select  class="form-control input-sm">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn default">Cancel</button>
                        <button type="submit" class="btn green">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
<!-- END PAGE -->


