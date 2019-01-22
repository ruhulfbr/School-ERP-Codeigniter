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
    <div class="col-lg-2"><br><br>
        <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="glyphicon glyphicon-plus"></i> Add Exam</a>
    </div>
</div>
<div class="wrapper wrapper-content">
	
	<div class="row">
        <div id="modal-form" class="modal fade" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Exam</h3>

                            <?php echo form_open('exam_add'); ?>
                                <div class="form-group">

                                	<div class="form-group">
                                        <select name="class" class="form-control" id='class_id'>
                                            <option value="none">-- Select class --</option>
                                            <option value="500">All class</option>
                                            <?php
                                                foreach($class_data as $class){

                                                    echo "<option value='".$class['id']."'>".$class['class_name']."</option>";
                                                }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                    	<input type="text" class="form-control" name="exam_name" placeholder="Exam Name" required>
                                    </div>

                                    <div class="form-group">
                                		<input type="date" class="form-control" name="exam_date" placeholder="Date" required>
                                	</div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="year" placeholder="Year" required>
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
                <th>ID</th>
                <th>Class Name</th>
                <th>Exam Name</th>
                <th>Exam Date</th>
                <th>Year</th>
                
            </tr>
            </thead>
            <tbody>
                <?php if(@$exam_data){
                    foreach ($exam_data as $value) { ?>
                    <tr>
                        <td><?php echo $value->exam_id;?></td>
                        <td><?php echo $value->class_name;?></td>
                        <td><?php echo $value->term_name;?></td>
                        <td><?php echo date("d-m-Y", strtotime($value->exam_date));?></td>
                        <td><?php echo $value->year;?></td>
                        
                    </tr>
                <?php }}?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Exam Name</th>
                <th>Exam Date</th>
                <th>Year</th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>

