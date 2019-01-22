<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Calendar </h5>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">
                        <?php 
                            $datestring = '%d - %m - %Y';
                            echo mdate($datestring);
                        ?>
                    </span>
                    <h5>Teacher/Staff</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $Teacher_num;?></h1>
                    <small>Total Teacher/Staff</small>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">
                        <?php 
                            $datestring = '%d - %m - %Y';
                            echo mdate($datestring);
                        ?>
                    </span>
                    <h5>Student</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $Student_num;?></h1>
                    <small>Total Student</small>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>SMS</h5>
                    <!-- <h5>Available SMS</h5> -->
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">
                    	<?php echo $sms_balence;?>
                    </h1>
                    <small>Available</small>
                    <!-- <small>SMS rate : 0.30P</small> -->
                </div>
            </div>
        </div>
    </div>
</div>



    