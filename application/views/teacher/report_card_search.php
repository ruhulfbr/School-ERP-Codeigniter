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
<div class="wrapper wrapper-content">
                
    <div class="row">
        <?php 
            if(validation_errors()){?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo validation_errors(); ?></strong>
            </div>
        <?php }?>

        <?php 
            if($this->session->flashdata('error')){?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
            </div>
        <?php }?>

        <div class="col-lg-12">
            <div class="ibox">
                <?php echo form_open('teacher_report_card_search'); ?>
            
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
                    <input type="submit" class="btn btn-primary" name="submit" value="Get Student">
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Sectiom</th>
                <th>Contect</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
                <?php if(@$student_data){
                    foreach ($student_data as $value) { ?>
                    <tr>
                        <td><?php echo $value->s_id;?></td>
                        <td>
                            <img class="img-sm img-rounded center-block" src="<?php echo base_url("resource/student_images/").@$value->s_image; ?>">
                            <!--<?php echo @$value->id;?>-->
                        </td>
                        <td><?php echo @$value->s_f_name;?></td>
                        <td><?php echo @$value->class_name;?></td>
                        <td><?php echo @$value->section_name;?></td>
                        <td><?php echo @$value->fat_mobile;?></td>
                        <td>
                            <a target="_blank" href="<?php echo base_url('Teacher_role_controller/report_card_view?s_id=');echo @$value->s_id;echo "&trm=";echo $term;echo "&class_id=";echo $value->s_class;?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php }}?>
            </tbody>
            <tfoot>
            <tr>
                <th>Roll</th>
                <th>Photo</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Sectiom</th>
                <th>Contect</th>
                <th>View</th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>

    </div>
</div>


