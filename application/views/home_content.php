<div id="intro">
    <div id="intro_wrap">
        <div id="product_intro" class="container_12">
            <div id="product_intro_info" class="grid_5">
                <?php 
                $i = 0; 
                foreach ($slider_product as $v_slider){?>
                <div style="position: relative; <?php if($i>0){echo 'display: none;';}else{echo '';} $i++;?>">
                    <h2><a href="<?php echo base_url();?>welcome/product_details/<?php echo $v_slider->product_id;?>"><?php echo $v_slider->product_name; ?></a></h2>
                    <p class="s_desc"><?php echo $v_slider->product_description;?></p>
                    <div class="s_price_holder">
                    <?php
                        $currency = $this->session->userdata('currency');
                        switch ($currency) {
                            case 'BDT':
                            $price = $v_slider->product_price_in_bdt;
                            break;
                        
                            case 'USD':
                            $price = $v_slider->product_price_in_usd;
                            break;
                        
                            case 'EURO':
                            $price = $v_slider->product_price_in_euro;
                            break;
                        
                            case 'GBP':
                            $price = $v_slider->product_price_in_gbp;
                            break;
                        }
                    ?>
                    <p class="s_price"><span class="s_currency s_before"><?php echo $currency;?><strong>. </strong></span><strong><?php echo $price;?></strong></p>
                    </div>
                </div>
                <?php }?>
            </div>
            <div id="product_intro_preview">
                <div class="slides_container">
                    <?php foreach ($slider_product as $v_slider){?>
                    <div class="slideItem"><a href="<?php echo base_url();?>welcome/product_details/<?php echo $v_slider->product_id;?>"><img src="<?php echo base_url() . $v_slider->product_photo_0;?>" alt="" /></a></div>
                    <?php }?>
                </div>
                <a class="s_button_prev" href="javascript:;"></a>
                <a class="s_button_next" href="javascript:;"></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.slides.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/shoppica.products_slide.js"></script>
<div id="content" class="container_12">
    <div id="special_home" class="grid_12">
        <h2 class="s_title_1"><span class="s_main_color">Top</span> Sellers</h2>
        <div class="clear"></div>
        <div class="s_listing s_grid_view clearfix">
            <?php foreach ($top_sellers as $v_top_sellers){?>
            <div class="s_item grid_3"><a class="s_thumb" href="<?php echo base_url();?>welcome/product_details/<?php echo $v_top_sellers->product_id;?>"><img src="<?php echo base_url().$v_top_sellers->product_photo_0;?>" title="" alt="" /></a>    
                <h3><a href="<?php echo base_url();?>welcome/product_details/<?php echo $v_top_sellers->product_id;?>"><?php echo $v_top_sellers->product_name;?></a></h3>
                <p class="s_model"><?php echo $v_top_sellers->style_id;?></p>
                <?php
                    $currency = $this->session->userdata('currency');
                    switch ($currency) {
                        case 'BDT':
                        $price = $v_top_sellers->product_price_in_bdt;
                        break;

                        case 'USD':
                        $price = $v_top_sellers->product_price_in_usd;
                        break;

                        case 'EURO':
                        $price = $v_top_sellers->product_price_in_euro;
                        break;

                        case 'GBP':
                        $price = $v_top_sellers->product_price_in_gbp;
                        break;
                    }
                ?>
                <p class="s_price"><span class="s_currency s_before"><?php echo $currency;?><strong>. </strong></span><strong><?php echo $price;?></strong></p>
                <?php if ($v_top_sellers->product_quantity > 0) { ?>
                <a class="s_button_add_to_cart" href="<?php echo base_url();?>cart/add_to_cart/<?php echo $v_top_sellers->product_id;?>"><span class="s_icon_16"><span class="s_icon"></span>Add to Cart</span></a>
                <?php } else { ?><?php } ?>
            </div>
            <?php }?>
            <div class="clear"></div>
        </div>
    </div>		
    <div id="latest_home" class="grid_12">
        <h2 class="s_title_1"><span class="s_main_color">New</span> Arrivals</h2>
        <div class="clear"></div>
        <div class="s_listing s_grid_view clearfix">
            <?php foreach ($new_arrivals as $v_new_arrivals){?>
            <div class="s_item grid_3"><a class="s_thumb" href="<?php echo base_url();?>welcome/product_details/<?php echo $v_new_arrivals->product_id;?>"><img src="<?php echo base_url().$v_new_arrivals->product_photo_0;?>" title="" alt="" /></a>
                <h3><a href="<?php echo base_url();?>welcome/product_details/<?php echo $v_new_arrivals->product_id;?>"><?php echo $v_new_arrivals->product_name;?></a></h3>
                <p class="s_model"><?php echo $v_new_arrivals->style_id;?></p>
                <?php
                    $currency = $this->session->userdata('currency');
                    switch ($currency) {
                        case 'BDT':
                        $price = $v_new_arrivals->product_price_in_bdt;
                        break;

                        case 'USD':
                        $price = $v_new_arrivals->product_price_in_usd;
                        break;

                        case 'EURO':
                        $price = $v_new_arrivals->product_price_in_euro;
                        break;

                        case 'GBP':
                        $price = $v_new_arrivals->product_price_in_gbp;
                        break;
                    }
                ?>
                <p class="s_price"><span class="s_currency s_before"><?php echo $currency;?><strong>. </strong></span><strong><?php echo $price;?></strong></p>
                <?php if ($v_new_arrivals->product_quantity > 0) { ?>
		<a class="s_button_add_to_cart" href="<?php echo base_url();?>cart/add_to_cart/<?php echo $v_new_arrivals->product_id;?>"><span class="s_icon_16"><span class="s_icon"></span>Add to Cart</span></a>
                <?php } else { ?><?php } ?>
            </div>
            <?php }?>
        </div>
    </div>
</div>