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
                <a href="<?php echo base_url("dashboard") ?>">Dashboard</a>
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
<?php if(validation_errors()){?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
        <strong><?php echo validation_errors(); ?></strong>
    </div>
<?php }?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Sample</h5>
            </div>
            <div class="ibox-content">
                <a href="<?php echo base_url('download_student_sample');?>" class="btn btn-primary">Download</a>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Upload Data</h5>
            </div>
            <div class="ibox-content">
                <?php echo form_open_multipart('bulk_student_insert'); ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><input type="file" class="form-control-file" name="file"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <button class="btn btn-primary" type="submit" name="import">Upload</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    </div>
</div>