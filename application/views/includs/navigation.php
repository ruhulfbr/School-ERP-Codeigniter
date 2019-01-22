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
                        <img alt="image" class="img-circle" src="<?php echo base_url('resource/img/school_logo.png') ?>">
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('name'); ?></strong>
                         <b class="caret"></b></span>
                         </span> 
                         </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo site_url("profile/".$this->session->userdata('current_user_id')); ?>">Profile</a></li>
                        <!-- <li><a href="contacts.html">Contacts</a></li> -->
                        <!-- <li><a href="mailbox.html">Mailbox</a></li> -->
                    </ul>
                </div>
                <div class="logo-element">
                    DBN
                </div>
            </li>

            <li <?php if($uri == 'dashboard') echo 'class="active"';?>>
                <a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span></a>
            </li>
         <li>
           <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Manage Website</span><span class="fa arrow"></span></a>                
           <ul class="nav nav-second-level collapse">
               <li>
                   <a href="<?php echo base_url('slider_add') ?>">
                       Slider Add 
                   </a>
               </li>
               <li>
                   <a href="<?php echo base_url('breaking_news') ?>">
                       Breaking News 
                   </a>
               </li>
               <li>
                   <a href="<?php echo base_url('speech') ?>">
                       Speech 
                   </a>
               </li>
              <li>
                   <a href="<?php echo base_url('notics_board') ?>">
                       Notices Board 
                   </a>
               </li>
               <li>
                   <a href="<?php echo base_url('photo_gallery') ?>">
                       Photo Gallery 
                   </a>
               </li>
            </ul>
       </li>
        <li <?php if($uri == 'online_admission_add') {echo 'class="active"';}elseif ($uri == 'new_application') {echo 'class="active"';}elseif ($uri == 'approved_application') {echo 'class="active"';}elseif ($uri == 'final_application') {echo 'class="active"';}?>>
            <a href="#"><i class="fa fa-internet-explorer"></i> <span class="nav-label">Online Admission</span><span class="fa arrow"></span></a>
           <ul class="nav nav-second-level collapse">
               <li <?php if($uri == 'online_admission_add') echo 'class="active"';?>>
                   <a href="<?php echo base_url('online_admission_add'); ?>">
                       <i class="fa fa-user-plus"></i>Admission Time Date 
                   </a>
               </li>
               <li <?php if($uri == 'new_application') echo 'class="active"';?>>
                   <a href="<?php echo base_url('new_application');?>">
                       <i class="fa fa-file-excel-o"></i>New Application 
                   </a>
               </li>
               <li <?php if($uri == 'approved_application') echo 'class="active"';?>>
                   <a href="<?php echo base_url('approved_application');?>">
                       <i class="fa fa-user-secret"></i>Accepted Application 
                   </a>
               </li>
               <li <?php if($uri == 'final_application') echo 'class="active"';?>>
                   <a href="<?php echo base_url('final_application');?>">
                       <i class="fa fa-user-secret"></i>Final Application
                   </a>
               </li>                                                                                                                      
           </ul>
        </li>
            <!-- <li <?php if($uri == 'teacher_and_staff') {echo 'class="active"';}elseif ($uri == 'add_teacher') {echo 'class="active"';}?>>
                <a href="<?php echo base_url('teacher_and_staff') ?>"><i class="fa fa-user-o"></i> <span class="nav-label">Teacher & Stuff</span></a>
            </li> -->
            <li <?php if($uri == 'manage_class') echo 'class="active"';?>>
                <a href="<?php echo base_url('manage_class');?>"><i class="fa fa-code-fork"></i> <span class="nav-label">Manage Class</span></a>
            </li>
            <li <?php if($uri == 'manage_subject') echo 'class="active"';?>>
            <a href="<?php echo base_url('manage_subject') ?>"><i class="fa fa-book"></i> <span class="nav-label">Manage Subject</span></a>
            </li>
            <li <?php if($uri == 'class_routin') echo 'class="active"';?>>
                <a href="<?php echo base_url('class_routin');?>"><i class="fa fa-bell-o"></i> <span class="nav-label">Class Routine</span></a>
            </li>
            <li <?php if($uri == 'student_admission') {echo 'class="active"';}elseif ($uri == 'student_information') {echo 'class="active"';}elseif ($uri == 'bulk_student_input') {echo 'class="active"';}elseif ($uri == 'transfer_certificate') {echo 'class="active"';}elseif ($uri == 'insert_tc') {echo 'class="active"';}?>>
                <a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Manage Student</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li <?php if($uri == 'student_admission') echo 'class="active"';?>>
                      <a href="<?php echo base_url('student_admission') ?>"><i class="fa fa-user-plus"></i>Student Admission</a>
                    </li>
                    <li <?php if($uri == 'student_information') echo 'class="active"';?>>
                      <a href="<?php echo base_url('student_information') ?>"><i class="fa fa-info-circle"></i>Student Information</a>
                    </li>
                    <li <?php if($uri == 'bulk_student_input') echo 'class="active"';?>>
                      <a href="<?php echo base_url('bulk_student_input') ?>"><i class="fa fa-file-text"></i>Bulk student Input</a>
                    </li>
                    <li <?php if($uri == 'transfer_certificate') {echo 'class="active"';}elseif ($uri == 'insert_tc') {echo 'class="active"';}?>>
                      <a href="<?php echo base_url('transfer_certificate') ?>"><i class="fa fa-file-text"></i>Transfer Certificate</a>
                    </li>
                </ul>
            </li>                  
            <li <?php if($uri == 'managment_exam') echo 'class="active"';?>>
                <a href="<?php echo base_url('managment_exam');?>"><i class="fa fa-star"></i> <span class="nav-label">Manage Exam</span></a>
            </li>
            <li <?php if($uri == 'admit_card') echo 'class="active"';?>>
                <a href="<?php echo base_url('admit_card');?>"><i class="fa fa-ticket"></i><span class="nav-label">Admit Card</span></a>
            </li>  
            <!-- <li>
            <a href="<?php echo base_url() ?>admin_controller/manage_student_export_import"><i class="fa fa-file-excel-o"></i> <span class="nav-label">Export/Import</a>
            </li> -->
           <!-- <li>
                <a href="#"><i class="fa fa-id-card-o"></i> <span class="nav-label">Manage ID Card</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo base_url() ?>admin_controller/student_id_card"><i class="fa fa-id-card"></i>Student ID Card</a></li>
                    <li><a href="<?php echo base_url() ?>admin_controller/manage_employ_id"><i class="fa fa-id-card"></i>Employee ID Card</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin_controller/parent_details"><i class="fa fa-users"></i> <span class="nav-label">Manage Parent</span></a>
            </li> -->
            <li <?php if($uri == 'entry_logs') {echo 'class="active"';}elseif ($uri == 'daily_logs') {echo 'class="active"';}elseif ($uri == 'attendence') {echo 'class="active"';}elseif ($uri == 'today_attendence') {echo 'class="active"';}elseif ($uri == 'today_attendence_search') {echo 'class="active"';}?>>
                <a href="#"><i class="fa fa-id-badge"></i> <span class="nav-label">Manage Attendance</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    
                    <li <?php if($uri == 'attendence') echo 'class="active"';?>>
                      <a href="<?php echo base_url('attendence') ?>"><i class="fa fa-bar-chart"></i>Attendance</a>
                    </li>
                    <li <?php if($uri == 'today_attendence') echo 'class="active"';elseif ($uri == 'today_attendence_search')echo 'class="active"';?>>
                      <a href="<?php echo base_url('today_attendence') ?>"><i class="fa fa-id-card-o"></i>Totay attendence</a>
                    </li>
                    <li <?php if($uri == 'entry_logs') echo 'class="active"';?>>
                      <a href="<?php echo base_url('entry_logs') ?>"><i class="fa fa-pie-chart"></i>Entry Logs</a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href=""><i class="fa fa-angellist"></i> <span class="nav-label">Setup Grade</span></a>
            </li> -->
            <li <?php if($uri == 'bulk_result_input') {echo 'class="active"';}elseif ($uri == 'report_card') {echo 'class="active"';}elseif ($uri == 'result_input') {echo 'class="active"';}?>>
                <a href="#"><i class="fa fa-calculator"></i> <span class="nav-label">Result</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li <?php if($uri == 'bulk_result_input') echo 'class="active"';?>>
                      <a href="<?php echo base_url('bulk_result_input') ?>"><i class="fa fa-file-text"></i>Bulk result Input</a>
                    </li>
                    <li <?php if($uri == 'result_input') echo 'class="active"';?>>
                      <a href="<?php echo base_url('result_input') ?>"><i class="fa fa-spinner"></i>Input Result</a>
                    </li>
                    <li <?php if($uri == 'report_card') echo 'class="active"';?>>
                      <a href="<?php echo base_url('report_card');?>"><i class="fa fa-edit"></i>Report Card</a>
                    </li>
                </ul>
            </li> 
            <!-- <li>
                <a href=""><i class="fa fa-th"></i> <span class="nav-label">Progress Card</span></a>
            </li> 
            <li>
                <a href=""><i class="fa fa-newspaper-o"></i> <span class="nav-label">Tabulation Sheet</span></a>
            </li> -->

            <li <?php if($uri == 'sms') echo 'class="active"';?>>
                <a href="<?php echo base_url('sms_page') ?>"><i class="fa fa-comments"></i> <span class="nav-label">SMS</span></a>
                <!-- <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo base_url('sms_teacher') ?>"><i class="fa fa-comments-o"></i>Teacher</a></li>
                    <li><a href="<?php echo base_url('sms_student') ?>"><i class="fa fa-commenting-o"></i>Student</a></li>
                </ul> -->
            </li>
            <!-- <li>
                <a href="#"><i class="fa fa-credit-card"></i> <span class="nav-label">Fees Accoutns</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo base_url() ?>admin_controller/fees_all"><i class="fa fa-plus-square"></i>Add Fees Head</a></li>
                    <li><a href="<?php echo base_url() ?>admin_controller/assign_fee"><i class="fa fa-check-square"></i>Assign Fees</a></li>
                    <li><a href="<?php echo base_url() ?>admin_controller/manag_payment"><i class="fa fa-paypal"></i>Payment</a></li>
                    <li><a href=""><i class="fa fa-ticket"></i>Invoice</a></li>
                    <li><a href=""><i class="fa fa-line-chart"></i>Fees Report</a></li>
                    <li><a href=""><i class="fa fa-pie-chart"></i>Due Fees Report</a></li>
                </ul>
            </li> -->  
            
            <li <?php if($uri == 'user_role') echo 'class="active"';?>>
                <a href="<?php echo base_url('user_role'); ?>"><i class="fa fa-database"></i> <span class="nav-label">User role</span></a>

            </li>
            <li <?php if($uri == 'settings') echo 'class="active"';?>>
                <a href="<?php echo base_url('settings'); ?>"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span></a>

            </li>                
            <!-- <li>
                <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Backup & Restore</span></a>

            </li>  -->

            
          </ul>

    </div>
</nav>