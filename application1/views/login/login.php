

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Digital School</h2>

                
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="<?php echo base_url('resource/favicon/logo.PNG');?>">
                    </div>
                

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <?php echo form_open('login_post'); ?>
                       <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                
                        <?php } 

                          if (isset($error)) : 
                        ?>

                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>

                        <?php endif; ?>
                        <div class="form-group">
                              <?php 
                                $u_name = array
                                (
                                  'class' => 'form-control',
                                  'placeholder' => 'User name',
                                  'name' => 'u_name',
                                  // 'autofocus'   => 'autofocus',
                                  'required' => 'required'
                                );

                                echo form_input($u_name);
                              ?>
                        </div>
                        <div class="form-group">
                              <?php 
                                $password = array
                                (
                                  'class' => 'form-control',
                                  'placeholder' => 'Enter Password',
                                  'name' => 'pass',
                                  'required' => 'required'
                                );

                                echo form_password($password);
                              ?>
                        </div>
                        <button type="submit" name="submit" Value="Submit" class="btn btn-primary block full-width m-b">Login</button>

                        <!-- <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p> -->
                        <!-- <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
                    <?php echo form_close(); ?>
                    <p class="m-t">
                        <small>Digital School provided by DBN Limited &copy; 2018</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        