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
        <div class="col-lg-8">
            <div class="ibox">
                <?php echo form_open('student_search'); ?>
                <div class="col-sm-5">
                    <select name="class" class="form-control" id='class_id'>
                        <option value="none">-- Select class --</option>
                        <?php
                            foreach($class_data as $class){

                                echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-5">
                    <select id="sel_section" name="section" class="form-control">
                        <option value="none">-- Select section --</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-primary pull-right" type="submit" name="Submit">View</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md"><?php echo $Student_num;?></h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> Total Students 
                    </h2>
                </div>
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
                <th>ID</th>
                <th>Photo</th>
                <th>Student Name</th>
                <th>Roll</th>
                <th>Class</th>
                <th>Section</th>
                <th>Contact</th>
                <th>Actions</th>
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
                        <td><?php echo @$value->s_roll;?></td>
                        <td><?php echo @$value->class_name;?></td>
                        <td><?php echo @$value->section_name;?></td>
                        <td><?php echo @$value->fat_mobile;?></td>
                        <td>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url("student_info/".$value->s_id);?>" target="_blank">View</a></li>
                                    <li><a href="<?php echo site_url("student_edit/".$value->s_id);?>" target="_blank">Edit</a></li>
                                    <!-- <li>
                                        <a href="<?php echo site_url('Student_controller/student_data_delete/'.$value->id); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                    </li> -->
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php }}?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Student Name</th>
                <th>Roll</th>
                <th>Class</th>
                <th>Section</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
     