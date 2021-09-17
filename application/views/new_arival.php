<!-- ********************** --> 
<!--     I N T R O          -->
<!-- ********************** --> 
<div id="intro">
    <div id="intro_wrap">
        <div class="container_12">
            <div id="breadcrumbs" class="grid_12">
                <a href="<?php echo base_url(); ?>">Home</a>
                &gt;
                <a href=""></a>
            </div>
            <h1>New Arrivals</h1>
        </div>
    </div>
</div>
<!-- END OF INTRO -->
<!-- ********************** --> 
<!--      C O N T E N T     -->
<!-- ********************** --> 
<div id="content" class="container_16">
    <div id="category" class="grid_12">
        <div class="clear"></div>
        <div class="s_listing s_grid_view clearfix">
            <?php foreach ($new_arrivals as $v_new_arrivals){?>
                <div class="s_item grid_3"><a class="s_thumb" href="<?php echo base_url();?>welcome/product_details/<?php echo $v_new_arrivals->product_id;?>"><img src="<?php echo base_url().$v_new_arrivals->product_photo_0;?>" title="" alt="" /></a>
                    <h3><a href="<?php echo base_url();?>welcome/product_details/<?php echo $v_new_arrivals->product_id;?>"><?php echo $v_new_arrivals->product_name; ?></a></h3>
                    <p class="s_model"><?php echo $v_new_arrivals->style_id; ?></p>
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
                    <a class="s_button_add_to_cart" href="<?php echo base_url();?>welcome/product_details/<?php echo $v_new_arrivals->product_id;?>"><span class="s_icon_16"><span class="s_icon"></span>Add to Cart</span></a>
                </div>
            <?php } ?>            
            <div class="clear"></div>
        </div>
        <div class="pagination">
            <div class="links"> <b>1</b> <a href="">2</a> <a href="">&gt;</a> <a href="">&gt;|</a> </div>
            <div class="results">Showing 1 to 12 of 20 (2 Pages)</div>
        </div>
    </div>
    <div id="right_col" class="grid_4">
        <div id="categories_module" class="s_box">
            <h2>Categories</h2>
            <div class="s_list_1">                
                <ul>                  
                    <?php foreach ($all_category as $v_category) { ?>
                    <li>
                        <a href="<?php echo base_url(); ?>welcome/product_listing/<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></a>
                            <div class="s_submenu">           
                                <ul class="s_list_1 clearfix">
                                    <?php
                                        foreach ($all_subcategory as $v_subcategory) {
                                            if ($v_subcategory->category_id == $v_category->category_id && $v_subcategory->sub_category_publication_status == '1') {
                                                ?>      
                                            <li><a href="<?php echo base_url(); ?>welcome/product_listing_sub/<?php echo $v_category->category_name; ?>/<?php echo $v_subcategory->sub_category_id; ?>"><?php echo $v_subcategory->sub_category_name; ?></a></li>
                                                <?php
                                            }
                                        }
                                    ?>     
                                </ul>  
                            </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END OF CONTENT -->