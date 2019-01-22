<div class="wrapper wrapper-content">
    <div class="row">
		<div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Menu Bar</h5>
                </div>
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Top menu add</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Sub menu add</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Menu/Post</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <?php echo form_open('menu_insert', 'class="form-horizontal"'); ?>
                                <div class="form-group"><label class="col-sm-2 control-label">Top Menu</label>
                                    <div class="col-sm-6">
                                    	<input class="form-control" type="text" name="menu_title">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>  
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <?php echo form_open('sub_menu_insert', 'class="form-horizontal"'); ?>
                            	<div class="form-group"><label class="col-sm-2 control-label">Main Menu</label>
                                    <div class="col-sm-6">
                                    	<select name="main_menu" class="form-control">
                                    		<option value="none"> -- Select main menu -- </option>
                                    		<?php if(@$menu_data){
                                    			foreach ($menu_data as $value) { ?>
                                    				<option value="<?php echo $value->id?>">
                                    					<?php echo $value->menu_title;?>
                                    				</option>
                                    			<?php }}?>
                                    	</select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Sub Menu</label>
                                    <div class="col-sm-6">
                                    	<input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>  
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
							<div class="col-lg-12">
			                            <table class="table table-bordered">
			                                <thead>
			                                <tr>
			                                    <th>#</th>
			                                    <th>Top Menu</th>
			                                    <th>Sub Menu</th>
			                                    <th>Edit</th>
			                                    <th>Delete</th>
			                                </tr>
			                                </thead>
			                                <tbody>
			                                <tr>
			                                    <td>1</td>
			                                    <td>Mark</td>
			                                    <td>Otto</td>
			                                    <td>
			                                    	<button class="btn-sm btn btn-primary" type="button" data-toggle="button"><span class="glyphicon glyphicon-pencil"></span>  POST/EDIT</button>
			                                    </td>
			                                    <td>
			                                    	<button class="btn-sm btn btn-danger" type="button" data-toggle="button"><span class="glyphicon glyphicon-trash"></span>  Delete</button>
			                                    </td>
			                                </tr>
			                                <tr>
			                                    <td>2</td>
			                                    <td>Jacob</td>
			                                    <td>Thornton</td>
			                                    <td>
			                                    	<button class="btn-sm btn btn-primary" type="button" data-toggle="button"><span class="glyphicon glyphicon-pencil"></span>  POST/EDIT</button>
			                                    </td>
			                                    <td>
			                                    	<button class="btn-sm btn btn-danger" type="button" data-toggle="button"><span class="glyphicon glyphicon-trash"></span>  Delete</button>
			                                    </td>
			                                </tr>
			                                <tr>
			                                    <td>3</td>
			                                    <td>Larry</td>
			                                    <td>the Bird</td>
			                                    <td>
			                                    	<button class="btn-sm btn btn-primary" type="button" data-toggle="button"><span class="glyphicon glyphicon-pencil"></span>  POST/EDIT</button>
			                                    </td>
			                                    <td>
			                                    	<button class="btn-sm btn btn-danger" type="button" data-toggle="button"><span class="glyphicon glyphicon-trash"></span>  Delete</button>
			                                    </td>
			                                </tr>
			                                </tbody>
			                            </table>
					                </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
</div>
