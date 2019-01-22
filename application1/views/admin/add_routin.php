<div class="wrapper wrapper-content">
	
	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?php $segment_= $this->uri->segment(1);
                    echo  humanize($segment_); ?></h2>
        </div>
    </div>
</div>
<?php if(validation_errors()){?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
        <strong><?php echo validation_errors(); ?></strong>
    </div>
<?php }?>

<div class="row">

	<div class="tab-pane">
			
            <div class="panel-body">
                <?php echo form_open('insert_routine', 'class="form-horizontal"'); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Day</label>
                    <div class="col-sm-6">
                        <select class="form-control m-b" name="day">
				            <option value="none">-- Select Day --</option>
				            <option value="1">Sunday</option>
				            <option value="2">Monday</option>
				            <option value="3">Tusday</option>
				            <option value="4">Wednesday</option>
				            <option value="5">Thursday</option>
				            <option value="6">Friday</option>
				            <option value="7">Saturday</option>
				        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-6">
                        <select name="class" class="form-control" id='class_id'>
				            <option value="none">-- Select class --</option>
				            <?php
				                foreach($class_data as $class){

				                    echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
				                }
				            ?>
				        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Section</label>
                    <div class="col-sm-6">
                        <select id="sel_section" name="section" class="form-control" id="section_id">
				            <option value="none">-- Select section --</option>
				        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Time</label>
                    <div class="col-sm-6">
                    	<select class="form-control m-b" name="time">
				            <option value="none">-- Select Time --</option>
                            <option value="1">9:00 AM - 10:00 AM</option>
                            <option value="2">10:00 AM - 11:00 AM</option>
                            <option value="3">11:00 AM - 12:00 PM</option>
                            <option value="4">12:00 PM - 13:00 PM</option>
                            <option value="5">13:00 PM - 14:00 PM</option>
				            <option value="6">14:00 PM - 15:00 PM</option>
				        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Subject</label>
                    <div class="col-sm-6">
                        <select id="sel_subject" name="subject" class="form-control m-b">
                            <option value="none">-- Select subject --</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Teacher</label>
                    <div class="col-sm-6">
                        <select class="form-control m-b" name="teacher">
				            <option value="none">-- Select Teacher --</option>
				            <?php if (@$teacher) {
				            	foreach ($teacher as $value) { ?>
				            		<option value="<?php echo $value->id; ?>"><?php echo $value->t_name; ?></option>
				            	<?php } } ?>
				        </select>
                    </div>
                    <div class="col-sm-4">
	                    <button class="btn btn-primary" type="submit">Save</button>
	                </div>
                </div>
                
                <?php echo form_close(); ?>
            </div>
        </div>
</div>