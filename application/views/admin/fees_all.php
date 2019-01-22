<?php include 'header_link.php'; ?>

    <?php include 'navigation.php'; ?>

        <?php include 'header.php'; ?>

		    <div class="wrapper wrapper-content">
		    	
		    	<div class="row">

	                <button data-toggle="modal" href="#modal-form" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                        <strong>Add Fee</strong>
                    </button>

	                <div id="modal-form" class="modal fade" aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Routine</h3>

                                        <form role="form">
                                            <div class="form-group">

                                                <div class="form-group">
	                                            	<input type="text" class="form-control" placeholder="Fee Title">
	                                            </div>

	                                            <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Fee Type">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Amount">
                                                </div>

                                            </div>
                                            
                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                            	<strong>Save</strong>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>All Fees</h5>
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
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>School fee</td>
                                    <td>Monthly</td>
                                    <td>8000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Transport</td>
                                    <td>Monthly</td>
                                    <td>5000</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>                
			    
			    </div>
		    </div>

            <?php include 'footer.php'; ?>

        </div>
        
		<?php include 'right-sidebar.php'; ?>

    </div>
<?php include 'footer_link.php'; ?>


