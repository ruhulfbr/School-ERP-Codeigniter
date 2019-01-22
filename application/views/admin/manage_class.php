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
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <?php if(validation_errors()){?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                    <strong><?php echo validation_errors(); ?></strong>
                </div>
                <?php }?>
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Classes</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Add Class</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Add Section</a></li>
                    </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Class ID</th>
                                            <th>Class Name</th>
                                            <th>Class Teacher</th>
                                            <th>Section</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(@$data){
                                            foreach ($data as $value) {?>
                                            <tr>
                                                <td><?php echo $value->id;?></td>
                                                <td><?php echo $value->class_name;?></td>
                                                <td><?php echo $value->class_teacher;?></td>
                                                <td>
                                                    <a href="<?php echo site_url("Admin_controller/get_section_name/".$value->id);?>" class="btn-sm btn btn-primary" data-toggle="modal" data-target="#secModal">
                                                        Sections
                                                    </a>
                                                    <div class="modal inmodal fade" id="secModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--<td>-->
                                                <!--    <a class="btn-sm btn btn-primary" href="<?php echo site_url("Class_controller/class_edit/".$value->id);?>"><span class="glyphicon glyphicon-pencil"></span>  EDIT</a>-->
                                                <!--</td>-->
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <?php echo form_open('insert_class', 'class="form-horizontal"'); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Class Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="class_name" value="<?php echo set_value('class_name'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Class Teacher</label>
                                    <div class="col-sm-6">
                                        <select  class="form-control" name="class_teacher">
                                            <option value="none">Select A Teacher</option>
                                            <?php 
                                            foreach ($teacher_data as $teacher_data) { ?>
                                            <option value="<?php echo $teacher_data->t_name;?>"><?php echo $teacher_data->t_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" name="submit" value="submit" type="submit">Save</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
                            <?php echo form_open('insert_section', 'class="form-horizontal"'); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Select Class</label>
                                    <div class="col-sm-6">
                                        <select  class="form-control" name="class">
                                            <option value="none">Select A Class</option>
                                            <?php 
                                            foreach ($data as $class_value) { ?>
                                            <option value="<?php echo $class_value->id;?>"><?php echo $class_value->class_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Section Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="section_name" value="<?php echo set_value('section_name'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Section Limit</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="section_limit" value="<?php echo set_value('section_limit'); ?>" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" name="submit" value="submit" type="submit">Save</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>                            
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
<?php if( $section_name == TRUE ){
?>
    $('#secModal').modal('show');
<?php 
}
?>
</script>
    