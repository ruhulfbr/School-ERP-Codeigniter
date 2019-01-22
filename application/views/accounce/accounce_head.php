<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url("account_dashboard") ?>">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2"><br><br>
        <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="glyphicon glyphicon-plus"></i> Add Head</a>
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
                            <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Head</h3>
                                <?php echo form_open('insert_acc_head'); ?>
                                    <div class="form-group">

                                        <div class="form-group">
                                            <select name="acc_type" class="form-control">
                                                <option value="1">Income</option>
                                                <option value="2">Expence</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" type="text" name="head_name" placeholder="Head Name" required>
                                        </div>

                                        <div class="form-group">
                                            <select name="acc_flow_type" class="form-control">
                                                <option value="In">In</option>
                                                <option value="Out">Out</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select name="acc_status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
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
                            <th>#</th>
                            <th>Account Type</th>
                            <th>Name</th>
                            <th>Flow Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(@$heads){
                                $no=0;
                                foreach ($heads as $value) {
                                    $no++; ?>
                                <tr>
                                    <td><?php echo @$no;?></td>
                                    <td><?php if($value->acc_type==1){ echo "Income"; }elseif($value->acc_type==2){ echo "Expence"; } ;?></td>
                                    <td><?php echo $value->head_name;?></td>
                                    <td><?php echo $value->acc_flow_type;?></td>
                                    <td><?php if ($value->acc_status==1) { ?>
                                        <span style="color: Green" >Active</span>
                                    <?php }else{ ?>
                                        <span style="color: Red" >Inactive</span>
                                    <?php } ?></td>
                                    <td> <a href="<?php echo base_url("head_status/").$value->head_id; ?>">Change</a> </td>
                                </tr>
                            <?php }}?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Account Type</th>
                            <th>Name</th>
                            <th>Flow Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
