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
        <div class="col-lg-8">
            <div class="ibox">
                <?php echo form_open('asset_report_search'); ?>
                <div class="col-sm-5">
                    <select class="form-control" name="year">
                        <option value="">Select</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="month">
                        <option value="">Select</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-primary pull-right" type="submit" name="Submit">View</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
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
                <th>Amount</th>
                <th>Details</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
                <?php if(@$asset_data){ $no=0;
                    foreach ($asset_data as $value) { ?>
                    <tr>
                        <td><?php echo $no=$no+1;?></td>
                        <td><?php echo @$value->amount;?></td>
                        <td><?php echo @$value->details;?></td>
                        <td><?php echo @$value->day.'/'.$value->month.'/'.$value->year;?></td>
                    </tr>
                <?php }}?>
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Details</th>
                <th>Date</th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
     