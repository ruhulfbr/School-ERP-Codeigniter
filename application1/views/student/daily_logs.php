
			<link href="<?php echo base_url() ?>resource/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
		    <div class="wrapper wrapper-content">
		    	<?php echo form_open('daily_logs_search'); ?>
                <div class="col-sm-10">
                	<div class="col-sm-2">
                		<h3>From</h3>
                	</div>
                    <div class="col-sm-4">
	                    <input type="date" class="form-control m-b" name="from_date">
	                </div>
	                <div class="col-sm-2">
                		<h3>To</h3>
                	</div>
                    <div class="col-sm-4">
	                    <input type="date" class="form-control m-b" name="to_date">
	                </div>
                </div>
                <div class="col-sm-2">
                	<button class="btn btn-primary" type="submit" name="download">Search</button>
                </div>
                <?php echo form_close(); ?>
		    </div>

            <div class="row">
	                <div class="col-lg-12">
	                <div class="ibox float-e-margins">
	                    <div class="ibox-title">
	                        <h5>Daily Logs</h5>
	                    </div>
	                    <div class="ibox-content">

	                        <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover dataTables-example" >
	                    <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Person</th>
	                        <th>Class</th>
	                        <th>Section</th>
	                        <th>Entry Datetime</th>
	                        <th>Exit Datetime</th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                    	<?php
	                    	if (@$daily_logs) {
	                    	 	foreach ($daily_logs as $value) {
	                    	 	?>
		                    	<tr>
		                    		<td><?php echo $value->s_id;?></td>
		                    		<td><?php echo $value->s_name;?></td>
		                    		<td><?php echo $value->class_name;?></td>
		                    		<td><?php echo $value->section_name;?></td>
		                    		<td><?php echo $value->entry_time;?></td>
		                    		<td><?php echo $value->exit_time;?></td>
		                    	</tr>
	                    	 <?php } }?>
	                    </tbody>
	                    <tfoot>
	                    <tr>
	                        <th>ID</th>
	                        <th>Person</th>
	                        <th>Class</th>
	                        <th>Section</th>
	                        <th>Entry Datetime</th>
	                        <th>Exit Datetime</th>
	                    </tr>
	                    </tfoot>
	                    </table>
	                        </div>

	                    </div>
	                </div>
	            </div>
            </div>

    <!-- If this page need any js, put it here -->
    <script src="<?php echo base_url() ?>resource/js/plugins/dataTables/datatables.min.js"></script>
    <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function(){
                $('.dataTables-example').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        { extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {extend: 'print',
                         customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ]

                });

            });

    </script>
 
</body>
</html>


