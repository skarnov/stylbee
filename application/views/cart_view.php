<!-- ********************** --> 
<!--     I N T R O          -->
<!-- ********************** --> 
<?php $currency = $this->session->userdata('currency'); ?>
<div id="intro">
    <div id="intro_wrap">
        <div class="container_12">
            <div id="breadcrumbs" class="grid_12">
                <a href="<?php echo base_url();?>">Home</a>
                &gt; <a href="<?php echo base_url();?>cart/show_cart">Basket</a>
            </div>
            <h1>Shopping Cart</h1>
        </div>
    </div>
</div>
<!-- END OF INTRO -->
<!-- ********************** --> 
<!--      C O N T E N T     --> 
<!-- ********************** --> 
<div id="content" class="container_12">
    <div id="shopping_cart" class="grid_12">
        <form id="cart" class="clearfix" action="<?php echo base_url()?>checkout">
            <table class="s_table_1" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <th width="65">Remove</th>
                    <th width="60">Image</th>
                    <th width="320">Name</th>
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
                <?php
                    $contents = $this->cart->contents();
                    foreach ($contents as $v_contents) {
                ?>
                    <tr class="even">
                        <td valign="middle"><a href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid']; ?>"><i>remove</i></a></td>
                        <td valign="middle"><a href=""><img src="<?php echo base_url() . $v_contents['image']; ?>" style="height: 14%; width: 99%" alt="" /></a></td>
                        <td valign="middle"><a href=""><strong><?php echo $v_contents['name']; ?></strong></a></td>
                        <td valign="middle"><a href=""><strong><?php echo $v_contents['model']; ?></strong></a></td>
        </form>                
						<td valign="middle">                    
                            <form action="<?php echo base_url(); ?>cart/update_cart" method="POST">
                                <input id="product_quantity" name="product_quantity" type="text" size="2" value="<?php echo $v_contents['qty']; ?>"  style="width:30px;" /><div id="availabel_quantity"> </div>
                                <input type="hidden"  value="<?php echo $v_contents['rowid']; ?>" name="rowid"/>
                                <input type="submit" style="color: orange; height: 27px; width: 84px; background-color: black;"  value="Update Cart" name="btn" />
                            </form>
                        </td>
                        <td valign="middle"><span class="s_currency s_after"><?php echo $v_contents['price']; ?></span></td>
                        <td valign="middle"><span class="s_currency s_after"><?php echo $v_contents['subtotal']; ?></span></td>
                    </tr>
                <?php } ?>
            </table>
            <?php
               $subtotal = $this->cart->total();
                $total = $subtotal; 
            ?>
			<?php
                $grand_total=$total;
                $sdata=array();
                $sdata['grand_total']=$grand_total;
                $sdata['currency']=$currency;
                $this->session->set_userdata($sdata);
                $this->session->set_userdata($currency);
            ?> 
            <br />
            <p class="s_total s_secondary_color last"><strong>Total:</strong> <?php echo $total; ?><span class="s_currency s_after"> <?php echo $currency;?></span></p>
            <div class="clear"></div>
            <br />
            <a class="s_button_1 s_ddd_bgr left" href="<?php echo base_url(); ?>"><span class="s_text">Continue Shopping</span></a>
            <button class="s_button_1 s_main_color_bgr" type="submit"><span class="s_text">Checkout</span></button>
        </form>
    </div>
    <div class="clear"></div>
    <br />
    <br />
</div>
<!-- END OF INTRO -->