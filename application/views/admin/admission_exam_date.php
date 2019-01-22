
            <div class="wrapper wrapper-content">
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Admission Exam Date </h5>
                        </div>
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Date Time add</a></li>                          
                            <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Date Time Edit</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                   <?php echo form_open('online_admission_controller/admission_exam_date_insert', 'class="form-horizontal"'); ?>
                                    <div class="form-group"><label class="col-sm-2 control-label">Class Name</label>
                                        <div class="col-sm-10">
                                            <select name="class_name" class="form-control m-b">
                                                <option>Play (Sapla)</option>
                                                <option>Play (Golap)</option>
                                                <option>Nursary (Moina)</option>
                                                <option>Nursary (Tia)</option>
                                                <option>K.G (Podma)</option>
                                                <option>K.G (Meghna)</option>
                                                <option>One (Sorot)</option>
                                                <option>One (Hemonto)</option>
                                                <option>Two (Lal)</option>
                                                <option>Two (Sobuj)</option>
                                                <option>Three (Surma)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group"><label class="col-sm-2 control-label">Admission Date</label>
                                        <div class="col-sm-10">
                                            <input name="admission_exam_date" class="form-control" type="date">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>                                  
                                    <div class="form-group"><label class="col-sm-2 control-label">Admission Time Start</label>
                                        <div class="col-sm-10">
                                            <input name="admission_exam_time_start" class="form-control" type="time">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                  <div class="form-group"><label class="col-sm-2 control-label">Admission Time End</label>
                                        <div class="col-sm-10">
                                            <input name="admission_exam_time_end" class="form-control" type="time">
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
                                    <div class="col-lg-12">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Class Name</th>
                                                <th>Date</th>                                                     
                                                <th>Time Start</th>
                                                <th>Time End</th>   
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $i = $this->uri->segment(3); foreach ($exam_date_data as $exam_date_data_view){ $i++ ;
                                            ?>
                                            <tr id="<?php echo $exam_date_data_view['id']; ?>">
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <?php echo $exam_date_data_view['class_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $exam_date_data_view['admission_exam_date']; ?> 
                                                </td>
                                                <td>
                                                    <?php echo $exam_date_data_view['admission_exam_time_start']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $exam_date_data_view['admission_exam_time_end']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('online_admission_controller/admission_exam_date_view/'.$exam_date_data_view['id']); ?>" class="btn-sm btn btn-info " type="button"><i class="fa fa-paste"></i> Post/Edit</a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('online_admission_controller/admission_exam_date_delete/'.$exam_date_data_view['id']); ?>" onclick="return confirm('Are you sure?')" class="btn-sm btn btn-danger " type="button"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
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