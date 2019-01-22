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
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Admission Date Time </h5>
                </div>
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Date Time add</a></li>                          
                    <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Date Time Edit</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                           <?php echo form_open('admission_time_date_insert', 'class="form-horizontal"'); ?>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Exam Title</label>
                                <div class="col-sm-10">
                                    <input name="exam_title" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Application Start Date</label>
                                <div class="col-sm-3">
                                    <input name="application_start_date" class="form-control" type="date">
                                </div>

                                <label class="col-sm-3 control-label">Admission Date</label>
                                <div class="col-sm-3">
                                    <input name="admission_date" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                          <div class="form-group">
                                <label class="col-sm-2 control-label">Application End Date</label>
                                <div class="col-sm-3">
                                    <input name="application_end_date" class="form-control" type="date">
                                </div>

                                <label class="col-sm-3 control-label">Admission Time</label>
                                <div class="col-sm-3">
                                    <input name="admission_time" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <!-- <div class="form-group">
                                <div class="col-sm-6    ">
                                    <label class="col-sm-2 control-label">Admission Test Details</label>
                                    <textarea class="form-control">
                                        
                                    </textarea>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Admission Test Details</label>
                                <div class="col-sm-10">
                                    <textarea name="admission_test_details" class="form-control" type="text"></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary">Add Date Time</button>
                                </div>
                            </div>


                            <div class="form-group">

                              <?php if ( isset($runFALSE) ) { ?>
                                
                                <div class="alert alert-success">
                                  <?php echo $runFALSE; ?>
                                </div>
                              
                              <?php } ?>
                            </div>

                            <div class="form-group">

                              <?php if ( isset($success) ) { ?>
                                
                                <div class="alert alert-success">
                                  <?php echo $success; ?>
                                </div>
                              
                              <?php } ?>
                            </div>

                            <div class="form-group">

                              <?php if ( isset($errorInsert) ) { ?>
                                
                                <div class="alert alert-success">
                                  <?php echo $errorInsert; ?>
                                </div>
                              
                              <?php } ?>
                            </div>
                           <?php echo form_close(); ?>
                        </div>
                    </div>           
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
                            
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Admission test data </h5>
                        </div>
                        <div class="ibox-content" style="">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Exam Title</th>
                                    <th>Application Start Date</th>
                                    <th>Application End Date</th>
                                    <th>Admission Date</th>
                                    <th>Admission Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(@$ad_t_data){
                                    $no = 0;
                                    foreach ($ad_t_data as $value) { ?>
                                <tr>
                                    <td><?php echo $no = $no+1;?></td>
                                    <td><?php echo $value->exam_title;?></td>
                                    <td><?php echo $value->application_start_date;?></td>
                                    <td><?php echo $value->admission_date;?></td>
                                    <td><?php echo $value->application_end_date;?></td>
                                    <td><?php echo $value->admission_time;?></td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Exam Title</th>
                                        <th>Application Start Date</th>
                                        <th>Application End Date</th>
                                        <th>Admission Date</th>
                                        <th>Admission Time</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
    </div>
</div>