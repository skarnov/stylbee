<div class="row-fluid">
    <div class="span12">
        <div class="widget red">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Brand</h4>
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
                                Brand Name			  
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
                            foreach($all_brand as $v_brand)
                            {
                        ?>
                        <tr>
                            <td><?php echo $v_brand->brand_name;?></td>
                            <td>
                                <div class='activation_color'>
                                    <?php 
                                        if($v_brand->brand_publication_status=='1')
                                        {
                                            echo 'Published';
                                        }
                                    ?> 
                                    <div id='color'>    
                                        <?php 
                                            if($v_brand->brand_publication_status=='0')
                                            {
                                                echo 'Unpublished';
                                            }
                                        ?> 
                                    </div>    
                                </div>   
                            </td>
                            <td class="center">
                                <?php if($v_brand->brand_publication_status=='1')
                                    {
                                ?>
                                <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/unpublished_brand/<?php echo $v_brand->brand_id;?>" title="Unpublish" onclick="return check_unpublish();">
                                    <i class="icon-remove"> Unpublished</i>  
                                </a>
                                <?php
                                    }
                                    else{
                                ?>
                                <a class="btn btn-success" href="<?php echo base_url();?>super_admin/published_brand/<?php echo $v_brand->brand_id;?>" title="Publish" onclick="return check_publish();">
                                    <i class="icon-ok"> Published</i>  
                                </a>
                                <?php
                                    }
                                ?>
                                <a class="btn btn-info" href="<?php echo base_url();?>super_admin/edit_brand/<?php echo $v_brand->brand_id;?>" title="Edit">
                                    <i class="icon-edit icon-white"> Edit</i>  
                                </a>
                                <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_brand/<?php echo $v_brand->brand_id;?>" title="Delete" onclick="return check_delete();">
                                    <i class="icon-trash icon-white"> Delete</i> 
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