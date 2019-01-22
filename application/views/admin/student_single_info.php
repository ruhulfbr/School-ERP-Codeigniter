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
		    	<div class="row">
		    		<div class="container">
						<div class="row">
					      	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 toppad" >
					   			<div class="panel panel-info">
						            <div class="panel-body">
					              		<div class="row">
					                		<div class="col-md-3 col-lg-3 " align="center">
					                			<img src="<?php echo base_url("resource/student_images/").$s_image; ?>" class="img-lg img-md img-rounded"><br>
					                			<strong>ID :<?php echo $s_id;?></strong>
					                		</div>
					                
					                		<div class=" col-md-9 col-lg-9 "> 
							                	<table class="table table-user-information">
							                    	<tbody>
							                      		<tr>
									                        <td>Full Name :</td>
									                        <td><?php echo $s_f_name;?></td>
							                      		</tr>
									                    <tr>
									                    	<td>Roll No :</td>
									                        <td><?php echo $s_roll;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Class :</td>
									                        <td><?php echo $s_class;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Section :</td>
									                        <td><?php echo $s_section;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Father Name :</td>
									                        <td><?php echo $fat_name;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Father Phone :</td>
									                        <td><?php echo $fat_mobile;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Mother Name :</td>
									                        <td><?php echo @$mot_name;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Mother Phone :</td>
									                        <td><?php echo @$mot_mobile;?></td>
									                    </tr>
									                    <!--<tr>-->
									                    <!--	<td>Present Address :</td>-->
									                    <!--    <td><?php echo @$s_pre_add;?></td>-->
									                    <!--</tr>-->
									                    <tr>
									                    	<td>Permanent Address :</td>
									                        <td><?php echo $s_per_add;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Student Date-of-birth :</td>
									                        <td><?php echo @$s_dob;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Student Sex :</td>
									                        <td><?php echo @$s_sex;?></td>
									                    </tr>
									                    <tr>
									                    	<td>Student Religion :</td>
									                        <td><?php echo @$s_reli;?></td>
									                    </tr>
									                    <!--<tr>-->
									                    <!--	<td>Login Email :</td>-->
									                    <!--    <td><?php echo @$email;?></td>-->
									                    <!--</tr>-->
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <br>
                                                                <a href="<?php echo site_url('student_information') ;?>" class="btn btn-w-m btn-primary" type="submit" name="submit" value="submit">Cancel</a>
                                                            </td>
                                                        </tr>
									                </tbody>
					                  			</table>
					                		</div>
					              		</div>
					            	</div>
					          	</div>
					        </div>
					    </div>
					</div>
				</div>
		    </div>


