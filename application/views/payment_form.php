<!-- ********************** --> 
<!--     I N T R O          -->
<!-- ********************** -->
<div id="intro">
    <div id="intro_wrap">
        <div class="container_12">
            <div id="breadcrumbs" class="grid_12">
                <a href="">Home</a>
                &gt;
            </div>
            <h1>Stylbee Checkout - Payment Method</h1>
        </div>
    </div>
</div>
<!-- END OF INTRO -->
<!-- ********************** --> 
<!--      C O N T E N T     -->
<!-- ********************** --> 
<div id="content" class="container_12">
    <div id="checkout" class="grid_12">
        <form id="checkout_form" class="s_accordion" action="<?php echo base_url();?>checkout/confirm_order" method="POST">
            <h2>Payment Method</h2></br>
            <div class="s_last">
                <p>Please select the preferred payment method to use on this order.</p>
                <div class="s_row_3 clearfix grid_7 alpha">
                    <label class="s_radio s_shipping_method clearfix">
                        <input type="radio" id="cod" name="payment_type" value="cash_on_delivery" checked="checked" />
                        <strong>Cash On Delivery</strong>
                    </label>
                    <label class="s_radio s_shipping_method clearfix">
                        <input type="radio" name="payment_type" value="bkash" id="authorizenet_aim" />
                        <strong>Bkash</strong>
                    </label>
                </div>
                <div class="clear"></div>
                <button class="s_button_1 s_main_color_bgr" type="submit"><span class="s_text">Conform</span></button>
                <span class="clear"></span>
                <br />
            </div>
        </form>
    </div>
</div>
<!-- END OF CONTENT -->