
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
    <?php }
    if($this->session->flashdata('error_mes')){?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
            <strong><?php echo $this->session->flashdata('error_mes'); ?></strong>
        </div>
    <?php }
    echo form_open('confirm_applicants');?>
    
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <?php
                $all_checked = false;

                if (!empty($_GET['all_checked']))
                    $all_checked = true;
                ?>
                <th class="text-center"><a href="?all_checked=1"><label>Mark All</label></a></th>
                <th>SL.</th>
                <th>Group</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Number</th>
                <th>Quota</th>
            </tr>
            </thead>
            <tbody>
                <?php $num = 0;
                foreach ($approved_application as $value) { $num++; ?>
                <tr>
                    <td class="text-center"><?php if ($all_checked == true){ ?>
                            <div class="i-checks"><label> <input type="checkbox" name="checkbox_id[]" value="<?php echo @$value->id;?>" checked="checked"/> <i></i> </label></div>
                            <?php }else{?>
                                <div class="i-checks"><label> <input type="checkbox" name="checkbox_id[]" value="<?php echo @$value->id;?>"/> <i></i> </label></div>
                            <?php }?>
                    </td>
                    <td><?php echo @$num;?></td>
                    <td><?php echo @$value->ad_group;?></td>
                    <td><?php echo @$value->name;?></td>
                    <td><?php echo @$value->gender;?></td>
                    <td><?php echo @$value->mobile;?></td>
                    <td><?php echo @$value->quota;?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th class="text-center"><a href="?all_checked=1">Mark All</a></th>
                <th>SL.</th>
                <th>Group</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Number</th>
                <th>Quota</th>

            </tr>
            </tfoot>
        </table>
    </div>
    <button type="submit" class="btn btn-w-m btn-primary">Confirm</button>
    <?php echo form_close(); ?>
    </div>
    </div>
    </div>
    </div>
</div>