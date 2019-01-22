<?Php 
$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
$uri = trim($uri, '/');?>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="<?php echo base_url('resource/teacher_and_staff_images/'.$this->session->userdata('avatar'));?>" height="48" width="48">
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('name'); ?></strong>
                         <b class="caret"></b></span>
                         </span> 
                         </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo site_url("teacher_profile/".$id = $this->session->userdata('current_user_id')); ?>">Profile</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    DBN
                </div>
            </li>
            <li class="active">
                <a href="<?php echo base_url('teacher_dashboard') ?>"><i class="fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span></a>
            </li>

            <li <?php if($uri == 'teacher_bulk_result_input') {echo 'class="active"';}elseif ($uri == 'teacher_report_card') {echo 'class="active"';}elseif ($uri == 'teacher_result_input') {echo 'class="active"';}?>>
                <a href="#"><i class="fa fa-calculator"></i> <span class="nav-label">Result</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li <?php if($uri == 'teacher_bulk_result_input') echo 'class="active"';?>>
                      <a href="<?php echo base_url('teacher_bulk_result_input') ?>"><i class="fa fa-file-text"></i>Bulk result Input</a>
                    </li>
                    <li <?php if($uri == 'teacher_result_input') echo 'class="active"';?>>
                      <a href="<?php echo base_url('teacher_result_input') ?>"><i class="fa fa-spinner"></i>Input Result</a>
                    </li>
                    <li <?php if($uri == 'teacher_report_card') echo 'class="active"';?>>
                      <a href="<?php echo base_url('teacher_report_card');?>"><i class="fa fa-edit"></i>Report Card</a>
                    </li>
                </ul>
            </li>
            <li <?php if($uri == 'teacher_single_attendence') echo 'class="active"';?>>
              <a href="<?php echo base_url('teacher_single_attendence') ?>"><i class="fa fa-bar-chart"></i>Attendance</a>
            </li>

            <!-- <li>
                <a href="<?php echo base_url('teacher_class_routine');?>"><i class="fa fa-bell-o"></i> <span class="nav-label">Class Routine</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-id-card-o"></i> <span class="nav-label">Manage Attendance</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo base_url('teacher_daily_logs') ?>"><i class="fa fa-id-badge"></i>Daily Logs</a></li>
                </ul>
            </li> -->
        </ul>

    </div>
</nav>