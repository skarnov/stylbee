<!-- ********************** --> 
<!--     I N T R O          -->
<!-- ********************** --> 
<div id="intro">
    <div id="intro_wrap">
        <div class="container_12">
            <div id="breadcrumbs" class="grid_12">
                <a href="<?php echo base_url(); ?>">Home</a>
                &gt;
            </div>
            <h1>Stylbee Complete Order</h1>
        </div>
    </div>
</div>
<!-- END OF INTRO -->
<div id="content" class="container_16">
    <div id="login_page" class="grid_16">
        <div class="grid_12 omega">
            <div class="clear"></div>
            <h2>Send Money To This Number 01721186268</h2></br>
            <form role="form" class="for-h" name="form1" id="form1" action="<?php echo base_url()?>checkout/bkash_order_complete" method="POST">
                <div class="s_row_2 clearfix">                        
                    <label class="required"><strong>Enter TrxID</strong></label>                        
                    <input type="number" size="50" name="bkash_trxid" required />                    
                </div>
                <button type="submit" class="s_button_1 s_main_color_bgr left" name="submit" value="Send" class="botton_s"><span class="s_text">Submit</span></button>
            </form>
            <a class="s_button_1 s_ddd_bgr left" href="<?php echo base_url() ?>"><span class="s_text">Continue Shopping</span></a>
        </div>
        <div class="clear"></div>
    </div>
</div>