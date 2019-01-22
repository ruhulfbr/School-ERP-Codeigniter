
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
                                                <img src="<?php echo base_url("resource/teacher_and_staff_images/"); echo $teacher_info->t_image_path;?>" class="img-lg img-md img-rounded"><br>
                                                <strong>ID :<?php echo $teacher_info->teacher_id;?></strong>
                                            </div>
                                    
                                            <div class=" col-md-9 col-lg-9 "> 
                                                <table class="table table-user-information">
                                                    <tbody>
                                                        <tr>
                                                            <td>Name :</td>
                                                            <td><?php echo $teacher_info->t_name;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Birth :</td>
                                                            <td><?php echo $teacher_info->t_dob;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender :</td>
                                                            <td><?php echo $teacher_info->t_sex;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Religion :</td>
                                                            <td><?php echo $teacher_info->t_religion;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Blood Group :</td>
                                                            <td><?php echo $teacher_info->t_blood_group;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address :</td>
                                                            <td><?php echo $teacher_info->t_present_address;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone :</td>
                                                            <td><?php echo $teacher_info->t_phone;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <br>
                                                                <a href="<?php echo site_url('teacher_and_staff') ;?>" class="btn btn-w-m btn-primary" type="submit" name="submit" value="submit">Cancel</a>
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