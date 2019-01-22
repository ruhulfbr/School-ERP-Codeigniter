<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('account_dashboard') ?>">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <?php if(validation_errors()){?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
            <strong><?php echo validation_errors(); ?></strong>
        </div>
        <?php }?>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <?php echo form_open_multipart('add_other_payment', 'class="form-horizontal"'); ?>
                    <input type="hidden" name="rec_category" value="other">
                    <input type="hidden" name="final_date" value="<?php echo date('d-m-y');?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="name" placeholder="Full name" value="<?php echo set_value('name'); ?>">
                            </div>
                            <label class="col-sm-2 control-label">Account</label>
                            <div class="col-sm-4">
                                <select name="account" class="form-control chosen-select">
                                    <option value="none"> -- Select Account --</option>
                                    <?php foreach ($account_head_income as $value) { ?>
                                        <option value="<?php echo $value->head_id?>"><?php echo $value->head_name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="phone" value="<?php echo set_value('phone'); ?>">
                            </div>
                            <label class="col-sm-2 control-label">Total Amount</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="total_amount" value="<?php echo set_value('total_amount'); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="title" value="<?php echo set_value('title'); ?>">
                            </div>
                            <label class="col-sm-2 control-label">Payment Method</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="pay_method" >
                                    <option value="none">-- Select Payment Method --</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Bank Check</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="date" value="<?php echo set_value('date'); ?>" required>
                            </div>
                            <label class="col-sm-2 control-label">Identity</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="identity" placeholder="If payment method is Bank Check" value="<?php echo set_value('identity'); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" rows="3" name="description" value="<?php echo set_value('description'); ?>" required></textarea>
                            </div>
                            
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <button class="btn btn-w-m btn-primary" type="submit">Save</button>
                                <a href="<?php echo site_url() ;?>" class="btn btn-w-m btn-primary">Cancel</a>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>