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
            <h1>Stylbee Checkout - Shipping Method</h1>
        </div>
    </div>
</div>
<!-- END OF INTRO -->
<!-- ********************** --> 
<!--      C O N T E N T     -->
<!-- ********************** --> 
<div id="content" class="container_12">
    <div id="checkout" class="grid_12">
        <form id="checkout_form" class="s_accordion" action="<?php echo base_url();?>checkout/save_shipping_method_information" method="POST">
            <h2>Shipping Method</h2></br>
            <div>
                <p>Please select the preferred shipping method to use on this order.</p>
                <div class="s_row_3 clearfix">
                    <label class="s_radio s_shipping_method clearfix" for="flat.flat">
                        <input type="radio" id="flat.flat" name="shipping_method_type" value="Sels Man" checked="checked" />
                        <span class="s_desc"><strong>Sels Man</strong><br />Free<span class="s_currency s_after"></span></span>
                    </label>
                    <label class="s_radio s_shipping_method clearfix" for="citylink.citylink">
                        <input type="radio" id="citylink.citylink" name="shipping_method_type" value="SA Paribahon" />
                        <span class="s_desc"><strong>SA Paribahon</strong><br />Free<span class="s_currency s_after"></span></span>
                    </label>
                    <label class="s_radio s_shipping_method clearfix" for="citylink.citylink">
                        <input type="radio" id="citylink.citylink" name="shipping_method_type" value="SA Paribahon" />
                        <span class="s_desc"><strong>Air</strong><br />Free<span class="s_currency s_after"></span></span>
                    </label>
                </div>
                <div class="clear"></div>
                <button class="s_button_1 s_main_color_bgr" type="submit"><span class="s_text">Next</span></button>
                <span class="clear"></span>
                <br />
            </div>
        </form>
    </div>
</div>
<!-- END OF CONTENT -->