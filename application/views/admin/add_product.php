<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Add Product</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <form name="myForm" onsubmit="return validateForm()" action="<?php echo base_url()?>super_admin/save_product" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <input type="text" name="product_name" required placeholder="Enter Product Name" class="input-large" />
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
                            <textarea name="product_summary" required class="input-xlarge" id="input" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Description</label>
                        <div class="controls">
                            <textarea name="product_description" required class="input-xxlarge" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Color</label>
                        <div class="controls">
                            <input type="text" name="product_color" placeholder="Enter Product Color" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Size</label>
                        <div class="controls">
                            <input type="text" name="product_size" placeholder="Enter Product Size" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Photo</label>
                        <div class="controls">
                            <input type="file" name="product_photo_0">
                            <input type="file" name="product_photo_1">
                            <input type="file" name="product_photo_2">
                            <input type="file" name="product_photo_3">
                            <input type="file" name="product_photo_4">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Style ID</label>
                        <div class="controls">
                            <input type="text" name="style_id" placeholder="Enter Product Model" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Quantity</label>
                        <div class="controls">
                            <input type="text" name="product_quantity" required placeholder="Enter Product Quantity" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price In BDT</label>
                        <div class="controls">
                            <input type="text" name="product_price_in_bdt" required placeholder="Enter Bangladesh Price" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price In USD</label>
                        <div class="controls">
                            <input type="text" name="product_price_in_usd" required placeholder="Enter USD Price" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price In GBP</label>
                        <div class="controls">
                            <input type="text" name="product_price_in_gbp" required placeholder="Enter GBP Price" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price In EURO</label>
                        <div class="controls">
                            <input type="text" name="product_price_in_euro" required placeholder="Enter EURO Price" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Discount</label>
                        <div class="controls">
                            <input type="text" name="product_discount_price" placeholder="Product Discount" class="input-large" />
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