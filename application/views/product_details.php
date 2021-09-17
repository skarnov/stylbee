<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#image1').addimagezoom({
			zoomrange: [3, 10],
			magnifiersize: [400,320],
			magnifierpos: 'right',
			cursorshade: true,
			largeimage: '<?php echo base_url() . $product_detail->product_photo_0; ?>'
		})
	})
</script>
<div id="intro">
    <div id="intro_wrap">
        <div class="container_12">
            <div id="breadcrumbs" class="grid_12">
                <a href="<?php echo base_url(); ?>">Home</a>
                &gt;
                <a href=""><?php echo $product_detail->category_name; ?></a>
                &gt;
                <a href=""><?php echo $product_detail->sub_category_name; ?></a>
            </div>
            <h1><?php echo $product_detail->product_name; ?></h1>
        </div>
    </div>
</div>
<div id="content" class="product_view container_12">
    <div id="product" class="grid_12">   
        <div id="product_images" class="grid_4 alpha" style="display: block; overflow: hidden;">
			<img id="image1" border="0" src="<?php echo base_url() . $product_detail->product_photo_0; ?>" style="width:300px;height:300px">
        </div>
        <?php
        $currency = $this->session->userdata('currency');
        switch ($currency) {
            case 'BDT':
                $price = $product_detail->product_price_in_bdt;
                break;
            case 'USD':
                $price = $product_detail->product_price_in_usd;
                break;
            case 'EURO':
                $price = $product_detail->product_price_in_euro;
                break;
            case 'GBP':
                $price = $product_detail->product_price_in_gbp;
                break;
        }
        ?>
        <div id="product_info" class="grid_4">
            <p class="s_price"><span class="s_currency s_before"><?php echo $currency; ?><strong>. </strong></span><strong><?php echo $price; ?></strong></p>
            <img src="<?php echo base_url(); ?>images/pricebadges.png" style="margin-top: -54%; margin-left: 104%;" />
            <?php
            if ($product_detail->product_discount_price_status == 1) {
                ?>
                <h1 id="off"><?php echo $product_detail->product_discount_price; ?></h1>
                <?php
            } else {
                ?>
            <?php }
            ?>                    
            <dl class="clearfix" style="margin-top: -50%;">
                <dt>Model</dt>
                <dd><?php echo $product_detail->style_id; ?></dd>
                <dt>Brand</dt>
                <dd><?php echo $product_detail->brand_name; ?></dd>
                <dt>Color</dt>
                <dd><?php echo $product_detail->product_color; ?></dd>
                <dt>Size</dt>
                <dd><?php echo $product_detail->product_size; ?></dd>
            </dl>
            <p class="s_short_desc"><?php echo $product_detail->product_summary; ?></p>
        </div>
        <div class="grid_4 omega">
            <div id="product_buy" class="clearfix">
                <form action="<?php echo base_url();?>cart/add_to_cart/<?php echo $product_detail->product_id;?>" method="post">
                    <?php if ($product_detail->product_quantity > 0) { ?>
                    <label for="product_buy_quantity">Qty:</label>
                        <input type="text" value="1" name="qty" id="product_buy_quantity" size="2" />
                        <input type="hidden" name="product_id" value="<?php echo $product_detail->product_id; ?>"/> 
                        <input type="submit"  id="add_to_cart" class="s_main_color_bgr" value="Add to Cart" style=" margin-left: 8%; margin-top: -2%; padding: 2%;" />
					 <?php } else { ?><?php }?>
                </form>
            </div>
        </div>
        <div class="clear"></div>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#tabs").tabs();
            });
        </script>
		<br/><br/>		
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Description</a></li>
                <li><a href="#tabs-2">Product Photo</a></li>
            </ul>
            <div id="tabs-1">
                <?php echo $product_detail->product_description; ?>
            </div>
            <div id="tabs-2">
                <ul class="s_thumbs clearfix">
                    <li><a class="s_thumb" href="<?php echo base_url() . $product_detail->product_photo_1; ?>" title="" rel="prettyPhoto[gallery]"><img src="<?php echo base_url() . $product_detail->product_photo_1; ?>" width="120" title="" alt="" /></a></li>
                    <li><a class="s_thumb" href="<?php echo base_url() . $product_detail->product_photo_2; ?>" title="" rel="prettyPhoto[gallery]"><img src="<?php echo base_url() . $product_detail->product_photo_2; ?>" width="120" title="" alt="" /></a></li>
                    <li><a class="s_thumb" href="<?php echo base_url() . $product_detail->product_photo_3; ?>" title="" rel="prettyPhoto[gallery]"><img src="<?php echo base_url() . $product_detail->product_photo_3; ?>" width="120" title="" alt="" /></a></li>
                    <li><a class="s_thumb" href="<?php echo base_url() . $product_detail->product_photo_4; ?>" title="" rel="prettyPhoto[gallery]"><img src="<?php echo base_url() . $product_detail->product_photo_4; ?>" width="120" title="" alt="" /></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>