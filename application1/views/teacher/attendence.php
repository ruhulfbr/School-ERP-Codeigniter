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
                <?php echo form_open('teacher_attendence_search'); ?>
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
                    <label>Month</label>
                    <select class="form-control" name="month">
                        <option value="none">-- Month --</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label>Year</label>
                    <select class="form-control" name="year">
                        <option value="none">-- Year --</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <br>
                    <button class="btn btn-primary pull-right" type="submit" name="Submit">Get Student</button>
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
                          <th scope="col">1</th>
                          <th scope="col">2</th>
                          <th scope="col">3</th>
                          <th scope="col">4</th>
                          <th scope="col">5</th>
                          <th scope="col">6</th>
                          <th scope="col">7</th>
                          <th scope="col">8</th>
                          <th scope="col">9</th>
                          <th scope="col">10</th>
                          <th scope="col">11</th>
                          <th scope="col">12</th>
                          <th scope="col">13</th>
                          <th scope="col">14</th>
                          <th scope="col">15</th>
                          <th scope="col">16</th>
                          <th scope="col">17</th>
                          <th scope="col">18</th>
                          <th scope="col">19</th>
                          <th scope="col">20</th>
                          <th scope="col">21</th>
                          <th scope="col">22</th>
                          <th scope="col">23</th>
                          <th scope="col">24</th>
                          <th scope="col">25</th>
                          <th scope="col">26</th>
                          <th scope="col">27</th>
                          <th scope="col">28</th>
                          <th scope="col">29</th>
                          <th scope="col">30</th>
                          <th scope="col">31</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          if (@$student_model_view) {

                          $month = $this->input->post('month');
                          $year = $this->input->post('year');

                          $student = @$student_model_view->student_data($post);
                          foreach ($student as $student) { 
                           $st_id =  $student->s_id; ?>
                       <tr>
                        <th><?php echo @$student->s_roll;?></th>
                        <th scope="row"><?php echo @$student->s_f_name;?></th>
                      <?php 
                        for ($x = 1; $x <= 31; $x++) {
                            $xy=$x+1;
                        $from = $year."-".$month."-".$x;
                        $to = $year."-".$month."-".$xy;
                        $fromstr = strtotime($from);

                      $student_data = @$machine_model_view->entry_logs_search($from,$to,$st_id); 

                        if ($student_data>0) { ?>
                          <td>&#10003;</td>
                          <?php 
                        }else{ ?>
                          <td>&#x2715;</td>
                          <?php }}}?>
                        </tr>
                      </tbody>
                      <?php }?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
