<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <?php if($this->session->flashdata('success')){?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>SMS form <small></small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <?php echo form_open_multipart('send_sms'); ?>
                            <!-- <div class="form-group">
                                <label>Select Language:</label> 
                                <div class="i-checks"><label> <input type="radio" value="1" name="lng" id="receiver1"> <i></i> Bangla </label></div>
                                <span class="text-danger"><?php echo form_error('bangla'); ?></span>

                                <div class="i-checks"><label> <input type="radio" checked="" value="2" name="lng" id="receiver2"> <i></i> English </label></div>
                                <span class="text-danger"><?php echo form_error('english'); ?></span>
                            </div>

                            <div class="hr-line-dashed"></div> -->
                            <div class="form-group">
                                <label>Select Receiver Type:</label>

                                <div class="i-checks"><label> <input type="radio" value="1" name="receiver"> <i></i> All Student </label></div>
                                <span class="text-danger"><?php echo form_error('all_student'); ?></span>

                                <div class="i-checks"><label> <input type="radio" value="2" name="receiver"> <i></i> All Teacher </label></div>
                                <span class="text-danger"><?php echo form_error('all_teacher'); ?></span>

                                <div class="i-checks"><label> <input type="radio" value="3" checked name="receiver"> <i></i> Other </label></div>
                                <span class="text-danger"><?php echo form_error('other'); ?></span>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label>Other Receiver:</label> 
                                <input class="form-control" type="text" name="number" placeholder="Enter receiver number">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <h4>SMS Text</h4>
                                <div class="form-group">
                                    <div>
                                        <textarea class="form-control" rows="3" name="message_body" placeholder="" required></textarea>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Send SMS</strong></button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>