<?php include 'header_link.php'; ?>

    <?php include 'navigation.php'; ?>

        <?php include 'header.php'; ?>

		    <div class="wrapper wrapper-content">
		    	
		    	<div class="row">

		    		<?php if($this->session->flashdata('section_delet')){?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                            <strong><?php echo $this->session->flashdata('section_delet'); ?></strong>
                        </div>
                    <?php }?>

		    		<div class="col-lg-8">
		                <div class="ibox float-e-margins">
		                    <div class="ibox-title">
		                        <h5>Sections</h5>
		                    </div>
		                    <div class="ibox-content">

		                        <table class="table">
		                            <thead>
			                            <tr>
			                                <th>#</th>
			                                <th>Section Name</th>
			                                <th>Student Number</th>
			                                <th>Student Limit</th>
			                                <th>Action</th>
			                            </tr>
		                            </thead>
		                            <tbody>
		                            	<?php
		                            	$num = 0;
										foreach ($section_data as $value) {?>
			                            <tr>
			                                <td><?php echo $num =  $num+1; ?></td>
			                                <td><?php echo $value->section_name; ?></td>
			                                <td><?php echo $value->student_number; ?></td>
			                                <td><?php echo $value->section_limit; ?></td>
			                                <td>
			                                	<a class="btn-sm btn btn-primary" href="<?php echo base_url(); ?>Class_controller/edit_sestion/<?php echo $value->id; ?>"><span class="glyphicon glyphicon-pencil"></span>  EDIT</a>

                                             	<a class="btn-sm btn btn-danger" href="<?php echo base_url(); ?>Class_controller/delet_sestion/<?php echo $value->id; ?>"><span class="glyphicon glyphicon-trash"></span>  Delete</a>
                                            </td>
			                            </tr>
			                            <?php }?>
		                            </tbody>
		                        </table>

		                    </div>
		                </div>
		            </div>

		    	</div>
		    </div>

            <?php include 'footer.php'; ?>

        </div>


    </div>
<?php include 'footer_link.php'; ?>

<!-- If this page need any js, put it here -->

 
</body>
</html>

