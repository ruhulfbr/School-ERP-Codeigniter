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
        <div class="ibox float-e-margins">
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>SL.</th>
                <th>Group</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Number</th>
                <th>Quota</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php if(@$final_application){
                    $num = 0;
                    foreach ($final_application as $value) { $num = $num+1; ?>
                    <tr>
                        <td><?php echo @$num;?></td>
                        <td><?php echo @$value->ad_group;?></td>
                        <td><?php echo @$value->name;?></td>
                        <td><?php echo @$value->gender;?></td>
                        <td><?php echo @$value->mobile;?></td>
                        <td><?php echo @$value->quota;?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url("applicant_information/".$value->id);?>">View</a>
                            </div>
                        </td>
                    </tr>
                <?php }}?>
            </tbody>
            <tfoot>
            <tr>
                <th>SL.</th>
                <th>Group</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Number</th>
                <th>Quota</th>
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
     