<?php include 'header_link.php'; ?>

    <?php include 'navigation.php'; ?>

        <?php include 'header.php'; ?>

		    <div class="wrapper wrapper-content">
		    	
		    	<div class="row">

		    		<div class="tab-pane">
		    			
                        <?php if(validation_errors()){?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                            <strong><?php echo validation_errors(); ?></strong>
                        </div>
                        <?php }?>
                        <div class="panel-body">
                            <?php echo form_open('Class_controller/edit_section', 'class="form-horizontal"'); ?>
                            <input type="hidden" name="id" value="<?php echo @$section_id; ?><?php echo set_value('id'); ?>">

                            <input type="hidden" name="class_id" value="<?php echo @$class_id; ?><?php echo set_value('class_id'); ?>">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Section Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="section_name" value="<?php echo @$section_name; ?><?php echo set_value('section_name'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Section Limit</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="section_limit" value="<?php echo @$section_limit; ?><?php echo set_value('section_limit'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Student Number</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="student_number" value="<?php echo @$section_student_number; ?><?php echo set_value('student_number'); ?>" required>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Update</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>

		    	</div>
		    </div>

            <?php include 'footer.php'; ?>

        </div>
        
		<?php include 'right-sidebar.php'; ?>

    </div>
<?php include 'footer_link.php'; ?>


