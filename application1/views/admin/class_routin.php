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
<?php echo form_open('routin_search'); 
if(validation_errors()){?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
        <strong><?php echo validation_errors(); ?></strong>
    </div>
<?php }?>
<div class="wrapper wrapper-content">
	<div class="col-sm-2">
        <select class="form-control m-b" name="day">
            <option value="none">-- Select Day --</option>
            <option value="1">Sunday</option>
            <option value="2">Monday</option>
            <option value="3">Tusday</option>
            <option value="4">Wednesday</option>
            <option value="5">Thursday</option>
            <option value="6">Friday</option>
            <option value="7">Saturday</option>
        </select>
    </div>
    <div class="col-sm-3">
        <select name="class" class="form-control" id='class_id'>
            <option value="none">-- Select class --</option>
            <?php
                foreach($class_data as $class){

                    echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
                }
            ?>
        </select>
    </div>
    <div class="col-sm-3">
        <select id="sel_section" name="section" class="form-control">
            <option value="none">-- Select section --</option>
        </select>
    </div>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-primary">Get Routine</button>
    </div>
    <?php echo form_close(); ?>
    <!-- <div class="col-sm-2">
        <a data-toggle="modal" class="btn btn-primary" href="<?php echo base_url('add_routine'); ?>">Add Routine</a>
    </div> -->

    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Routine</h5>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>
                                    9:00 AM - 10:00 AM
                                </th>
                                <th>
                                    10:00 AM - 11:00 AM
                                </th>
                                <th>
                                    11:00 AM - 12:00 PM
                                </th>
                                <th>
                                    12:00 PM - 13:00 PM
                                </th>
                                <th>
                                    13:00 PM - 14:00 PM
                                </th>
                                <th>
                                    14:00 PM - 15:00 PM
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                <th>Sunday</th>
                                <td>Bangla</td>
                                <td>English</td>
                                <td>Math</td>
                                <td>Religion</td>
                                <td>Science</td>
                                <td>Fitness</td>
                            </tr>
                            <tr>
                                <th>Monday</th>
                                <td>Bangla</td>
                                <td>English</td>
                                <td>Math</td>
                                <td>Religion</td>
                                <td>Science</td>
                                <td>Fitness</td>
                            </tr>
                            <tr>
                                <th>Tuesday</th>
                                <td>Bangla</td>
                                <td>English</td>
                                <td>Math</td>
                                <td>Religion</td>
                                <td>Science</td>
                                <td>Fitness</td>
                            </tr>
                            <tr>
                                <th>Wednesday</th>
                                <td>Bangla</td>
                                <td>English</td>
                                <td>Math</td>
                                <td>Religion</td>
                                <td>Science</td>
                                <td>Fitness</td>
                            </tr>
                            <tr>
                                <th>Thursday</th>
                                <td>Bangla</td>
                                <td>English</td>
                                <td>Math</td>
                                <td>Religion</td>
                                <td>Science</td>
                                <td>Fitness</td>
                            </tr>
                            <tr>
                                <th>Friday</th>
                                <td>Bangla</td>
                                <td>English</td>
                                <td>Math</td>
                                <td>Religion</td>
                                <td>Science</td>
                                <td>Fitness</td>
                            </tr>
                            <tr>
                                <th>Saturday </th>
                                <td>Bangla</td>
                                <td>English</td>
                                <td>Math</td>
                                <td>Religion</td>
                                <td>Science</td>
                                <td>Fitness</td>
                            </tr>

                            
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>

    </div>
</div>

