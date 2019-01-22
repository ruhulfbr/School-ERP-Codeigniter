<?php include 'header_link.php'; ?>
    <?php include 'navigation.php'; ?>
        <?php include 'header.php'; ?>
            <div class="wrapper wrapper-content">
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Admission Date Time </h5>
                        </div>
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Date Time Edit</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                   <?php echo form_open('online_admission_controller/admission_exam_date_update/'.$exam_date_data_view['id'], 'class="form-horizontal"'); ?>
                                    <div class="form-group"><label class="col-sm-2 control-label">Class Name</label>
                                        <div class="col-sm-10">
                                            <select name="class_name" class="form-control m-b">
                                                <option><?php echo $exam_date_data_view['class_name']; ?></option>
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group"><label class="col-sm-2 control-label">Admission Date</label>
                                        <div class="col-sm-10">
                                            <input name="admission_exam_date" class="form-control" type="date" value="<?php echo date('Y-m-d',strtotime($exam_date_data_view["admission_exam_date"])) ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>                                  
                                    <div class="form-group"><label class="col-sm-2 control-label">Admission Time Start</label>
                                        <div class="col-sm-10">
                                            <input name="admission_exam_time_start" class="form-control" type="time" value="<?php $admission_exam_date = date("H:i", strtotime($exam_date_data_view['admission_exam_time_start'])); echo "$admission_exam_date"; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                  <div class="form-group"><label class="col-sm-2 control-label">Admission Time End</label>
                                        <div class="col-sm-10">
                                            <input name="admission_exam_time_end" class="form-control" type="time" value="<?php $admission_exam_date = date("H:i", strtotime($exam_date_data_view['admission_exam_time_end'])); echo "$admission_exam_date"; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary">Update</button>
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
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'right-sidebar.php'; ?>
    </div>
<?php include 'footer_link.php'; ?>
    