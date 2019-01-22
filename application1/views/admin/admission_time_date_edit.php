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
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Date Time add</a></li>                          
                            <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Date Time Edit</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                   <?php echo form_open('online_admission_controller/admission_time_date_insert', 'class="form-horizontal"'); ?>
                                    <div class="form-group"><label class="col-sm-2 control-label">Class Name</label>
                                        <div class="col-sm-10">
                                            <select name="class_name" class="form-control m-b">
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
                                            <input name="admission_date" class="form-control" type="date">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>                                  
                                    <div class="form-group"><label class="col-sm-2 control-label">Admission Time Start</label>
                                        <div class="col-sm-10">
                                            <input name="admission_time_start" class="form-control" type="time">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                  <div class="form-group"><label class="col-sm-2 control-label">Admission Time End</label>
                                        <div class="col-sm-10">
                                            <input name="admission_time_end" class="form-control" type="time">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary">Save changes</button>
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
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                   <form method="get" class="form-horizontal">
                                    <div class="form-group"><label class="col-sm-2 control-label">Designation</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="account">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>                                       
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">Save changes</button>
                                        </div>
                                    </div>
                                   </form>
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
                                                    <?php foreach ($date_time_data as $date_time_data_view): ?>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <?php echo $date_time_data_view['class_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $date_time_data_view['admission_date']; ?> 
                                                        </td>
                                                        <td>
                                                            <?php echo $date_time_data_view['admission_time_start']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $date_time_data_view['admission_time_end']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo site_url('online_admission_controller/admission_time_date_edit/'.$date_time_data_view['id']); ?>" class="btn btn-info " type="button"><i class="fa fa-paste"></i> Post/Edit</a>
                                                        </td>
                                                        <td>
                                                            <button class="btn-sm btn btn-danger" type="button" data-toggle="button"><span class="glyphicon glyphicon-trash"></span>  Delete</button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
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
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'right-sidebar.php'; ?>
    </div>
<?php include 'footer_link.php'; ?>
    