<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>
            <?php 
                $segment_= $this->uri->segment(1);
                    echo "Single attendence"; 
            ?>
         </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url("dashboard") ?>">Dashboard</a>
            </li>
            <li class="active">
                <strong>
                    <?php 
                        echo "Single attendence"; 
                    ?>
                </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Attendence data </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Entry</th>
                                <th>Exit</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($attendence_data as $key => $value) {?>
                                    <tr>
                                        <td><span class="line"><?php echo $value->s_id;?></span></td>
                                        <td><?php echo $value->s_name;?></td>
                                        <td><?php echo $value->class_name;?></td>
                                        <td><?php echo $value->section_name;?></td>
                                        <td><?php echo $value->entry_time;?></td>
                                        <td><?php echo $value->exit_time;?></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>