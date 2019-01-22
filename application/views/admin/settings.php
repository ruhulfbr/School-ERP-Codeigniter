<div class="wrapper wrapper-content">
    <div class="row">
    <div class="col-lg-12">
        <?php if(validation_errors()){?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
            <strong><?php echo validation_errors(); ?></strong>
        </div>
        <?php }?>
        <div class="panel-body">
           <?php echo form_open('settings_insert', 'class="form-horizontal"'); ?>
           <input type="hidden" name="school_info_id" value="<?php echo @$school_info->school_info_id; ?>">
            <div class="form-group"><label class="col-sm-2 control-label">Institution Name</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="name" value="<?php echo @$school_info->name; echo set_value('name'); ?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Address 1st Line</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="address_1st_line" value="<?php echo @$school_info->address_1st_line; echo set_value('address_1st_line'); ?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Address 2nd Line</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="address_2nd_line" value="<?php echo @$school_info->address_2nd_line; echo set_value('address_2nd_line'); ?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Institution Phone</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="phone" value="<?php echo @$school_info->phone; echo set_value('phone'); ?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <input type="hidden" name="sms_id" value="<?php echo @$sms_info->sms_id; ?>">
            <div class="form-group"><label class="col-sm-2 control-label">Sms Username</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="user_name" value="<?php echo @$sms_info->user_name; echo set_value('user_name'); ?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Sms Password</label>
                <div class="col-sm-6">
                    <input class="form-control" type="password" name="password" value="<?php echo @$sms_info->password; echo set_value('password'); ?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Sms Rate</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="sms_rate" value="<?php echo @$sms_info->sms_rate; echo set_value('sms_rate'); ?>">
                </div>
            </div>
            <!-- <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Entry Sms</label>
                <div class="col-sm-1 i-checks">

                </div>
                <div class="col-sm-1 i-checks">
                    <input type="checkbox" name="checkbox_id[]" value="<?php echo @$value->id;?>" checked="checked"/>
                </div>

                <label class="col-sm-2 control-label">Exit Sms</label>
                <div class="col-sm-1 i-checks">

                </div>
                <div class="col-sm-1 i-checks">
                    <input type="checkbox" name="checkbox_id[]" value="<?php echo @$value->id;?>" checked="checked"/>
                </div>
            </div> -->
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Sms Entry Text</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="sms_entry_text" value="<?php echo @$sms_info->sms_entry_text; echo set_value('sms_entry_text'); ?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Sms Exit Text</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="sms_exit_text" value="<?php echo @$sms_info->sms_exit_text; echo set_value('sms_exit_text'); ?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>    
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </div>
           <?php echo form_close()?>
           <?php echo form_open_multipart('logo_insert', 'class="form-horizontal"'); ?>
            <div class="hr-line-dashed"></div>                                    
            <div class="form-group"><label class="col-sm-2 control-label">Institution Logo</label>
                <div class="col-sm-3">
                    <input type="hidden" name="previous_logo" value="<?php echo @$school_info->logo; ?>">
                    <input type="file" id="fileUpload" name="logo">
                    <div id="image-holder"></div>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-primary" type="submit">Upload</button>
                </div>
            </div>
            <?php echo form_close()?>
            <?php echo form_open_multipart('signature_insert', 'class="form-horizontal"'); ?>
            <div class="hr-line-dashed"></div>                                    
            <div class="form-group"><label class="col-sm-2 control-label">Institution Signature</label>
                <div class="col-sm-3">
                    <input type="hidden" name="previous_signature" value="<?php echo @$school_info->signature; ?>">
                    <input type="file" id="fileUpload2" name="signature">
                    <div id="image-holder2"></div>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-primary" type="submit">Upload</button>
                </div>
            </div>
            <?php echo form_close()?>
            <?php echo form_open_multipart('bannar_insert', 'class="form-horizontal"'); ?>
            <div class="hr-line-dashed"></div>                                    
            <div class="form-group"><label class="col-sm-2 control-label">Institution Bannar</label>
                <div class="col-sm-3">
                    <input type="hidden" name="previous_bannar" value="<?php echo @$school_info->bannar; ?>">
                    <input type="file" id="fileUpload3" name="bannar">
                    <div id="image-holder3"></div>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-primary" type="submit">Upload</button>
                </div>
            </div>
           <?php echo form_close()?>
        </div>
    </div>
    </div>
</div>