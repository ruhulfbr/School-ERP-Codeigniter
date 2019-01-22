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
    <div class="col-lg-2">

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
        <?php } ?>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Basic Information</h5>
                </div>
                <div class="ibox-content">
                    <?php echo form_open_multipart('student_insert', 'class="form-horizontal"','runat="server"'); ?>
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="s_f_name" value="<?php echo set_value('s_f_name'); ?>" placeholder="Enter Full Name">
                                <span class="text-danger"><?php echo form_error('s_f_name'); ?></span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="s_id" value="<?php echo set_value('s_id'); ?>" placeholder="Student ID">
                                <span class="text-danger"><?php echo form_error('s_id'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Roll NO</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="s_roll" value="<?php echo set_value('s_roll'); ?>" placeholder="Roll NO">
                                <span class="text-danger"><?php echo form_error('s_roll'); ?></span>
                            </div>
                            <div class="col-sm-3">
                                <select name="class" class="form-control m-b" id='class_id'>
                                    <option value="none">-- Select class --</option>
                                    <?php
                                        foreach($class_data as $class){

                                            echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
                                        }
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('class'); ?></span>
                            </div>
                            <div class="col-sm-3">
                                
                                <select id="sel_section" name="section" class="form-control m-b">
                                    <option value="none">-- Select section --</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('section'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Birthday</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control col-sm-4" name="s_dob" >
                                <span class="text-danger"><?php echo form_error('s_dob'); ?></span>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control m-b" name="s_sex" >
                                    <option>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('s_sex'); ?></span>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control m-b" name="s_reli" >
                                    <option>Select Religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Buddhists">Buddhists</option>
                                    <option value="Christians">Christians</option>
                                    <option value="Animists">Animists</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('s_reli'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Father Info</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="fat_name" value="<?php echo set_value('fat_name'); ?>" placeholder="Father Name">
                                <span class="text-danger"><?php echo form_error('fat_name'); ?></span>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control col-sm-4" name="fat_mobile" value="<?php echo set_value('fat_mobile'); ?>" placeholder="Father Mobile Number" >
                                <span class="text-danger"><?php echo form_error('fat_mobile'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <!-- Mother's Info Start -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mother Info</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="mot_name" value="<?php echo set_value('mot_name'); ?>" placeholder="Mother Name">
                                <span class="text-danger"><?php echo form_error('mot_name'); ?></span>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control col-sm-4" name="mot_mobile" value="<?php echo set_value('mot_mobile'); ?>" placeholder="Mother Mobile Number">
                                <span class="text-danger"><?php echo form_error('mot_mobile'); ?></span>
                            </div>
                        </div>
                        <!-- Mother's Info End -->
                        
                        <!-- <div class="hr-line-dashed"></div> -->
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label">Present Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="s_pre_add" value="<?php echo set_value('s_pre_add'); ?>" placeholder="Enter village, Post Office, Upozilla, District Name." ></textarea>
                                <span class="text-danger"><?php echo form_error('s_pre_add'); ?></span>
                            </div>
                        </div> -->
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="s_per_add" value="<?php echo set_value('s_per_add'); ?>" placeholder="Enter village, Post Office, Upozilla, District Name." ></textarea>
                                <span class="text-danger"><?php echo form_error('s_per_add'); ?></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Photo</label>
                            <div class="col-sm-3">
                                <input type="file" id="fileUpload" class="form-control-file" name="s_image">
                                <span class="text-danger"><?php echo form_error('s_image'); ?></span>
                                <div class="col-sm-3" id="image-holder"></div>
                            </div>
                        </div>
                
                
                <!-- <div class="ibox-title">
                    <h5>On-line User Control</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="Password" class="form-control col-sm-4" name="pass"  value="<?php echo set_value('pass'); ?>" placeholder="Enter Password">
                            <span class="text-danger"><?php echo form_error('pass'); ?></span>
                        </div>
                    </div>
                </div> -->
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-2">
                        <button class="btn btn-w-m btn-primary" type="submit" name="submit" value="submit">Save</button>
                        <a href="<?php echo site_url('student_information') ;?>" class="btn btn-w-m btn-primary" type="submit" name="submit" value="submit">Cancel</a>

                    </div>
                </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>