<!-- ********************** --> 
<!--     I N T R O          -->
<!-- ********************** --> 
<div id="intro">
    <div id="intro_wrap">
        <div class="container_12">
            <div id="breadcrumbs" class="grid_12">
                <a href="<?php echo base_url();?>">Home</a>
                &gt;
            </div>
            <h1>Stylbee Customer Login</h1>
        </div>
    </div>
</div>
<!-- END OF INTRO -->
<div id="content" class="container_16">
    <div id="login_page" class="grid_16">
        <div class="grid_12 omega">
            <div class="clear"></div>
            <form action="<?php echo base_url()?>user_administrator/customer_login_check" method="post">
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
				<div class="s_row_3 clearfix">
                    <label><strong>E-Mail Address:</strong></label>
                    <input type="email" name="customer_email_address" required id="email" size="35" required err="Please Enter Valide Email Address" regexp="JSVAL_RX_EMAIL" />
                    <br />
                    <br />
                    <label><strong>Password:</strong></label>
                    <input type="password" name="customer_password" required size="35" required err="Please Enter Valide Password" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" />
                    <br />
                </div>
                <span class="clear border_ddd"></span>
                <br />
                <div class="s_nav s_size_2 left">
                    <ul class="clearfix">
                        <li><a href="<?php echo base_url()?>user_manager/forgot_password">Forgotten Password</a></li>
                    </ul>
                </div>
                <button class="s_button_1 s_main_color_bgr" type="submit"><span class="s_text">Login</span></button>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>