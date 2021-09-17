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
            <h1>Forget Password</h1>
        </div>
    </div>
</div>
<!-- END OF INTRO -->
<div id="content" class="container_16">
    <div id="login_page" class="grid_16">
        <div class="grid_12 omega">
            <div class="clear"></div>
            <?php echo validation_errors(); ?>
            <form action="<?php echo base_url()?>user_manager/reset_password" method="post">
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
                    <input type="email" name="customer_email" id="email" size="35" required err="Please Enter Valide Email Address" regexp="JSVAL_RX_EMAIL" />
                </div>
                <button class="s_button_1 s_main_color_bgr" type="submit"><span class="s_text">Send</span></button>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>