<?php include 'header_link.php'; ?>
    <?php include 'navigation.php'; ?>
        <?php include 'header.php'; ?>
            <link href="<?php echo base_url() ?>resource/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
            <style type="text/css">
                .id-card-holder {
                    width: 225px;
                    padding: 4px;
                    margin: 0 auto;
                    background-color: #1f1f1f;
                    border-radius: 5px;
                    position: relative;
                }
                .id-card-holder:after {
                    content: '';
                    width: 7px;
                    display: block;
                    background-color: #0a0a0a;
                    height: 100px;
                    position: absolute;
                    top: 105px;
                    border-radius: 0 5px 5px 0;
                }
                .id-card-holder:before {
                    content: '';
                    width: 7px;
                    display: block;
                    background-color: #0a0a0a;
                    height: 100px;
                    position: absolute;
                    top: 105px;
                    left: 222px;
                    border-radius: 5px 0 0 5px;
                }
                .id-card {
                    
                    background-color: #fff;
                    padding: 10px;
                    border-radius: 10px;
                    text-align: center;
                    box-shadow: 0 0 1.5px 0px #b9b9b9;
                }
                .id-card img {
                    margin: 0 auto;
                }
                .header img {
                    width: 100px;
                    margin-top: 15px;
                }
                .id-card-photo img {
                    width: 80px;
                    margin-top: 15px;
                }
                .id-card-h2 {
                    font-size: 15px;
                    margin: 5px 0;
                }
                .id-card-h3 {
                    font-size: 12px;
                    margin: 2.5px 0;
                    font-weight: 300;
                }
                .id-card-qr-code img {
                    width: 50px;
                }
                .id-card-p {
                    font-size: 5px;
                    margin: 2px;
                }
            </style>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Manage Employ</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>Manage Employ</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <select class="form-control m-b" name="account">
                                <option>Select A Class</option>
                                <option><a href="<?php echo base_url() ?>admin_controller/student_admission">option 2</a></option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Print Option</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">
                                    Print All ID Card
                                </button>
                            </div>
                            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-print modal-icon"></i>
                                            <h4 class="modal-title">Employee ID Card</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="id-card-holder">
                                                <div class="id-card">
                                                    <div class="header">
                                                        <img src="<?php echo base_url() ?>resource/img/id-card-logo.png">
                                                    </div>
                                                    <div class="id-card-photo">
                                                        <img src="<?php echo base_url() ?>resource/img/id-card-picture.png">
                                                    </div>
                                                    <h2 class="id-card-h2">Mohammad Siam Ahmed</h2>
                                                    <div class="id-card-qr-code">
                                                        <img src="<?php echo base_url() ?>resource/img/id-card-barcode.png">
                                                    </div>
                                                    <h3 class="id-card-h3">www.dbnltd.com</h3>
                                                    <hr>

                                                    <p class="id-card-p"><strong>DBN LTD.</strong>House-75, Flat-6B, Shah Mukhdum Avenue, <p class="id-card-p">
                                                    <p class="id-card-p">Sector-12 Uttara, Dhaka-1230</p>
                                                    <p class="id-card-p">Ph: +880-190-655-0000 | E-mail: info@dbnltd.com</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <a href="manage_employ_id_print" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print ID Card </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
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

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Employee Name</th>
                        <th>Father Name</th>
                        <th>Present Address</th>
                        <th>Group</th>
                        <th>Section</th>
                        <th>ID Card</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>GRS000</td>
                        <td></td>
                        <td>Mohammad Siam Ahmed</td>
                        <td>Md. Anarul Islam</td>
                        <td>Baimail Konabari, Gazipur.</td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal4">ID Card Print</button>
                            <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-print modal-icon"></i>
                                            <h4 class="modal-title">Student ID Card</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="id-card-holder">
                                                <div class="id-card">
                                                    <div class="header">
                                                        <img src="<?php echo base_url() ?>resource/img/id-card-logo.png">
                                                    </div>
                                                    <div class="id-card-photo">
                                                        <img src="<?php echo base_url() ?>resource/img/id-card-picture.png">
                                                    </div>
                                                    <h2 class="id-card-h2">Mohammad Siam Ahmed</h2>
                                                    <div class="id-card-qr-code">
                                                        <img src="<?php echo base_url() ?>resource/img/id-card-barcode.png">
                                                    </div>
                                                    <h3 class="id-card-h3">www.dbnltd.com</h3>
                                                    <hr>

                                                    <p class="id-card-p"><strong>DBN LTD.</strong>House-75, Flat-6B, Shah Mukhdum Avenue, <p class="id-card-p">
                                                    <p class="id-card-p">Sector-12 Uttara, Dhaka-1230</p>
                                                    <p class="id-card-p">Ph: +880-190-655-0000 | E-mail: info@dbnltd.com</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <a href="manage_employ_id_print" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print ID Card </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Marksheet</a></li>
                                    <li>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Present Address</th>
                        <th>Group</th>
                        <th>Section</th>
                        <th>ID Card</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>

        </div>
        </div>

    <?php include 'footer_link.php'; ?>