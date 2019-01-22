<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <?php if($this->session->flashdata('error')){?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php }
                if(validation_errors()){?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                    <strong><?php echo validation_errors(); ?></strong>
                </div>
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <?php echo form_open('teacher_result_add', array('class'=>'jsform')); ?>
            
                <div class="col-sm-2">
                    <select name="class" class="form-control m-b" id='class_id'>
                        <option value="none">-- Select class --</option>
                        <?php
                            foreach($class_data as $class){

                                echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select id="sel_section" name="section" class="form-control m-b">
                        <option value="none">-- Select section --</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select id="sel_term" name="term" class="form-control m-b">
                        <option value="none">-- Select term --</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select id="sel_subject" name="subj" class="form-control m-b">
                        <option value="none">-- Select subject --</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="Get Student">
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
    <?php if (@$student_data) {
        $no=0;
        $i=0;
        echo form_open('teacher_result_submit');
    ?>
    <div class="row">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo @$s_f_name;?></h5>
                </div>
                <div class="ibox-content">
                    
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <!-- <th style="text-align: center;">No</th> -->
                            <th style="text-align: center;">Roll No</th>
                            <th style="text-align: left;">Subject</th>
                            <th style="text-align: center;">Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" name="term" value="<?php echo @$term;?>">
                                <?php
                                foreach (@$student_data as $student_data) {
                                    $id = $i++ ;
                                    $stu_id=$student_data->s_id;
                                    ?>
                                <tr>
                                    <input type="hidden" name="indx[]" value="<?php echo $student_data->s_id;?>">
                                    
                                    <input type="hidden" name="subject_id" value="<?php echo $subj;?>">

                                    <input type="hidden" name="student_id<?php echo $id; ?>" value="<?php echo $student_data->s_id;?>">

                                    <!-- <td style="text-align: center;"><?php echo $no=$no+1;?></td> -->
                                    <td style="text-align: center;"><?php echo $student_data->s_roll;?></td>
                                    <td style="text-align: left;"><?php echo $student_data->s_f_name;?></td>
                                    <td class="col-md-3">
                                        <input style="text-align: center;" type="text" name="mark<?php echo $id; ?>" placeholder="Marks" class="form-control" required>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                <strong>Submit</strong>
            </button>
            <?php echo form_close(); ?>
        </div>
    </div>
    <?php }?>
</div>