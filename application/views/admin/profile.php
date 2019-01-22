<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>
            <?php $segment_= $this->uri->segment(1);
                     echo  humanize($segment_); ?>
        </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
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
        <div class="col-lg-12">

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } 

              if (isset($error)) : 
            ?>

                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>

            <?php endif; ?>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>User Information</h5>
                </div>
                <div class="ibox-content">
                    <?php echo form_open_multipart('update_user_data', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-5">
                                <?php 
                                    $full_name = array
                                    (
                                      'class' => 'form-control',
                                      'placeholder' => 'Enter Full Name',
                                      'name' => 'full_name',
                                      // 'autofocus'   => 'autofocus'
                                      'value' => @$full_name.set_value('full_name')
                                    );

                                    echo form_input($full_name);
                                ?>
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">User Name</label>
                            <div class="col-sm-5">
                                <?php 
                                    $u_name = array
                                    (
                                      'class' => 'form-control',
                                      'placeholder' => 'Enter User Name',
                                      'name' => 'u_name',
                                      'readonly' => 'readonly',
                                      // 'autofocus'   => 'autofocus'
                                      'value' => @$u_name.set_value('u_name')
                                    );

                                    echo form_input($u_name);
                                ?>
                            </div>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label">Photo</label>
                            <div class="col-sm-3">
                                <img src="<?php echo base_url("resource/student_images/"); ?>" class="img-lg img-md img-rounded">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-3">
                                <input type="file" class="form-control-file" name="s_image">
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div> -->

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Current Password</label>
                            <div class="col-sm-5">
                                <?php 
                                    $old_password = array
                                    (
                                      'class' => 'form-control',
                                      'id' => 'input_old_password',
                                      'placeholder' => 'Enter Current Password',
                                      'name' => 'old_password',
                                      'required' => 'required',
                                    );

                                    echo form_password($old_password);
                                  ?>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-5">
                                <?php 
                                    $new_password = array
                                    (
                                      'class' => 'form-control',
                                      'id' => 'input_new_password',
                                      'placeholder' => 'Enter New Password',
                                      'name' => 'new_password',
                                      'required' => 'required',
                                    );

                                    echo form_password($new_password);
                                  ?>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm New Password</label>
                            <div class="col-sm-5">
                                <?php 
                                    $confirm_password = array
                                    (
                                      'class' => 'form-control',
                                      'id' => 'input_confirm_password',
                                      'placeholder' => 'Enter Confirm Password',
                                      'name' => 'confirm_password',
                                      'required' => 'required',
                                    );

                                    echo form_password($confirm_password);
                                  ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <button class="btn btn-w-m btn-primary" type="submit" name="submit" value="submit">Update</button>
                                <a href="<?php echo site_url('dashboard') ;?>" class="btn btn-w-m btn-primary" type="submit" name="submit" value="submit">Cancel</a>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>