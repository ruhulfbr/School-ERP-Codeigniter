<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>admin_controller/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<br>
<div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Entry Logs</h5>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Card Number</th>
                <th>Logged Datetime</th>
            </tr>
            </thead>
            <tbody>
        	<?php
        	foreach ($entry_logs as $value){?>
            <tr>
                <td><?php echo @$value->user_id ;?></td>
                <td><?php echo @$value->id_card_number;?></td>
                <td><?php echo @$value->logged_time ;?></td>
            </tr>
            <?php
            }
			?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Card Number</th>
                <th>Logged Datetime</th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
</div>


