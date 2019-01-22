<?php include 'header_link.php'; ?>

    <?php include 'navigation.php'; ?>

        <?php include 'header.php'; ?>

		    <div class="wrapper wrapper-content">
		    	
		    	<div class="row">
		    		<?php if(validation_errors()){?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                        <strong><?php echo validation_errors(); ?></strong>
                    </div>
                    <?php }?>

		    		<div class="panel-body">
                        <?php echo form_open('Class_controller/update_class', 'class="form-horizontal"'); ?>

                        <input type="hidden" name="id" value="<?php echo @$id; echo set_value('id');?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Class ID</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="class_id" value="<?php echo @$class_id; echo set_value('class_id'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Class Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="class_name" value="<?php echo @$class_name; echo set_value('class_name'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Class Teacher</label>
                                <div class="col-sm-6">
                                    <select  class="form-control" name="class_teacher">
                                        <option value="<?php echo @$class_teacher;?>"><?php echo @$class_teacher;?></option>
                                        <?php 
                                        foreach ($teacher_data as $teacher_data) { ?>
                                        <option value="<?php echo $teacher_data->teacher_name;?>"><?php echo $teacher_data->teacher_name;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Update</button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
		    		

		    	</div>
		    </div>

            <?php include 'footer.php'; ?>

        </div>
        
		<?php include 'right-sidebar.php'; ?>

    </div>
<?php include 'footer_link.php'; ?>


