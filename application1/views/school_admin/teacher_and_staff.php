<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2"><br><br>
        <a href="<?php echo site_url('add_teacher'); ?>" class="btn-sm btn btn-primary pull-right" type="button"><i class="glyphicon glyphicon-plus"></i> Add Teacher</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <?php if(isset($success)){?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo $success; ?></strong>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Teacher & Staff Information</h5>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Blood</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(@$data){
                            $num = 0;
                            foreach ($data as $value) { $num = $num+1;
                        ?>
                        <tr>
                            <td><?php echo @$num;?></td>
                            <td><?php echo @$value->teacher_id;?></td>
                            <td>
                                <img class="img-sm img-rounded center-block" src="<?php echo base_url("resource/teacher_and_staff_images/").$value->t_image_path; ?>">
                            </td>
                            <td><?php echo $value->t_name;?></td>
                            <td><?php echo $value->t_blood_group;?></td>
                            <td><?php echo $value->t_phone;?></td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a target="_blank" href="<?php echo site_url("teacher_view/".$value->id);?>">View</a></li>
                                        <li><a target="_blank" href="<?php echo site_url("teacher_edit/".$value->id);?>">Edit</a></li>
                                        <li><a target="_blank" href="<?php echo site_url('teacher_data_delete/'.$value->id); ?>" onclick="return confirm('Are you sure?')">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php } } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Blood</th>
                            <th>Phone</th>
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