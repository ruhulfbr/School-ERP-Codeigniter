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
                    <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo site_url("profile/".$id = $this->session->userdata('current_user_id')); ?>">Profile</a></li>
                    </ul> -->
                </div>
                <div class="logo-element">
                    DBN
                </div>
            </li>

            <li <?php if($uri == 'account_dashboard') echo 'class="active"';?>>
                <a href="<?php echo base_url('account_dashboard') ?>"><i class="fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span></a>
            </li>
            
            <li <?php if($uri == 'st_payment'||$uri == 'other_payment'||$uri == 'recive_logs'||$uri == 'unpaid_logs') {echo 'class="active"';}?>>
                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Income </span><span class="fa arrow"></span></a>

                <ul class="nav nav-second-level collapse">
                    <li <?php if($uri == 'st_payment'||$uri == 'other_payment') {echo 'class="active"';}?>>
                    <a href="#"><i class="fa fa-credit-card"></i> <span class="nav-label">Payment Receive </span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                            <li <?php if($uri == 'st_payment') echo 'class="active"';?>>
                                <a href="<?php echo base_url('st_payment');?>">Student Payment</a>
                            </li>
                            <li <?php if($uri == 'other_payment') echo 'class="active"';?>>
                                <a href="<?php echo base_url('other_payment');?>">Other</a>
                            </li>
                        </ul>    
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li <?php if($uri == 'recive_logs') echo 'class="active"';?>>
                        <a href="<?php echo base_url('recive_logs');?>"><i class="fa fa-line-chart"></i>Recive logs</a>
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li <?php if($uri == 'unpaid_logs') echo 'class="active"';?>>
                        <a href="<?php echo base_url('unpaid_logs');?>"><i class="fa fa-paper-plane"></i>Unpaid logs</a>
                    </li>
                </ul>
            </li>
            <li <?php if($uri == 'payment_pay'||$uri == 'pay_logs') {echo 'class="active"';}?>>
                <a href="#"><i class="fa fa-paypal"></i> <span class="nav-label">Payment </span><span class="fa arrow"></span></a>

                <ul class="nav nav-second-level collapse">
                    <li <?php if($uri == 'payment_pay') echo 'class="active"';?>>
                        <a href="<?php echo base_url('payment_pay');?>"><i class="fa fa-line-chart"></i>Pay</a>
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li <?php if($uri == 'pay_logs') echo 'class="active"';?>>
                        <a href="<?php echo base_url('pay_logs');?>"><i class="fa fa-paper-plane"></i>Pay logs</a>
                    </li>
                </ul>
            </li>
            <li <?php if($uri == 'accounce_head'||$uri == 'insert_acc_head') echo 'class="active"';?>>
                <a href="<?php echo base_url('accounce_head');?>"><i class="fa fa-at"></i> <span class="nav-label">Accounce head</span></a>
            </li> 

            <li <?php if($uri == 'salary') echo 'class="active"';?>>
                <a href="<?php echo base_url('salary');?>"><i class="fa fa-code-fork"></i> <span class="nav-label">Salary</span></a>
            </li> 
          </ul>

    </div>
</nav>