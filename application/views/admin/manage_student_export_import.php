<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url("Admin_controller") ?>">Dashboard</a>
            </li>
            <li class="active">
                <strong>Export Import</strong>
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
                <h5>Export Data</h5>
            </div>
            <div class="ibox-content">
                <?php echo form_open('Admin_controller/download_samplpe'); ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                        	<select class="form-control m-b" name="table_name">
                                <option value="1">Student</option>
                                <option value="2">Teacher</option>
                            </select>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <button class="btn btn-primary" type="submit" name="download">Download Data</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Upload Data</h5>
            </div>
            <div class="ibox-content">
                <?php echo form_open_multipart('Admin_controller/import_data'); ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                        	<select class="form-control m-b" name="table_f_up">
                                <option value="none">Select A Table</option>
                                <option value="1">Student</option>
                                <option value="2">Teacher</option>
                            </select>
                        </th>
                        <th><input type="file" class="form-control-file" name="csv_file" style="margin-top: 6px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-navy">
                            <button class="btn btn-primary" type="submit" name="import">Import</button>
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