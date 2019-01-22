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
                        <img alt="image" class="img-circle" src="<?php echo base_url('resource/img/school_logo.png') ?>" height="48" width="48">
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('name'); ?></strong>
                         <b class="caret"></b></span>
                         </span> 
                         </a>
                    <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo site_url("teacher_profile/".$id = $this->session->userdata('current_user_id')); ?>">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                    </ul> -->
                </div>
                <div class="logo-element">
                    DBN
                </div>
            </li>
            <li class="active">
                <a href="<?php echo base_url('school_admin_dashboard') ?>"><i class="fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span></a>
            </li>

            <li <?php if($uri == 'teacher_and_staff') {echo 'class="active"';}elseif ($uri == 'add_teacher') {echo 'class="active"';}?>>
                <a href="<?php echo base_url('teacher_and_staff') ?>"><i class="fa fa-user-o"></i> <span class="nav-label">Teacher & Stuff</span></a>
            </li>

            <li <?php if($uri == 'teacher_attendence') echo 'class="active"';?>>
              <a href="<?php echo base_url('teacher_attendence') ?>"><i class="fa fa-bar-chart"></i><span class="nav-label">Teacher Attendance</span></a>
            </li>

        </ul>

    </div>
</nav>