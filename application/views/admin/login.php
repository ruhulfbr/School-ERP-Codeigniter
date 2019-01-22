<?php echo doctype('html5'); ?>
<html>

<head>

    <meta charset="utf-8">
    <?php echo meta('description', 'Content') ; ?>
    <?php echo meta('author', 'author content') ; ?>

    <?php 
    $meta_attr = array
      (
        array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0' ),

      );

      echo meta($meta_attr);

    ?>

    <title>Login | Ci | Codeigniter Learning</title>
    
    <!-- Favicon -->
    <?php echo link_tag('smile.gif', 'shortcut icon', 'image/ico'); ?>
    
    <!-- Core CSS-->
    <?php
    $css_link = array
    (
    
      'href'  =>  base_url().'resource/css/bootstrap.min.css', 
      'rel' =>  'stylesheet',
    );

    echo link_tag($css_link);

    ?>

    <!-- Font Awesome core CSS-->
    <?php
    $css_link = array
    (
    
      'href'  =>  base_url().'resource/font-awesome/css/font-awesome.css', 
      'rel' =>  'stylesheet',
    );

    echo link_tag($css_link);

    ?>

    <!-- Core CSS-->
    <?php
    $css_link = array
    (
    
      'href'  =>  base_url().'resource/css/animate.css', 
      'rel' =>  'stylesheet',
    );

    echo link_tag($css_link);

    ?>

    <!-- Core CSS-->
    <?php
    $css_link = array
    (
    
      'href'  =>  base_url().'resource/css/style.css', 
      'rel' =>  'stylesheet',
    );

    echo link_tag($css_link);

    ?>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <?php echo form_open('login/user_login_data_check'); ?>
                <div class="form-group">
                <?php if (validation_errors()) { ?>
                  
                  <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                  </div>
                
                <?php } 

                  if (isset($errorLogin)) : 
                ?>

                <div class="alert alert-danger">
                    <?php echo $errorLogin; ?>
                  </div>

                <?php endif; ?>

                <div class="form-group">
                  <?php 
                    $email = array
                    (
                      'class' => 'form-control',
                      'id' => 'exampleInputEmail1',
                      'aria-describedby' => 'emailHelp',
                      'placeholder' => 'Enter email',
                      'name' => 'email',
                      'required' => 'required',
                    );

                    echo form_input($email);
                  ?>
                </div>
                <div class="form-group">
                <?php 
                  $password = array
                  (
                    'class' => 'form-control',
                    'id' => 'exampleInputPassword1',
                    'placeholder' => 'Password',
                    'name' => 'password',
                    'required' => 'required',
                  );

                  echo form_password($password);
                ?>
                </div>
                <button class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            <?php echo form_close(); ?>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>resource/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>resource/js/bootstrap.min.js"></script>

</body>

</html>