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
                <th>Title</th>
                <th>Account Head</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Identity</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $no=0;
                foreach($payment_logs as $value){
                    $no++; ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $value->title;?></td>
                    <td><?php echo $value->head_name;?></td>
                    <td><?php echo $value->amount;?></td>
                    <td><?php echo $value->description;?></td>
                    <td><?php echo $value->identity;?></td>
                    <td><?php echo date("d-m-Y", strtotime($value->date));?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Account Head</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Identity</th>
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