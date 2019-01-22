<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('account_dashboard') ?>">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>#</th>
                <th>Invoice ID</th>
                <th>Title</th>
                <th>Account Head</th>
                <th>Total Amount</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $no=0;
                foreach($unpaid_logs as $value){
                    $no++; ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $value->inv_id;?></td>
                    <td><?php echo $value->title;?></td>
                    <td><?php echo $value->head_name;?></td>
                    <td><?php echo $value->total_amount;?></td>
                    <td><?php echo date("d-m-Y", strtotime($value->date));?></td>
                    <td>
                        <a onclick="return confirm('Are you sure want to make this invoice paid ?');" class="btn btn-primary btn-rounded" href="<?php echo base_url('invoice_st_cng/').$value->inv_num;?>">Paid</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Invoice ID</th>
                <th>Title</th>
                <th>Account Head</th>
                <th>Total Amount</th>
                <th>Date</th>
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