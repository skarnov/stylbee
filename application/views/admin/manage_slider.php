<div class="row-fluid">
    <div class="span12">
        <div class="widget purple">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Slider</h4>
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
                                Display In Slider
                            </th>
                            <th>
                                Action
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($slider_product as $v_slider_product)
                            {
                        ?>
                        <tr>
                            <td><?php echo $v_slider_product->product_name;?></td>
                            <td><?php echo $v_slider_product->category_name;?></td>
                            <td><?php echo $v_slider_product->sub_category_name;?></td>
                            <td><img src="<?php echo base_url().$v_slider_product->product_photo_0;?>" height="100" width="100" alt="product_photo" /></td>
                            <td>
                                <div class='activation_color'>
                                    <?php 
                                        if($v_slider_product->product_slider=='1')
                                        {
                                            echo 'Yes';
                                        }
                                    ?> 
                                    <div id='color'>    
                                        <?php 
                                            if($v_slider_product->product_slider=='0')
                                            {
                                                echo 'No';
                                            }
                                        ?> 
                                    </div>    
                                </div>   
                            </td>
                            <td class="center">
                                <?php if($v_slider_product->product_slider=='1')
                                    {
                                ?>
                                <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/nonslider_product/<?php echo $v_slider_product->product_id;?>" title="Nonslider" onclick="return check_unpublish();">
                                    <i class="icon-remove"> Remove From Slider</i>  
                                </a>
                                <?php
                                    }
                                    else{
                                ?>
                                <a class="btn btn-success" href="<?php echo base_url();?>super_admin/slider_product/<?php echo $v_slider_product->product_id;?>" title="Slider" onclick="return check_publish();">
                                    <i class="icon-ok"> Put The Slider</i>  
                                </a>
                                <?php
                                    }
                                ?>
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