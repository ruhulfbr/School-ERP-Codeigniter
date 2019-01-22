<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>admin_controller/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
            </div>
        <?php }elseif($this->session->flashdata('error')){?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
            </div>
        <?php }elseif(validation_errors()){?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo validation_errors(); ?></strong>
            </div>
            <?php } ?>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Basic Information</h5>
                </div>
                <div class="ibox-content">
                    <?php echo form_open_multipart('add_teacher_data', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="t_name" value="<?php echo set_value('t_name'); ?>" required>
                                <span class="text-danger"><?php echo form_error('t_name'); ?></span>
                            </div>
                            <label class="col-sm-2 control-label">Teacher ID</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="teacher_id" value="<?php echo set_value('teacher_id'); ?>" required>
                                <span class="text-danger"><?php echo form_error('teacher_id'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date of Birth</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="date" name="t_dob" value="<?php echo set_value('t_dob'); ?>" required>
                                <span class="text-danger"><?php echo form_error('t_dob'); ?></span>
                            </div>
                            <label class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="t_sex" required>
                                    <option value="none">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('t_sex'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Religion</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="t_religion" >
                                    <option value="none">Select</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Buddhists">Buddhists</option>
                                    <option value="Christians">Christians</option>
                                    <option value="Animists">Animists</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('t_religion'); ?></span>
                            </div>
                            <label class="col-sm-2 control-label">Blood Group</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="t_blood_group" >
                                    <option value="none">Select Blood Group</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('t_blood_group'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Asinine class</label>
                            <div class="col-sm-4">

                                <select data-placeholder="Choose class ..." class="chosen-select" multiple="" style="width: 350px; display: none;" tabindex="-1" name="t_class[]" value="<?php echo set_value('t_class'); ?>">
                                    <?php
                                        foreach($class_data as $class){

                                            echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Present Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="t_present_address" value="<?php echo set_value('t_present_address'); ?>" required></textarea>
                                <span class="text-danger"><?php echo form_error('t_present_address'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="t_phone" value="<?php echo set_value('t_phone'); ?>" placeholder="Enter Phone Number" required>
                                <span class="text-danger"><?php echo form_error('t_phone'); ?></span>
                            </div>
                            <label class="col-sm-2 control-label">Salary</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="t_salary" value="<?php echo set_value('t_salary'); ?>" placeholder="Enter salary amount" required>
                                <span class="text-danger"><?php echo form_error('t_salary'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Photo</label>
                            <div class="col-sm-3">
                                <input type="file" id="fileUpload" class="form-control-file" name="t_image_path">
                                <span class="text-danger"><?php echo form_error('t_image_path'); ?></span>
                                <div class="col-sm-3" id="image-holder"></div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <button class="btn btn-w-m btn-primary" type="submit" name="submit" value="submit">Save</button>
                                <a href="<?php echo site_url('teacher_and_staff') ;?>" class="btn btn-w-m btn-primary" type="submit" name="submit" value="submit">Cancel</a>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>