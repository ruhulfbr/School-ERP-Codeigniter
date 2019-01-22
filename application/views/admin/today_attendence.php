<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>
            <?php 
                $segment_= $this->uri->segment(1);
                    echo  humanize($segment_); 
            ?>
         </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url("admin_controller") ?>">Dashboard</a>
            </li>
            <li class="active">
                <strong>
                    <?php 
                        $segment_= $this->uri->segment(1); 
                            echo  humanize($segment_); 
                    ?>
                </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <?php if(validation_errors()){?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
            <strong><?php echo validation_errors(); ?></strong>
        </div>
    <?php }?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <?php echo form_open('today_attendence_search'); ?>
                <div class="col-sm-3">
                    <label>Class</label>
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
                    <label>Section</label>
                    <select id="sel_section" name="section" class="form-control">
                        <option value="none">-- Select section --</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <br>
                    <button class="btn btn-primary pull-right" type="submit" name="Submit">Search</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
        <div class="">
            <div class="ibox">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                      <thead>
                        <tr>
                          <th scope="col">Roll</th>
                          <th scope="col">Student</th>
                          <th scope="col">Class</th>
                          <th scope="col">Section</th>
                          <th scope="col">Attendence</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          if (@$Student_model_view) {

                          
                          $student = $Student_model_view->student_data($post);
                          foreach ($student as $student) {
                            $student_id = $student->s_id;

                            $dt = new DateTime();
                            $today = $dt->format('Y-m-d');
                            $t_date = explode("-", $today);
                            $array = array();
                            foreach ($t_date as $value) {
                              array_push($array, $value);
                            }
                            $day = $value+'1';
                            $to_date = $array['0'].'-'.$array['1'].'-'.$day;

                            $attendence = $Machine_model_view->today_attendence_search($today,$to_date,$student_id); ?>
                            <tr>
                              <td><?php echo $student->s_roll; ?></td>
                              <td><?php echo $student->s_f_name; ?></td>
                              <td><?php echo $student->class_name; ?></td>
                              <td><?php echo $student->section_name; ?></td>

                        <?php if ($attendence>0) { ?>
                          <td>&#10003;</td>
                          <?php 
                        }else{ ?>
                          <td>&#x2715;</td>
                      <?php }?>
                      </tr>
                    </tbody>
                    <?php }}?>
                  </table>
              </div>
            </div>
        </div>
    </div>
</div>
