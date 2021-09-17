<!-- ********************** --> 
<!--      C O N T E N T     -->
<!-- ********************** --> 
<div id="content" class="container_16">
    <div id="category" class="grid_12">
        <div class="clear"></div>
        <div class="s_listing s_grid_view clearfix">
            <?php foreach ($search_product as $v_product) { ?>
                <div class="s_item grid_3"><a class="s_thumb" href="<?php echo base_url();?>welcome/product_details/<?php echo $v_product->product_id;?>"><img src="<?php echo base_url().$v_product->product_photo_0;?>" title="" alt="" /></a>
                    <h3><a href="<?php echo base_url();?>welcome/product_details/<?php echo $v_product->product_id;?>"><?php echo $v_product->product_name; ?></a></h3>
                    <p class="s_model"><?php echo $v_product->style_id; ?></p>
					<?php						$currency = $this->session->userdata('currency');						switch ($currency) {							case 'BDT':							$price = $v_product->product_price_in_bdt;							break;							case 'USD':							$price = $v_product->product_price_in_usd;							break;							case 'EURO':							$price = $v_product->product_price_in_euro;							break;							case 'GBP':							$price = $v_product->product_price_in_gbp;							break;						}					?>					<p class="s_price"><span class="s_currency s_before"><?php echo $currency;?><strong>. </strong></span><strong><?php echo $price;?></strong></p>					<a class="s_button_add_to_cart" href="<?php echo base_url();?>cart/add_to_cart/<?php echo $v_product->product_id;?>"><span class="s_icon_16"><span class="s_icon"></span>Add to Cart</span></a>
                </div>
            <?php } ?>            
            <div class="clear"></div>
        </div>
        <div class="pagination">
            <div class="links"> <b>1</b> <a href="">2</a> <a href="">&gt;</a> <a href="">&gt;|</a> </div>
            <div class="results">Showing 1 to 12 of 20 (2 Pages)</div>
        </div>
    </div>
</div>
<!-- END OF CONTENT -->