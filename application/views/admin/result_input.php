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
                <?php echo form_open('input_result_search', array('class'=>'jsform')); ?>
            
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
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th data-toggle="true">Student Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Add</th>
                                <th>Update</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(@$student_data){
                                    foreach ($student_data as $value) { ?>
                                    <tr>
                                        <td><?php echo $value->s_id;?></td>
                                        <td><?php echo $value->s_f_name;?></td>
                                        <td><?php echo $value->class_name;?></td>
                                        <td><?php echo $value->section_name;?></td>
                                        <td>
                                            <a target="_blank" class="btn btn-primary" href="<?php echo base_url('Result_controller/insert_result?cl=');echo $value->s_class;echo "&trm=";echo $term;echo "&sid="; echo $value->s_id;?>">Add</a>
                                            <!-- <select onchange="window.open(this.value)"">
                                                <option>Select term</option>
                                                <option value="<?php echo base_url('insert_result?cl=');echo $value->s_class;echo "&trm=1";echo "&sid="; echo $value->s_id;?>">First</option>
                                                <option>Secend</option>
                                                <option>Third</option>
                                            </select> -->
                                        </td>
                                        <td>
                                            <a target="_blank" class="btn btn-warning" href="<?php echo base_url('Result_controller/update_result?cl=');echo $value->s_class;echo "&trm=";echo $term;echo "&sid="; echo $value->s_id;?>">Update</a>
                                        </td>
                                    </tr>
                                <?php }}?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Student ID</th>
                                <th data-toggle="true">Student Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Add</th>
                                <th>Update</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>