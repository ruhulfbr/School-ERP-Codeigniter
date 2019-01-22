<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url("dashboard") ?>">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2"><br><br>
        <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="glyphicon glyphicon-plus"></i> Add Subject</a>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <?php if($this->session->flashdata('subject_delet')){ ?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo $this->session->flashdata('subject_delet'); ?></strong>
            </div>
        <?php } if($this->session->flashdata('validation_errors')){ ?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo $this->session->flashdata('validation_errors'); ?></strong>
            </div>
        <?php } ?>
        <div id="modal-form" class="modal fade" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Subject</h3>

                                <?php echo form_open('insert_subject'); ?>
                                    <div class="form-group">

                                        <div class="form-group">
                                            <select name="class" class="form-control">
                                                <option value="none">Select Class</option>
                                                <?php foreach ($class_data as $value) {?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->class_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" type="text" name="subject_name" value="<?php echo set_value('subject_name'); ?>" placeholder="Add Subject Name" required>
                                        </div>

                                        <div class="form-group">
                                            <select name="subject_type" class="form-control">
                                                <option value="none">Select Subject Type</option>
                                                <option value="1">Compulsory</option>
                                                <option value="2">Optional</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select name="full_marks" class="form-control">
                                                <option value="none">Select Full Marks</option>
                                                <option value="4">200</option>
                                                <option value="3">150</option>
                                                <option value="1">100</option>
                                                <option value="2">50</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select name="sub_mark" class="form-control">
                                                <option value="none">Select Subject Marks</option>
                                                <option value="1">100</option>
                                                <option value="2">70</option>
                                                <option value="3">50</option>
                                                <option value="4">40</option>
                                                <option value="5">30</option>
                                                <option value="6">25</option>
                                                <option value="7">20</option>
                                                <option value="8">10</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="subject_group" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                        <strong>Save</strong>
                                    </button>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
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
                <th>Subject code</th>
                <th>Subject</th>
                <th>Subject Type</th>
                <th>Subject Mark</th>
                <th>Class</th>
                <!-- <th>Action</th> -->
            </tr>
            </thead>
            <tbody>
                <?php if(@$subjects){
                    foreach ($subjects as $value) {?>
                    <tr>
                        <td><?php echo @$value->subject_id;?></td>
                        <td><?php echo @$value->subject_name;?></td>
                        <td><?php if($value->subject_type==1){ echo "Compulsory"; }elseif($value->subject_type==2){ echo "Optional"; } ;?></td>
                        <td><?php if($value->sub_mark==1){ echo "100"; }elseif($value->sub_mark==2){ echo "70"; }elseif($value->sub_mark==3){ echo "50"; }elseif($value->sub_mark==4){ echo "40"; }elseif($value->sub_mark==5){ echo "30"; }elseif($value->sub_mark==6){ echo "25"; }elseif($value->sub_mark==7){ echo "20"; }elseif($value->sub_mark==8){ echo "10"; } ;?></td>
                        <td><?php echo @$value->class_name;?></td>
                        <!-- <td>
                            <a class="btn btn-danger" href="<?php echo base_url("Class_controller/subject_delet/".$value->subject_id);?>" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                        </td> -->
                    </tr>
                <?php }}?>
            </tbody>
            <tfoot>
            <tr>
                <th>Subject code</th>
                <th>Subject</th>
                <th>Subject Type</th>
                <th>Subject Mark</th>
                <th>Class</th>
                <!-- <th>Action</th> -->
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
