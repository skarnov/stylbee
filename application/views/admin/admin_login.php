<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<html>
    <head>
        <meta charset="utf-8" />
        <title>Stylbee Login</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url();?>admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/css/style-default.css" rel="stylesheet" id="style_color" />
    </head>
    
    <body class="lock">
        <div class="lock-header">
            <a class="center" id="logo" href="index.html">
                <img class="center" alt="logo" src="<?php echo base_url();?>images/stylbee.png">
            </a>
        </div>
            <div class="login-wrap">
                <form action="<?php echo base_url();?>administrator/check_admin_login" method="POST">
                    <div class="metro single-size red">
                        <div class="locked">
                            <i class="icon-lock"></i>
                            <span>Login</span>
                        </div>
                    </div>
                    <div class="metro double-size green">
                        <div class="input-append lock-input">
                            <input type="email" class="" placeholder="Email" name="admin_email_address">
                        </div>
                    </div>
                    <div class="metro double-size yellow">
                        <div class="input-append lock-input">
                            <input type="password" class="" placeholder="Password" name="admin_password">
                        </div>
                    </div>
                    <div class="metro single-size terques login">
                        <button type="submit" class="btn login-btn">
                            Login
                            <i class=" icon-long-arrow-right"></i>
                        </button>
                    </div>   
                    <div class="metro double-size navy-blue ">
                        <button  class="btn login-btn">
                            <input type="checkbox" id=""> Remember Me  
                            <i class=" icon-long"></i>
                        </button>
                    </div>
                    <div class="metro single-size deep-red">
                        <a href="index.html" class="social-link"></a>
                    </div>
                    <div class="metro double-size blue">
                        <div >
                            <h3 style="color:red">
                                <?php
                                $exc=$this->session->userdata('exception');
                                if(isset($exc))
                                {
                                echo $exc;
                                $this->session->unset_userdata('exception');
                                }
                                ?>
                            </h3>
                            <h3 style="color:green">
                                <?php
                                $msg=$this->session->userdata('message');
                                if(isset($msg))
                                {
                                echo $msg;
                                $this->session->unset_userdata('message');
                                }
                                ?>
                            </h3>
                        </div>
                    </div>
                </form>
                <form action="<?php echo base_url();?>administrator/forgot_password" method="POST">
                    <div class="metro single-size terques login">
                        <button type="submit" class="btn login-btn">
                            Forgot Password?
                            <i class=" icon-long"></i>
                        </button>
                    </div>
                </form>
            </div>  
    </body>
</html>