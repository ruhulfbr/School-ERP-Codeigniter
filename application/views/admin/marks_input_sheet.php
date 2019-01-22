<?php include 'header_link.php'; ?>

    <?php include 'navigation.php'; ?>

        <?php include 'header.php'; ?>
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php $segment_= $this->uri->segment(2);
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
		    	
		    	<div class="row">

		    		<div class="col-sm-2">
	                    <select class="form-control m-b" name="account">
	                        <option>Select Term</option>
	                        <option>option 2</option>
	                        <option>option 3</option>
	                        <option>option 4</option>
	                    </select>
	                </div>
	                <div class="col-sm-2">
	                    <select class="form-control m-b" name="account">
	                        <option>Select Class</option>
	                        <option>option 2</option>
	                        <option>option 3</option>
	                        <option>option 4</option>
	                    </select>
	                </div>
	                <div class="col-sm-2">
	                    <select class="form-control m-b" name="account">
	                        <option>Select Section</option>
	                        <option>option 2</option>
	                        <option>option 3</option>
	                        <option>option 4</option>
	                    </select>
	                </div>
	                <div class="col-sm-2">
	                    <select class="form-control m-b" name="account">
	                        <option>Select Subject</option>
	                        <option>option 2</option>
	                        <option>option 3</option>
	                        <option>option 4</option>
	                    </select>
	                </div>
	                <div class="col-sm-2">
	                    <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Get Student</a>
	                </div>

	                <div class="col-lg-11">
		                <div class="ibox float-e-margins">
		                    <div class="ibox-title">
		                        <h5>Student Data</h5>
		                        <div class="ibox-tools">
		                            <a class="collapse-link">
		                                <i class="fa fa-chevron-up"></i>
		                            </a>
		                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		                                <i class="fa fa-wrench"></i>
		                            </a>
		                            <ul class="dropdown-menu dropdown-user">
		                                <li><a href="#">Config option 1</a>
		                                </li>
		                                <li><a href="#">Config option 2</a>
		                                </li>
		                            </ul>
		                            <a class="close-link">
		                                <i class="fa fa-times"></i>
		                            </a>
		                        </div>
		                    </div>
		                    <div class="ibox-content">

		                        <table class="table">
		                            <thead>
		                            <tr>
		                                <th>Roll</th>
		                                <th>Name</th>
		                                <th>Subject</th>
		                                <th>Marks</th>
		                                <th>Grade</th>
		                            </tr>
		                            </thead>
		                            <tbody>
			                            <tr>
			                                <td>1</td>
			                                <td>Rohima Aktar</td>
			                                <td>Bangla</td>
			                                <td class="col-md-3"><input type="text" placeholder="Marks" class="form-control"></td>
			                                <td class="col-md-3"><input type="text" placeholder="Grads" class="form-control"></td>
			                            </tr>

			                            <tr>
			                                <td>1</td>
			                                <td>Rohima Aktar</td>
			                                <td>Bangla</td>
			                                <td class="col-md-3"><input type="text" placeholder="Marks" class="form-control"></td>
			                                <td class="col-md-3"><input type="text" placeholder="Grads" class="form-control"></td>
			                            </tr>

			                            <tr>
			                                <td>1</td>
			                                <td>Rohima Aktar</td>
			                                <td>Bangla</td>
			                                <td class="col-md-3"><input type="text" placeholder="Marks" class="form-control"></td>
			                                <td class="col-md-3"><input type="text" placeholder="Grads" class="form-control"></td>
			                            </tr>
		                            
		                            </tbody>
		                        </table>

		                    </div>
		                </div>


		                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
			                	<strong>Submit</strong>
			                </button>
		            </div>
		    		

		    	</div>
		    </div>

            <?php include 'footer.php'; ?>

        </div>
        
		<?php include 'right-sidebar.php'; ?>

    </div>
<?php include 'footer_link.php'; ?>


