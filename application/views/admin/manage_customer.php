<div class="row-fluid">
    <div class="span12">
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Customer</h4>
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
                <table class='table table-striped' style='margin-bottom:0; font-size: 10px;'>
                <thead>
                    <tr>
                        <th>
                            First Name:			  
                        </th>
                        <th>
                            Last Name:		  
                        </th>
                        <th>
                            User Name:		  
                        </th>
                        <th>
                            E-Mail Address:
                        </th>
                        <th>
                            Phone:
                        </th>
                        <th>
                            Country:
                        </th>
                        <th>
                            Full Details
                        </th>
                        <th>
                            Current Status
                        </th>
                        <th>
                            Action
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($all_customer as $v_customer)
                        {
                    ?>
                    <tr>
                        <td><?php echo $v_customer->customer_first_name;?></td>
                        <td><?php echo $v_customer->customer_last_name;?></td>
                        <td><?php echo $v_customer->customer_user_name;?></td>
                        <td><?php echo $v_customer->customer_email;?></td>
                        <td><?php echo $v_customer->customer_phone;?></td>
                        <td><?php echo $v_customer->customer_country;?></td>
                        <td><a class="btn btn-success" href="<?php echo base_url();?>super_admin/view_customer/<?php echo $v_customer->customer_id;?>"><i class="icon-link"> View</i></a></td>
                        <td>
                            <div class='activation_color'>
                                <?php 
                                    if($v_customer->customer_activation_status=='1')
                                    {
                                        echo 'Active';
                                    }
                                ?> 
                                <div id='color'>    
                                    <?php 
                                        if($v_customer->customer_activation_status=='0')
                                        {
                                            echo 'Inctive';
                                        }
                                    ?> 
                                </div>    
                            </div> 
                        </td>                          
                        <td>
                            <?php if($v_customer->customer_activation_status=='1')
                                {
                            ?>
                            <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/disable_customer/<?php echo $v_customer->customer_id;?>" title="Inactive" onclick="return check_unpublish();">
                                <i class="icon-remove"> Inactive</i>  
                            </a>
                            <?php
                                }
                                else{
                            ?>
                            <a class="btn btn-success" href="<?php echo base_url();?>super_admin/enable_customer/<?php echo $v_customer->customer_id;?>" title="Active" onclick="return check_publish();">
                                <i class="icon-ok"> Active</i>  
                            </a>
                            <?php
                                }
                            ?>
                            <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_customer/<?php echo $v_customer->customer_id;?>" title="Delete" onclick="return check_delete();">
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