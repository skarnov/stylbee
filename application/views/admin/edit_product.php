<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Edit Product</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <form name="myForm" action="<?php echo base_url(); ?>super_admin/update_product" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <h3 style="color:green">
                        <?php
                        $msg=$this->session->userdata('message');
                        if(isset($msg)){
                        echo $msg;
                        $this->session->unset_userdata('message');
                        }
                        ?>
                    </h3>
                    <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                            <input type="hidden" name="product_id" class="span6 typeahead" id="typeahead"  value="<?php echo $product_info->product_id;?>" >
                            <input type="text" name="product_name" class="input-large" value="<?php echo $product_info->product_name;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Category</label>
                        <div class="controls">
                            <select name="category_id" class="span4 typeahead">
                                <option>Select Product Category</option>
                                <?php
                                    foreach ($all_category as $v_category) {
                                ?>
                                    <option value="<?php echo $v_category->category_id;?>"><?php echo $v_category->category_name;?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Subcategory</label>
                        <div class="controls">
                            <select name="sub_category_id" class="span4 typeahead">
                                <option>Select Product Subcategory</option>
                                <?php
                                    foreach ($all_subcategory as $v_subcategory) {
                                ?>
                                <option value="<?php echo $v_subcategory->sub_category_id;?>"><?php echo $v_subcategory->sub_category_name;?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Brand</label>
                        <div class="controls">
                            <select name="brand_id" class="span4 typeahead">
                                <option>Select Product Brand</option>
                                <?php
                                    foreach ($all_brand as $v_brand) {
                                ?>
                                <option value="<?php echo $v_brand->brand_id;?>"><?php echo $v_brand->brand_name;?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Summary</label>
                        <div class="controls">
                            <textarea name="product_summary" class="input-xlarge" id="input" rows="3"><?php echo $product_info->product_summary;?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Description</label>
                        <div class="controls">
                            <textarea name="product_description" class="input-xxlarge" rows="3"><?php echo $product_info->product_description;?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Color</label>
                        <div class="controls">
                            <input type="text" name="product_color" placeholder="Enter Product Color" class="input-large" value="<?php echo $product_info->product_color;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Size</label>
                        <div class="controls">
                            <input type="text" name="product_size" placeholder="Enter Product Size" class="input-large" value="<?php echo $product_info->product_size;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Main Product Photo</label>
                        <div class="controls">
                            <img src="<?php echo base_url().$product_info->product_photo_0;?>" height="100" width="100" alt="product_photo" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control">Secondary Product Photo</label>
                        <div class="controls">
                            <img src="<?php echo base_url().$product_info->product_photo_1;?>" height="100" width="100" alt="product_photo" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control">Secondary Product Photo</label>
                        <div class="controls">
                            <img src="<?php echo base_url().$product_info->product_photo_2;?>" height="100" width="100" alt="product_photo" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control">Secondary Product Photo</label>
                        <div class="controls">
                            <img src="<?php echo base_url().$product_info->product_photo_3;?>" height="100" width="100" alt="product_photo" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control">Secondary Product Photo</label>
                        <div class="controls">
                            <img src="<?php echo base_url().$product_info->product_photo_4;?>" height="100" width="100" alt="product_photo" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Style ID</label>
                        <div class="controls">
                            <input type="text" name="style_id" placeholder="Enter Product Model" class="input-large" value="<?php echo $product_info->style_id;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Quantity</label>
                        <div class="controls">
                            <input type="text" name="product_quantity" class="input-large" value="<?php echo $product_info->product_quantity;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price In BDT</label>
                        <div class="controls">
                            <input type="text" name="product_price_in_bdt" class="input-large" value="<?php echo $product_info->product_price_in_bdt;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price In USD</label>
                        <div class="controls">
                            <input type="text" name="product_price_in_usd" class="input-large" value="<?php echo $product_info->product_price_in_usd;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price In GBP</label>
                        <div class="controls">
                            <input type="text" name="product_price_in_gbp" class="input-large" value="<?php echo $product_info->product_price_in_gbp;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price In EURO</label>
                        <div class="controls">
                            <input type="text" name="product_price_in_euro" class="input-large" value="<?php echo $product_info->product_price_in_euro;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Discount</label>
                        <div class="controls">
                            <input type="text" name="product_discount_price" class="input-large" value="<?php echo $product_info->product_discount_price;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Discount Status</label>
                        <div class="controls">
                            <select name="product_discount_price_status" class="input-large m-wrap" tabindex="1">
                                <option value="0">Display Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Top Seller</label>
                        <div class="controls">
                            <select name="product_display_in_homepage" class="input-large m-wrap" tabindex="1">
                                <option value="0">Display Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
                        <div class="controls">
                            <select name="product_publication_status" class="input-large m-wrap" tabindex="1">
                                <option value="0">Select Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn"><i class="icon-ok"></i> Save</button>
                        <button type="button" class="btn"><i class=" icon-remove"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['category_id'].value = '<?php echo $product_info->category_id; ?>';
    document.forms['myForm'].elements['sub_category_id'].value = '<?php echo $product_info->sub_category_id; ?>';
    document.forms['myForm'].elements['brand_id'].value = '<?php echo $product_info->brand_id; ?>';
    document.forms['myForm'].elements['product_discount_price_status'].value = '<?php echo $product_info->product_discount_price_status; ?>';
    document.forms['myForm'].elements['product_display_in_homepage'].value = '<?php echo $product_info->product_display_in_homepage; ?>';
    document.forms['myForm'].elements['product_publication_status'].value = '<?php echo $product_info->product_publication_status; ?>';
</script>