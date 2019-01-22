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
                    <?php echo form_open('add_stu_payment', 'class="form-horizontal"'); ?>
                        <input type="hidden" name="rec_category" value="student">
                        <input type="hidden" name="curr_date" value="<?php 
                        $date = new DateTime("now");
                        echo $date->format('Y-m-d H:i:s');
                        ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Class</label>
                            <div class="col-sm-4">
                                <select name="class" class="form-control" id='class_id'>
                                    <option value="none">-- Select class --</option>
                                    <?php
                                        foreach($class_data as $class){

                                            echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
                                        }
                                    ?>
                                </select>

                            </div>
                            <label class="col-sm-2 control-label">Account</label>
                            <div class="col-sm-4">
                                <select name="account[]" class="form-control chosen-select">
                                    <option value="none"> -- Select Account --</option>
                                    <?php foreach ($account_head_income as $value) { ?>
                                        <option value="<?php echo $value->head_id?>"><?php echo $value->head_name?></option>
                                    <?php }?>
                                </select>
                    
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Section</label>
                            <div class="col-sm-4">
                                <select id="sel_section" name="section" class="form-control">
                                    <option value="none">-- Select section --</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Total Amount</label>
                            <div class="col-sm-4">
                                <div class="field_wrapper">
                                    <div>
                                        <input type="text" name="total_amount[]" class="form-control" value=""/>
                                        <a href="javascript:void(0);" class="add_button" title="Add field">Add new</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Student</label>
                            <div class="col-sm-4">
                                <select id="sel_student" name="student" class="form-control">
                                    <option value="none">-- Select Student --</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="status" >
                                    <option value="none">-- Select Status --</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Unpaid">Unpaid</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="title" placeholder="Title" value="<?php echo set_value('title'); ?>">
                            </div>
                            <label class="col-sm-2 control-label">Payment Method</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="pay_method" id="payment_method">
                                    <option value="none">-- Select Payment Method --</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Bank Check</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" rows="3" name="description" value="<?php echo set_value('description'); ?>"></textarea>
                            </div>
                            <label class="col-sm-2 control-label">Invoice Number</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="inv_num" placeholder="Invoice Number" value="<?php echo set_value('inv_num'); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="date" value="<?php echo set_value('date'); ?>">
                            </div>
                            <div class="fll">
                                
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <button class="btn btn-w-m btn-primary" type="submit">Create</button>
                                <a href="<?php echo site_url() ;?>" class="btn btn-w-m btn-primary">Cancel</a>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>