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
        <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="glyphicon glyphicon-plus"></i> Add TC</a>
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
                            <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Transfer Certificate</h3>

                                <?php echo form_open('insert_tc'); ?>
                                <div class="form-group">

                                    <div class="form-group">
                                        <select name="class" class="form-control" id='class_id'>
                                            <option value="none">Select Class</option>
                                            <?php
                                            foreach($class_data as $class){

                                                echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select id="sel_section" name="section" class="form-control">
                                            <option value="none">-- Select section --</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select id="sel_student" name="student_id" class="form-control">
                                            <option value="none">-- Select student --</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="date" name="date" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="details" class="form-control" placeholder="Reason"></textarea>
                                    </div>

                                </div>

                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" formtarget="_blank">
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
                                <th>#</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Reason</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(@$ex_student){
                                $no=0;
                                foreach ($ex_student as $value) {
                                    $no++; ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo @$value->s_f_name;?></td>
                                        <td><?php echo @$value->class_name;?></td>
                                        <td><?php echo @$value->date;?></td>
                                        <td><?php echo @$value->details;?></td>
                                    </tr>
                                <?php }}?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Reason</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
