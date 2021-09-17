<div class="row-fluid">
    <div class="span12">
        <div class="widget purple">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Product</h4>
                <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <h3 style="color:green">
                        <?php
                        $msg=$this->session->userdata('message');
                        if(isset($msg)){
                        echo $msg;
                        $this->session->unset_userdata('message');
                        }
                        ?>
                    </h3>
                <table class='table table-striped' style='margin-bottom:0;'>
                    <thead>
                        <tr>
                            <th>
                                Name			  
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Subcategory
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Discount
                            </th>
                            <th>
                                Action
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Top Seller
                            </th>
                            <th>
                                Action
                            </th>
                            <th>
                                All Details
                            </th>
                            <th>
                                Publication Status
                            </th>
                            <th>
                                Action
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($all_product as $v_product)
                            {
                        ?>
                        <tr>
                            <td><?php echo $v_product->product_name;?></td>
                            <td><?php echo $v_product->category_name;?></td>
                            <td><?php echo $v_product->sub_category_name;?></td>
                            <td><img src="<?php echo base_url().$v_product->product_photo_0;?>" height="100" width="100" alt="product_photo" /></td>
                            <td>
                                <div class='activation_color'>
                                    <?php 
                                        if($v_product->product_discount_price_status=='1')
                                        {
                                            echo 'Yes';
                                        }
                                    ?> 
                                    <div id='color'>    
                                        <?php 
                                            if($v_product->product_discount_price_status=='0')
                                            {
                                                echo 'No';
                                            }
                                        ?> 
                                    </div>    
                                </div>   
                            </td>
                            <td class="center">
                                <?php if($v_product->product_discount_price_status=='1')
                                    {
                                ?>
                                <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/no_discount/<?php echo $v_product->product_id;?>" title="No Discount" onclick="return check_unpublish();">
                                    <i class="icon-remove"></i>  
                                </a>
                                <?php
                                    }
                                    else{
                                ?>
                                <a class="btn btn-success" href="<?php echo base_url();?>super_admin/product_discount/<?php echo $v_product->product_id;?>" title="Discount The Product" onclick="return check_publish();">
                                    <i class="icon-ok"></i>  
                                </a>
                                <?php
                                    }
                                ?>
                            </td>
                            <td><?php echo $v_product->product_quantity;?></td>
                            <td>
                                <div class='activation_color'>
                                    <?php 
                                        if($v_product->product_display_in_homepage=='1')
                                        {
                                            echo 'Yes';
                                        }
                                    ?> 
                                    <div id='color'>    
                                        <?php 
                                            if($v_product->product_display_in_homepage=='0')
                                            {
                                                echo 'No';
                                            }
                                        ?> 
                                    </div>    
                                </div>   
                            </td>
                            <td class="center">
                                <?php if($v_product->product_display_in_homepage=='1')
                                   {
                                ?>
                                <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/not_special_product/<?php echo $v_product->product_id;?>" title="Not Special" onclick="return check_unpublish();">
                                    <i class="icon-remove"></i>  
                                </a>
                               <?php
                                   }
                                   else
                                       {
                               ?>
                               <a class="btn btn-success" href="<?php echo base_url();?>super_admin/special_product/<?php echo $v_product->product_id;?>" title="Special" onclick="return check_publish();">
                                    <i class="icon-ok"></i>  
                               </a>
                               <?php
                                       }
                               ?>
                            </td>
                            <td><a class="btn btn-primary" href="<?php echo base_url();?>super_admin/view_product/<?php echo $v_product->product_id;?>"> Enter</a></td>
                            <td>
                                <div class='activation_color'>
                                    <?php 
                                        if($v_product->product_publication_status=='1')
                                        {
                                            echo 'Published';
                                        }
                                    ?> 
                                    <div id='color'>    
                                        <?php 
                                            if($v_product->product_publication_status=='0')
                                            {
                                                echo 'Unpublished';
                                            }
                                        ?> 
                                    </div>    
                                </div>   
                            </td>
                            <td class="center">
                                <?php if($v_product->product_publication_status=='1')
                                    {
                                ?>
                                <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/unpublished_product/<?php echo $v_product->product_id;?>" title="Unpublish" onclick="return check_unpublish();">
                                    <i class="icon-remove"></i>  
                                </a>
                                <?php
                                    }
                                    else{
                                ?>
                                <a class="btn btn-success" href="<?php echo base_url();?>super_admin/published_product/<?php echo $v_product->product_id;?>" title="Publish" onclick="return check_publish();">
                                    <i class="icon-ok"></i>  
                                </a>
                                <?php
                                    }
                                ?>
                                <a class="btn btn-info" href="<?php echo base_url();?>super_admin/edit_product/<?php echo $v_product->product_id;?>" title="Edit">
                                    <i class="icon-edit icon-white"></i>  
                                </a>
                                <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_product/<?php echo $v_product->product_id;?>" title="Delete" onclick="return check_delete();">
                                    <i class="icon-trash icon-white"></i> 
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>