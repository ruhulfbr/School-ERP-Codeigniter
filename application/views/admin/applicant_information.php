<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(1);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard') ?>">Dashboard</a>
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
                                <div class="col-md-2 col-lg-2" align="center">
                                    <img src="<?php echo base_url("resource/uploaded_data/").$applicant_data->file;?>" class="img-lg img-md img-rounded">
                                    <br>
                                </div>
                        
                                <div class=" col-md-9 col-lg-9 "> 
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>Applicant Name :</td>
                                                <td><?php echo $applicant_data->name;?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender :</td>
                                                <td><?php echo $applicant_data->gender;?></td>
                                            </tr>
                                            <tr>
                                                <td>Bloodgroup :</td>
                                                <td><?php echo $applicant_data->bloodgroup;?></td>
                                            </tr>
                                            <tr>
                                                <td>Religion :</td>
                                                <td><?php echo $applicant_data->religion;?></td>
                                            </tr>
                                            <tr>
                                                <td>Nationality :</td>
                                                <td><?php echo $applicant_data->nationality;?></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth :</td>
                                                <td><?php echo $applicant_data->dob;?></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile :</td>
                                                <td><?php echo $applicant_data->mobile;?></td>
                                            </tr>
                                            <tr>
                                                <td>Quota :</td>
                                                <td><?php echo $applicant_data->quota;?></td>
                                            </tr>
                                            <tr>
                                                <td>Father :</td>
                                                <td><?php echo $applicant_data->father;?></td>
                                            </tr>
                                            <tr>
                                                <td>Father profession :</td>
                                                <td><?php echo $applicant_data->father_profession;?></td>
                                            </tr>
                                            <tr>
                                                <td>Father national ID :</td>
                                                <td><?php echo $applicant_data->father_nationalID;?></td>
                                            </tr>
                                            <tr>
                                                <td>Mother :</td>
                                                <td><?php echo $applicant_data->mother;?></td>
                                            </tr>
                                            <tr>
                                                <td>Mother profession :</td>
                                                <td><?php echo $applicant_data->mother_profession;?></td>
                                            </tr>
                                            <tr>
                                                <td>Mother national ID :</td>
                                                <td><?php echo $applicant_data->mother_nationalID;?></td>
                                            </tr>
                                            <tr>
                                                <td>Guardian mobile :</td>
                                                <td><?php echo $applicant_data->gmobile;?></td>
                                            </tr>
                                            <tr>
                                                <td>Email :</td>
                                                <td><?php echo $applicant_data->email;?></td>
                                            </tr>
                                            <tr>
                                                <td>Post Office :</td>
                                                <td><?php echo $applicant_data->postOffice;?></td>
                                            </tr>
                                            <tr>
                                                <td>Annual income :</td>
                                                <td><?php echo $applicant_data->annualincome;?></td>
                                            </tr>
                                            <tr>
                                                <td>Local guardian :</td>
                                                <td><?php echo $applicant_data->localguardian;?></td>
                                            </tr>
                                            <tr>
                                                <td>Local guardian district :</td>
                                                <td><?php echo $applicant_data->localguardian_district;?></td>
                                            </tr>
                                            <tr>
                                                <td>Relation (with) :</td>
                                                <td><?php echo $applicant_data->yourrelation;?></td>
                                            </tr>
                                            <tr>
                                                <td>Thana upozila :</td>
                                                <td><?php echo $applicant_data->thana_upojela;?></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Of Local guardian :</td>
                                                <td><?php echo $applicant_data->mobileOfLG;?></td>
                                            </tr>
                                            <tr>
                                                <td>Address :</td>
                                                <td><?php echo $applicant_data->homeaddress;?></td>
                                            </tr>
                                            <tr>
                                                <td>Last exam :</td>
                                                <td><?php echo $applicant_data->nameOfExam;?></td>
                                            </tr>
                                            <tr>
                                                <td>Exam roll :</td>
                                                <td><?php echo $applicant_data->examroll;?></td>
                                            </tr>
                                            <tr>
                                                <td>Passing year :</td>
                                                <td><?php echo $applicant_data->passingYear;?></td>
                                            </tr>
                                            <tr>
                                                <td>Registration No :</td>
                                                <td><?php echo $applicant_data->registrationNo;?></td>
                                            </tr>
                                            <tr>
                                                <td>Board :</td>
                                                <td><?php echo $applicant_data->board;?></td>
                                            </tr>
                                            <tr>
                                                <td>GPA :</td>
                                                <td><?php echo $applicant_data->GPA;?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <br>
                                                    <a href="<?php echo base_url('applicant_decision?id=');echo $applicant_data->id;echo "&decision="; echo "1";?>" class="btn btn-w-m btn-primary">Approve</a>
                                                    <a href="<?php echo base_url('applicant_decision?id=');echo $applicant_data->id;echo "&decision="; echo "2";?>" class="btn btn-w-m btn-primary">Disapprove</a>
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